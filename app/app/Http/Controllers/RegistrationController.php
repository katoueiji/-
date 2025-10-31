<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Event;
use App\Event_user;
use App\User;
use App\userDate;
use App\Reports;

class RegistrationController extends Controller
{
    //イベント参加
    public function eventJoinform($eventId) {
        $event = Event::findOrFail($eventId);
        $eventid = $event->id;
        $userId = Auth::id();
        $currentCount = Event_user::where('event_id', $eventId)->count();
        $capacity = $event->capacity;
                
        if(Event_user::where('user_id', $userId)->where('event_id', $eventid)->exists()) {
            $Event_user = 1;
        } elseif ($currentCount >= $capacity){
            $Event_user = 2;
        } else {
            $Event_user = 0;
        }

         return view('event_join',[
            'event' => $event,
            'Event_user' => $Event_user,
        ]);
    }

    public function eventJoin(int $id, Request $request) {
        $event_user = new  Event_user;
        $eventId = Event::findOrFail($id);
        $user = Auth::id();

        $event_user->event_id = $eventId->id;
        $event_user->user_id = $user;
        $event_user->comment = $request->comment;
        $event_user->step = 1;

        $event_user->save();

        return redirect('/');
    }

    //イベント報告
    public function eventReportform($eventId) {
        $event = Event::findOrFail($eventId);
        $eventid = $event->id;
        $userId = Auth::id();

        return view('event_report',[
            'event' => $event,
        ]);
    }

    public function eventReport(int $id, Request $request) {
        $reports = new Reports;
        $event = Event::findOrFail($id);
        $user = Auth::id();

        $reports->event_id = $event->id;
        $reports->user_id = $user;
        $reports->comment = $request->comment;

        $reports->save();

        return redirect('/');    
    }

    //イベント参加取り消し
    public function userCancelform($eventId) { 
        $user = Auth::user();
        $event = Event::findOrFail($eventId);

        return view('user_cancel',[
            'user' => $user,
            'event' => $event,
        ]);
    }

    public function userCancel(int $id, Request $request) {
        $user = Auth::user();
        $userId = $user->id;

        Event_user::where('event_id', $id)->where('user_id', $userId)->delete();

        $events = $user->Event_user->map(fn($eu) => $eu->Event);

        return redirect()->route('user.join', [
            'id' => $userId,
            'events' => $events,
        ]);
    }

    //プロフィール編集
    public function profileEditform($userId) {
        $user = User::findOrFail($userId);
        $date = $user->userDate;
        $prevUrl = url()->previous();
        session(['profile_url' => $prevUrl]);

        return view('profile_edit', [
            'user' => $user,
            'date' => $date,
        ]);
    }

    public function profileEdit(Request $request) {
        $user = Auth::user();
        $date = $user->userDate ?? $user->userDate()->create([]);
        $url = session('profile_url');

        if (!empty($request->file)) {
        $file = $request->file('image');
        $file_name = $file->getClientOriginalName();
        $file->storeAs('public/profile', $file_name);

        $date->image = $file_name;    
        }


        $user->name = $request->name;
        $user->email = $request->email;
        $date->comment = $request->comment;

        $user->save();
        $date->save();

        return redirect($url);
    }

    //退会・ログアウト画面
    public function userEdit($userId) {
        $user = User::findOrFail($userId);
        $date = $user->userDate;

        return view('user_edit', [
            'user' => $user,
            'date' => $date,
        ]);
    }

    public function delete(Request $request) {
        $user = Auth::user();

        $user ->delete();

        return redirect('/login');
    }

    //イベント編集画面
    public function eventEditform($eventId) {
        $Event = Event::findOrFail($eventId);
        $prevUrl = url()->previous();
        session(['profile_url' => $prevUrl]);

        return view('event_edit', [
            'event' => $Event,
        ]);
    }

    public function eventEdit(int $id, Request $request) {
        $event = new Event;
        $record = $event->findOrFail($id);
        $url = session('profile_url');

        $colums = ['capacity', 'title', 'image', 'comment', 'date', 'format'];

        foreach ($colums as $colum) {
            $record -> $colum = $request -> $colum;
        }

        $record->save();

        return redirect($url);
    }

    //イベント削除確認画面
    public function eventDestroyform($eventId) {
        $event = Event::findOrFail($eventId);
        
        return view('event_destroy', [
            'event' => $event,
        ]);
    }

    public function eventDestroy(int $id, Request $request) {
        $event = Event::findOrFail($id);
        $event -> delete();

        $userId = Auth::id();

        return redirect()->route('event.main', [
            'id' => $userId,
        ]);
    }


    //イベント作成画面
    public function eventCreateform() {
        $user = Auth::user();
        $prevUrl = url()->previous();
        session(['profile_url' => $prevUrl]);

        return view('event_create', [
            'user' => $user,
        ]);
    }

    public function eventCreate(int $id, Request $request) {
        $user = Auth::id();
        $event = new Event;
        $url = session('profile_url');

        $file = $request->file('image');
        $file_name = $file->getClientOriginalName();
        $file->storeAs('public/profile', $file_name);

        $colums = ['capacity', 'title', 'comment', 'date', 'format', 'type'];

        foreach ($colums as $colum) {
            $event -> $colum = $request -> $colum;
        }
        $event -> user_id = $user;
        $event -> image = $file_name;
        
        $event->save();

        return redirect($url);
    }

    //イベント非表示
    public function eventHiddenform($eventId) {
        $event = Event::findOrFail($eventId);
        
        return view('event_hidden', [
            'event' => $event,
        ]);
    }

    public function eventHidden(int $id, Request $request) {
        $event = Event::findOrFail($id);
        
        $event->is_visible = 1;

        $event->save();
        
        return redirect('/event');
    }

    //ユーザー利用停止
    public function userHiddenform($userId) {
        $user = User::findOrFail($userId);

        return view('user_hidden', [
            'user' => $user,
        ]);
    }

    public function userHidden(int $id, Request $request) {
        $user = User::findOrFail($id);

        $user->is_active = 1;
        
        $user->save();
        
        return redirect('/user');
    }

}

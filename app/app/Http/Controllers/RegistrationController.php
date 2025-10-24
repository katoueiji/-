<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Event;
use App\Event_user;
use App\User;
use App\userDate;

class RegistrationController extends Controller
{
    //イベント参加
    public function eventJoinform($eventId) {
        $event = Event::find($eventId);
        $eventid = $event->id;
        $userId = Auth::id();
        
        if(Event_user::where('user_id', $userId)->where('event_id', $eventid)->exists()) {
            $Event_user = 1;
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
        $eventId = Event::find($id);
        $user = Auth::id();

        $event_user->event_id = $eventId->id;
        $event_user->user_id = $user;
        $event_user->comment = $request->comment;
        $event_user->step = 1;

        $event_user->save();

        return redirect('/top');
    }

    //イベント参加取り消し
    public function userCancelform($eventId) { 
        $user = Auth::id();
        $event = Event::find($eventId);

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
        $user = User::find($userId);
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

        $user->name = $request->name;
        $user->email = $request->email;
        $date->comment = $request->comment;
        $date->image = $request->image;

        $user->save();
        $date->save();

        return redirect($url);
    }

    //退会・ログアウト画面
    public function userEdit($userId) {
        $user = User::find($userId);
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
        $Event = Event::find($eventId);
        $prevUrl = url()->previous();
        session(['profile_url' => $prevUrl]);

        return view('event_edit', [
            'event' => $Event,
        ]);
    }

    public function eventEdit(int $id, Request $request) {
        $event = new Event;
        $record = $event->find($id);
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
        $event = Event::find($eventId);
        
        return view('event_destroy', [
            'event' => $event,
        ]);
    }

    public function eventDestroy(int $id, Request $request) {
        $event = Event::find($id);
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

        $colums = ['capacity', 'title', 'image', 'comment', 'date', 'format', 'type'];

        foreach ($colums as $colum) {
            $event -> $colum = $request -> $colum;
        }
        $event -> user_id = $user;
        
        $event->save();

        return redirect($url);
    }
}

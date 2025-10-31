<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\User;
use App\Event_user;

class AdminController extends Controller
{
    //管理者トップ画面
    public function top() {
        return view('top_Admin');
    }

    //ユーザー利用停止
    public function userHiddenform($userId) {
        $user = User::find($userId);

        return view('user_hidden', [
            'user' => $user,
        ]);
    }

    public function userHidden(int $id, Request $request) {
        $user = User::find($id);

        $user->is_active = 1;
        
        $user->save();
        
        return redirect('/user');
    }

    //ユーザー利用停止解除
    public function userActiveform($userId) {
        $user = User::find($userId);

        return view('user_active', [
            'user' => $user
        ]);
    }

    public function userActive(int $id, Request $request) {
        $user = User::find($id);
        
        $user->is_active = 0;

        $user->save();
        
        return redirect('/user');
    }

    //イベント非表示
    public function eventHiddenform($eventId) {
        $event = Event::find($eventId);
        
        return view('event_hidden', [
            'event' => $event,
        ]);
    }

    public function eventHidden(int $id, Request $request) {
        $event = Event::find($id);
        
        $event->is_visible = 1;

        $event->save();
        
        return redirect('/event');
    }

    //全イベント一覧
    public function eventAll() {
        $event = Event::withCount('Reports')->orderBy('reports_count', 'desc') ->get();

        return view('event_all', [
            'event' => $event,
        ]);
    }

    //全ユーザー一覧
    public function userAll() {
        $user = User::all()->toArray();

        return view('user_all', [
            'user' => $user,
        ]);
    }

    //参加ユーザー一覧
    public function joinuser() {
        $eventUsers = Event_user::with(['user', 'event'])->get();

        return view('join_user', [
            'eu' => $eventUsers
        ]);
    }
    

}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Event_user;
use App\Event;
use App\User;


class DisplayController extends Controller
{
    //トップ画面
    public function index() {
        $event = new Event;
        $all = $event->all()->where('is_visible', '=', 0)->toArray();
        $user = Auth::id();

        return view('top', [
            'event' => $all,
            'user' => $user,
        ]);
    }

    //イベント詳細
    public function eventDetail(int $eventId) {
        $event = Event::find($eventId);

        return view('event_detail', [
            'event' => $event,

        ]);
    }

    //ユーザープロフィール
    public function userProfile(int $userId) {
        $user = User::find($userId);
        $date = $user->userDate;

        return view('profile', [
            'user' => $user,
            'date' => $date,
        ]);
    }

    //主催イベント一覧
    public function eventMainform(int $userID) {
        $user = User::find($userID);
        $events = $user->Event->where('user_id', '=', $userID)->toArray();

        return view('event_main', [
            'user' => $user,
            'events' => $events,
        ]);
    }
    
    //参加イベント一覧
    public function userJoinform(int $userID) {
        $user = User::find($userID);
        $events = $user->Event_user->map(fn($Eu) => $Eu->Event)->toArray();
    
        return view('user_join', [
            'user' => $user,
            'events' => $events,
        ]);
    }
}

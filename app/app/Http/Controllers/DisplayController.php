<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
}

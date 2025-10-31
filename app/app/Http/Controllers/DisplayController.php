<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Event_user;
use App\Event;
use App\User;
use App\Report;

class DisplayController extends Controller
{
    //トップ画面
    public function index() {
        $event = new Event;
        $all = Event::where('is_visible', 0)->get(); 
        $user = Auth::user();

        return view('top', [
            'event' => $all,
            'user' => $user,
        ]);
    }

    //イベント詳細
    public function eventDetail(int $eventId) {
        $event = Event::findOrFail($eventId);

        return view('event_detail', [
            'event' => $event,

        ]);
    }

    //ユーザープロフィール
    public function userProfile(int $userId) {
        $user = User::findOrFail($userId);
        $date = $user->userDate;

        $main = count($user->Event->where('user_id', '=', $userId));
        $join = count($user->Event_user->map(fn($Eu) => $Eu->Event));

        return view('profile', [
            'user' => $user,
            'date' => $date,
            'main' => $main,
            'join' => $join,
        ]);
    }

    //検索機能
    public function sort(Request $request) {
        $table = Event::query();
        $user = Auth::user();

        $word = $request->input('word');
        $format = $request->input('format');
        $date = $request->input('date');

        if (!empty($word)) {
            $table->where('title', 'LIKE', "%{$word}%")
            ->orwhere('comment', 'LIKE', "%{$word}%");
        }

        if ($format !== null && $format !== '') {
            $table->where('format', (int)$format);
        }

        if (!empty($date)) {
            $table->where('date', '>=', $date);
        }

        $table->where('is_visible', '=', 0);
         
        $sortevent = $table->get();

        return view('top', [
            'event' => $sortevent,
            'user' => $user,
        ]);

    }


}

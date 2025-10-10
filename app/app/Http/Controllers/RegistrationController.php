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

         return view('event_join',[
            'event' => $event,
        ]);
    }

    public function eventJoin(Request $request) {
        $event_user = new  Event_user;

        $event_user->event_id = $request->event_id;
        $event_user->user_id = $request->user_id;
        $event_user->comment = $request->comment;
        $event_user->step = 1;

        $event_user->save();

        return redirect('/top');
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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserNotificationsController extends Controller
{
    public function index() {

        // dd(auth()->user()->notifications);

        return view('notifications.index', [
            'notifications' => auth()->user()->notifications
        ]);
    }
}

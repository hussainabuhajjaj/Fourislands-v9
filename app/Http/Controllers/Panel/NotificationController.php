<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{

    public function index()
    {
        $notifications = DatabaseNotification::where('read_at', null)->paginate(20);
        return view('panel.notifications.index', compact('notifications'));
    }
}

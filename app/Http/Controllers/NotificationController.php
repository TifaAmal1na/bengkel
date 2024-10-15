<?php

namespace App\Http\Controllers;

use App\Models\Notification;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::latest()->take(5)->get(); // menampilkan 5 notifikasi terbaru
        return view('notifications.index', compact('notifications'));
    }
}


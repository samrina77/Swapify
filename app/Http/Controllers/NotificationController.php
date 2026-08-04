<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = auth()->user()->notifications;

        return view('notifications', compact('notifications'));
    }

    public function markAsRead($id)
    {
        $notification = auth()
            ->user()
            ->notifications()
            ->where('id', $id)
            ->firstOrFail();

        $notification->markAsRead();

        return back()->with('success', 'Notification marked as read.');
    }

    public function destroy($id)
{
    $notification = auth()
        ->user()
        ->notifications()
        ->where('id', $id)
        ->firstOrFail();

    $notification->delete();

    return back()->with('success', 'Notification deleted successfully.');
}
}
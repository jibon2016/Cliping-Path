<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class NotificationController extends Controller
{
    public function notification() {
        return view('notification.all');
    }
    public function datatable()
    {
        $notifications = auth()->user()->notifications;

        return DataTables::of($notifications)
            ->addColumn('title', function ($notification) {
                return $notification->data['title'];
            })
            ->addColumn('content', function ($notification) {
                return '<a href="' . $notification->data['url'] . '">' . $notification->data['content'] . '</a>';
            })
            ->addColumn('created_at', function ($notification) {
                return $notification->created_at->diffForHumans();
            })
            ->rawColumns(['content']) // Mark content as raw HTML
            ->make(true);
    }
    public function markRead() {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }
    public function fetch(Request $request)
    {
        $notifications = auth()->user()->notifications()->paginate(10);

        $formattedNotifications = $notifications->map(function ($notification) {
            // Extract notification-related data
            $isUnread = is_null($notification->read_at);
            $notificationUrl = $notification->data['url'].'?notification_id='.$notification->id;
            return [
                'id' => $notification->id,
                'title' => $notification->data['title'] ?? '',
                'content' => $notification->data['content'] ?? '',
                'notification_url' => $notificationUrl,
                'is_unread' => $isUnread,
                'created_at' => $notification->created_at->diffForHumans(),
            ];
        });

        return response()->json([
            'notifications' => $formattedNotifications,
            'next_page_url' => $notifications->nextPageUrl(),
        ]);
    }

}

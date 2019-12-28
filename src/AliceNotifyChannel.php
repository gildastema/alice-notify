<?php

namespace Tematech\AliceNotify;

use Illuminate\Notifications\Notification;

class AliceNotifyChannel
{

    public function send($notifiable, Notification $notification)
    {
        if (!$phone = $notifiable->routeNotificationFor('alice', $notification)) {
            return;
        }
        $data = $notification->toAlice($notifiable);
        AliceNotifyFacade::send($phone, $data['message']);
    }
}

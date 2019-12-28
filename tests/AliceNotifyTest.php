<?php

namespace Tematech\AliceNotify\Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Tematech\AliceNotify\AliceNotifyFacade;
use Tematech\AliceNotify\AliceNotifyChannel;

class AliceNotifyTest extends TestCase
{

    /**
     * @test
     */
    public function send()
    {
        $notification = new AliceNotificationTest;
        $notifiable = new AliceNotifiableTest;
        $channel = new AliceNotifyChannel();
        AliceNotifyFacade::shouldReceive('send')->with('237691131446@c.us', 'cool!!!')->andReturn(true);
        $channel->send($notifiable, $notification);
    }
}
class AliceNotifiableTest
{
    use Notifiable;

    public function routeNotificationForAlice($notification)
    {
        return '237691131446@c.us';
    }
}

class AliceNotificationTest extends Notification
{

    public function toAlice($notifiable)
    {
        return [
            'message' => 'cool!!!'
        ];
    }
}

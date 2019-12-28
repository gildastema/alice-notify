<?php

namespace Tematech\AliceNotify;

use Exception;
use Symfony\Component\HttpClient\HttpClient;



class AliceNotify
{
    private $client;

    public function __construct()
    {
        $this->client = HttpClient::create();
    }

    public function send($merchantWhatsapp, $message): bool
    {
        try {
            $this->client->request('POST', config('alice-notify.server_url'), [
                'json' => [
                    'merchant' => $merchantWhatsapp,
                    'message' => $message,
                ]
            ]);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}

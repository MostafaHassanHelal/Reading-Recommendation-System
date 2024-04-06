<?php
namespace App\Integrations;

use App\Providers\SMSProviders\SMSProvider;

class SMSIntegration
{
    //constructor
    public function __construct(private SMSProvider $provider)
    {
        //constructor
    }
    public function sendSMS($phoneNumber, $message)
    {
        $this->provider->sendSMS($phoneNumber, $message);
    }
}
<?php

namespace App\Providers\SMSProviders;


abstract class SMSProvider 
{
    public abstract function sendSMS($phoneNumber, $message): bool;
}

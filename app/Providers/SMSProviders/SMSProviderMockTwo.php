<?php
namespace App\Providers\SMSProviders;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SMSProviderMockTwo extends SMSProvider
{
    public function sendSMS($phoneNumber, $message): bool
    {
        Log::info('Sending SMS using Mock Two');

        try {
            $response = Http::post('https://run.mocky.io/v3/268d1ff4-f710-4aad-b455-a401966af719', [
                'phoneNumber' => $phoneNumber,
                'message' => $message
            ]);
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }
}
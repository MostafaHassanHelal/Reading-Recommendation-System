<?php
namespace App\Providers\SMSProviders;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SMSProviderMockOne extends SMSProvider
{
    public function sendSMS($phoneNumber, $message): bool
    {
        Log::info('Sending SMS using Mock One');
        try {
            $response = Http::post('https://run.mocky.io/v3/8eb88272-d769-417c-8c5c-159bb023ec0a', [
                'phoneNumber' => $phoneNumber,
                'message' => $message
            ]);
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }
}
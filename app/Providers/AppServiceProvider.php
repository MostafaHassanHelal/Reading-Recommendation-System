<?php

namespace App\Providers;

use App\Providers\SMSProviders\SMSProvider;
use App\Providers\SMSProviders\SMSProviderMockOne;
use App\Providers\SMSProviders\SMSProviderMockTwo;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SMSProvider::class, function ($app) {
            if (config('sms.provider') === 'MOCK_ONE') {
                return new SMSProviderMockOne();
            }  else {
                return new SMSProviderMockTwo();
            }
        }); 
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

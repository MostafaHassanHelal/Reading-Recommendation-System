<?php

namespace App\Http\Controllers;

use App\Enums\ComparisonResult;
use App\Helper\HelperFunctions;
use App\Http\Requests\ReadingIntervalsRequest;
use App\Integrations\SMSIntegration;
use App\Jobs\CalculateUniqueIntervalsJob;
use App\Models\Book;
use App\Models\User;
use App\Providers\SMSProviders\SMSProvider;
use App\Services\ReadingIntervalService;
use PHPUnit\TextUI\Help;

class ReadingIntervalController extends Controller 
{

    //constructor
    public function __construct(private SMSIntegration $smsIntegration)
    {
    }
    public function store(ReadingIntervalsRequest $request)
    {   
        $data = $request->validated();

        ReadingIntervalService::storeIntervalReading($data);

        $new_interval = [$data['start_page'], $data['end_page']];
        $book = Book::find($data['book_id']);
        $user = User::find($data['user_id']);

        $this->smsIntegration->sendSMS($user->mobile, 'Thank you!');

        CalculateUniqueIntervalsJob::dispatch($new_interval, $book);
        
        return response()->json([
            'status' => 'success',
            'message' => 'Reading interval created successfully'
        ], 201);
    }  

}

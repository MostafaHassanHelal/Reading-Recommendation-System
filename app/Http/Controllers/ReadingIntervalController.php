<?php

namespace App\Http\Controllers;

use App\Enums\ComparisonResult;
use App\Helper\HelperFunctions;
use App\Http\Requests\ReadingIntervalsRequest;
use App\Jobs\CalculateUniqueIntervalsJob;
use App\Models\Book;
use App\Services\ReadingIntervalService;
use PHPUnit\TextUI\Help;

class ReadingIntervalController extends Controller 
{
    public function store(ReadingIntervalsRequest $request)
    {

        ReadingIntervalService::storeIntervalReading($request->validated());
        $new_interval = [$request->start_page, $request->end_page];
        $book = Book::find($request->book_id);


        CalculateUniqueIntervalsJob::dispatch($new_interval, $book);
        
        return response()->json(['message' => 'Reading interval created successfully'], 201);
    }  

}

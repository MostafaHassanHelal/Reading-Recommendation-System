<?php

namespace App\Jobs;

use App\Enums\ComparisonResult;
use App\Helper\HelperFunctions;
use App\Models\Book;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CalculateUniqueIntervalsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public $new_interval, public  $book)
    {
        //
    }

    /**
     * Execute the job.
     */ 
    public function handle(): void
    {
        $new_interval = $this->new_interval;
        $book = $this->book;
        $intervals = $book->unique_intervals_list;
        $res_intervals = [];
        $count = 0;
        $finished = false;
        $index = 0;
        if($intervals == []){
            HelperFunctions::add($res_intervals, $new_interval, $count);
        }
        else{
            for($i = 0; $i < count($intervals); $i++){
                switch(HelperFunctions::compareIntervals($intervals[$i], $new_interval)){
                    case ComparisonResult::LOWER:
                        HelperFunctions::add($res_intervals, $intervals[$i], $count);
                        break;
                    case ComparisonResult::HIGHER:
                        HelperFunctions::add($res_intervals, $new_interval, $count);
                        $finished = true;
                        break;
                    case ComparisonResult::OVERLAP:
                        $new_interval = HelperFunctions::mergeIntervals($intervals[$i], $new_interval);
                        break;
                }
                if($finished){
                    $index = $i;
                    break;
                }
            }
            if($finished){
                for($i = $index; $i < count($intervals); $i++){
                    HelperFunctions::add($res_intervals, $intervals[$i], $count);
                }
            }
            else{
                HelperFunctions::add($res_intervals, $new_interval, $count);
            }
        }
        $book->unique_intervals_list = json_encode($res_intervals);
        $book->read_pages_count = $count;
        $book->save();
    }
}

<?php
namespace App\Helper;

use App\Enums\ComparisonResult;

class HelperFunctions
{

    //return true if there is an overlap between the two intervals
    public static function compareIntervals($interval1, $interval2){
        if($interval1[1] + 1 < $interval2[0])
            return ComparisonResult::LOWER;
        if($interval1[0] - 1 > $interval2[1])
            return ComparisonResult::HIGHER;
        else 
            return ComparisonResult::OVERLAP;
        
    }


    //merge two intervals
    public static function mergeIntervals($interval1, $interval2){
        return [min($interval1[0], $interval2[0]), max($interval1[1], $interval2[1])];
    }


    public static function add(&$array, $interval, &$count){
        $array[] = $interval; //equivalent to array_push($array, $value);
        $count += $interval[1] - $interval[0] + 1;
    }
}
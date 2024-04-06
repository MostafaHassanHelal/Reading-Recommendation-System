<?php
namespace App\Services;

use App\Models\ReadingInterval;
class ReadingIntervalService
{
    public static function storeIntervalReading($data)
    {
        ReadingInterval::create($data);
    }
}
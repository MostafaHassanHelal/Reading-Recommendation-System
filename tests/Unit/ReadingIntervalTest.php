<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\TestCase;


class ReadingIntervalTest extends TestCase
{
    /**
     * Test that a reading interval can be created.
     *
     * @return void
     */
    public function testCreateReadingInterval()
    {

        $response = $this->post('/api/reading-interval', [
            'user_id' => 2,
            'book_id' => 2,
            'start_page' => 2,
            'end_page' => 12
        ]);
         // This will show you the response content (if you want to see it

        $this->assertDatabaseHas('reading_intervals', [
            'user_id' => 2,
            'book_id' => 2,
            'start_page' => 2,
            'end_page' => 12
        ]);
        $response->assertStatus(201);
    }


    public function testCreateReadingIntervalWithInvalidData()
    {
        $response = $this->post('/api/reading-interval', [
            'book_id' => 2,
            'start_page' => 12,
            'end_page' => 2
        ]);

        $response->assertStatus(422);
    }

}
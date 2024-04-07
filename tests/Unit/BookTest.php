<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\TestCase;


class BookTest extends TestCase
{

    /**
     * Test that a reading interval can be created.
     *
     * @return void
     */
    public function testGetRecommendedBooks()
    {
        $response = $this->get('/api/recommended-books');
        $response->assertStatus(200);
    }

}
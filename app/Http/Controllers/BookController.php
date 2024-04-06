<?php

namespace App\Http\Controllers;

use App\Services\BookService;
use Illuminate\Http\Request;

class BookController extends Controller
{
        
    public function getRecommendedBooks(){
        $books = BookService::recommendedBooks(5);
        return response()->json($books);
    }
}

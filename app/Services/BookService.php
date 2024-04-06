<?php
namespace App\Services;

use App\Models\Book;
use App\Models\ReadingInterval;
class BookService
{
    public static function recommendedBooks($num_of_books)
    {
        return Book::orderBy('read_pages_count', 'desc')->where('read_pages_count','>',0)->limit($num_of_books)->select('id','name', 'read_pages_count')->get();
    }
}
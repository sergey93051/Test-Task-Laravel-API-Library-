<?php

namespace App\Repository\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface BooksRepositoryInterface
{
     public function all();

     public function createBooks($booksDetails);

     public function deleteBooks($booksDetails);

     public function withpagination(int $count);

     public function bookSearch($request);

}
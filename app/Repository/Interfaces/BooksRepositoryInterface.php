<?php

namespace App\Repository\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface BooksRepositoryInterface
{
     public function all():Model;

     public function withpagination(int $count);

     public function bookSearch($request);

}
<?php

namespace App\Repository\Model;

use App\Models\Books;
use Illuminate\Database\Eloquent\Model;
use App\Repository\Interfaces\BooksRepositoryInterface;


class BooksRepository implements BooksRepositoryInterface
{
     private Model $query;
     
     public function __construct(Books $book)
     {
        $this->query = $book;
     }

    public function all():Model
    {       
       return $this->query->get();
    }

    public function withPagination(int $count)
    { 
   
       return  $this->query->with(['writer'])->paginate($count);
    
    }

   public function bookSearch($request)
   {
      $query = $this->query::query();

      return $query->with('writer')->where(function($query) use ($request){
         $query->where('name',$request->value);
         $query->orWhereRelation('writer','name',$request->value);
     })->get(); 
       
   }
}
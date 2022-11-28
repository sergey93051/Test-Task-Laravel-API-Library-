<?php

namespace App\Repository\Model;

use App\Models\Books;
use Illuminate\Database\Eloquent\Model;
use App\Repository\Interfaces\BooksRepositoryInterface;


class BooksRepository implements BooksRepositoryInterface
{
     private Model $model;
     
     public function __construct(Books $book)
     {
        $this->model = $book;
     }

    public function all():Model
    {       
       return $this->model->get();
    }

    public function withPagination(int $count)
    { 
   
       return  $this->model->with(['writer'])->paginate($count);
    
    }

   public function bookSearch($request)
   {
      $query = $this->model->query();

      return $query->with('writer')->where(function($query) use ($request){
         $query->where('name',$request->value);
         $query->orWhereRelation('writer','name',$request->value);
     })->get(); 
       
   }
}
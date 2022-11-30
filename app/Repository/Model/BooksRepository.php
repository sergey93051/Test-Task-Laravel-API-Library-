<?php

namespace App\Repository\Model;

use App\Models\Books;
use App\Models\Writer;
use Illuminate\Database\Eloquent\Model;
use App\Repository\Interfaces\BooksRepositoryInterface;


class BooksRepository implements BooksRepositoryInterface
{
   private Model $booksModel;
   private Model $writerModel;


   public function __construct(Books $books, Writer $writer)
   {
      $this->booksModel = $books;
      $this->writerModel = $writer;
   }

   public function all()
   {
      return $this->booksModel->with(['writer'])->get();
   }

   public function createBooks($booksDetails)
   {      
      $writerCreated = $this->writerModel->create(["name" => $booksDetails->writer]);

      collect($booksDetails->books)->each(function($book) use($writerCreated){
          $this->booksModel->create([
            "name"  => $book['name'],
            "price" => $book['price'],
            "writer_id" =>  $writerCreated->id
         ]);
      });

   }

   public function deleteBooks($booksDetails)
   {
      return $this->booksModel->destroy($booksDetails);
   }

   public function withPagination(int $count)
   {

      return  $this->booksModel->with(['writer'])->paginate($count);
   }

   public function bookSearch($request)
   {
      $query = $this->booksModel->query();

      return $query->with('writer')->where(function ($query) use ($request) {
         $query->where('name', $request->value);
         $query->orWhereRelation('writer', 'name', $request->value);
      })->get();
   }
}

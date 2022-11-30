<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookSearchRequest;
use App\Http\Resources\BooksResource;
use App\Repository\Interfaces\BooksRepositoryInterface;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    protected $booksRepository;

    public function __construct(BooksRepositoryInterface $booksRepository)
    {
        $this->booksRepository = $booksRepository;
    }

    public function index()
    {
        return BooksResource::collection($this->booksRepository->withPagination(16));
    }

    public function search(BookSearchRequest $request)
    {    
        return BooksResource::collection($this->booksRepository->bookSearch((object)$request->all()));
    }

    public function logout(Request $request)
    {

         $request->user()->token()->revoke();

         return response()->json([
              'message' => 'Successfully logged out'
         ],200);
    }
     

}

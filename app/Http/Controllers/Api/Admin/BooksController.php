<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BooksRequest;
use App\Http\Resources\BooksResource;
use App\Models\RoleManagment;
use App\Models\User;
use App\Repository\Interfaces\BooksRepositoryInterface;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    protected $booksRepository;

    public function __construct(BooksRepositoryInterface $booksRepository)
    {
        $this->booksRepository = $booksRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BooksResource::collection($this->booksRepository->withPagination(16));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BooksRequest $request)
    {
        $this->booksRepository->createBooks((object)$request->all());

        return response()->json([
            'status' => "created",
         ] ,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($book_id)
    {    
         $this->booksRepository->deleteBooks($book_id);

         return response()->json([
            'status' => "deleted",
         ] ,200);
    }
}

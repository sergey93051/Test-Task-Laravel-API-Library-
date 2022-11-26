<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Repository\Interfaces\UsersRepositoryInterface;

class RegisterController extends Controller
{

   protected $usersRepository;

   public function __construct(UsersRepositoryInterface $usersRepository)
   {
       $this->usersRepository = $usersRepository;
   }  

    public function __invoke(RegisterRequest $request)
    { 

           $user = $this->usersRepository->createUser((object) $request->all());

           return response()->json([
                'user' => $user,
                'success' => "created"
             ] ,201);          
          
    }
}

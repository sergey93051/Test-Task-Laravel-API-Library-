<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\Auth\LoginResource;
use Illuminate\Http\Request;
use App\Repository\Interfaces\UsersRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   public function __invoke(LoginRequest $request,UsersRepositoryInterface $usersRepository)
   {

    if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){

         return response()->json([
            "token"  => $usersRepository->createToken(auth()->user())
         ] ,200);
    } 
    else{ 
         return response()->json(['error'=>'Unauthorised'],401);
    } 
   
   }
}

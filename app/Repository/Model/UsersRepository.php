<?php

namespace App\Repository\Model;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Repository\Interfaces\UsersRepositoryInterface;

class UsersRepository  implements UsersRepositoryInterface
{
     private Model $query;
     
     public function __construct(User $user)
     {
        $this->query = $user;
     }

    public function  createUser($usersDetails): Model
    {
        
     return  $this->query->create([
            'name' =>  $usersDetails->name,
            'email' => $usersDetails->email,
            'password' => bcrypt($usersDetails->password)
       ]);   
     
    }

    public function createToken($user) :array
    {       
        $success['_token'] = $user->createToken('myAppToken')->accessToken;

        $success['_user'] = $user->name;

        $success['_email'] = $user->email;
        
        return $success;
    }

}
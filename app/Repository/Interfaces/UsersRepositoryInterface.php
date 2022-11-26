<?php

namespace App\Repository\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface UsersRepositoryInterface
{
     public function createUser($usersDetails): Model; 

     public function createToken($user);
}
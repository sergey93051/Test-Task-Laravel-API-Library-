<?php

namespace App\Repository\Model;

use App\Models\Buyer;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Repository\Interfaces\BuyerRepositoryInterface;


class BuyerRepository implements BuyerRepositoryInterface
{
     private Model $buyerquery;
     private Model $userquery;

     
     public function __construct(Buyer $buyer,User $user)
     {
        $this->buyerquery = $buyer;
        $this->userquery = $user;

     }

     public function buyBooks($buyDetails)
     {

        $user = $this->userquery::find(auth()->user()->id);

        $user->buyer()->detach($buyDetails->book_id);
        $user->buyer()->attach($buyDetails->book_id, ['status' => $buyDetails->status]);   
   
      
     }

     public function showBuyer()
     {                
        return $this->buyerquery->with(['buyer','books'])->get();
     }

     public function showBuyerId(int $id)
     {
        return $this->buyerquery->where('users_id',$id)->with(['buyer','books'])->get();
     }

}
<?php

namespace App\Repository\Model;

use App\Models\Buyer;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Repository\Interfaces\BuyerRepositoryInterface;


class BuyerRepository implements BuyerRepositoryInterface
{
     private Model $buyerModel;
     private Model $userModel;

     
     public function __construct(Buyer $buyer,User $user)
     {
        $this->buyerModel = $buyer;
        $this->userModel = $user;

     }

     public function buyBooks($buyDetails)
     {

        $user = $this->userModel->find(auth()->user()->id);

        $user->buyer()->detach($buyDetails->book_id);
        $user->buyer()->attach($buyDetails->book_id, ['status' => $buyDetails->status]);   
   
      
     }

     public function showBuyer()
     {                
        return $this->buyerModel->with(['buyer','books'])->get();
     }

     public function showBuyerId(int $id)
     {
        return $this->buyerModel->where('users_id',$id)->with(['buyer','books'])->get();
     }

}
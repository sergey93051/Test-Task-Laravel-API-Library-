<?php

namespace App\Repository\Model;

use App\Models\Books;
use App\Models\BooksItem;
use App\Models\UserOrder;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Repository\Interfaces\OrderRepositoryInterface;


class OrderRepository implements OrderRepositoryInterface
{
     private Model $userOrderModel;


     
     public function __construct(UserOrder $userOrder)
     {
        $this->userOrderModel = $userOrder;
     }

     public function showOrders()
     {                
        return $this->userOrderModel->with('booksItem')->get();
     }

     public function newOrder($orderDetails)
     {

     
      $userOrderCreated = $this->userOrderModel->create(
                [
                     "status" => $orderDetails->status,
                     "users_id" => auth()->user()->id
                ]
            );

      $userOrderCreated->booksItem()->attach($orderDetails->books_id);

     } 

     public function showOrderId(int $id)
     {
        return $this->userOrderModel->where('users_id',$id)->with(['booksItem'])->get();
     }

}
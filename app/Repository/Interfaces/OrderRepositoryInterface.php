<?php

namespace App\Repository\Interfaces;


interface OrderRepositoryInterface
{
     public function showOrders();

     public function showOrderId(int $id);

     public function newOrder($orderDetails);

    
}
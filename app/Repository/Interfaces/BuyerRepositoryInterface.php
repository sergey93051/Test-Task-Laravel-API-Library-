<?php

namespace App\Repository\Interfaces;

interface BuyerRepositoryInterface
{
     public function buyBooks($buyDetails);
     
     public function showBuyer();

      public function  showBuyerId(int $id);
}
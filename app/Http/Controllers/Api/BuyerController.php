<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BuyBookseRequest;
use App\Http\Resources\BuyerResourse;
use App\Repository\Interfaces\BuyerRepositoryInterface;

class BuyerController extends Controller
{
    protected $buyerRepository;

    public function __construct(BuyerRepositoryInterface $buyerRepository)
    {
      $this->buyerRepository = $buyerRepository;
    }

    public function buyBooks(BuyBookseRequest $request)
    {         
        $this->buyerRepository->buyBooks((object)$request->all());

        return response()->json([
            'status' => "created",
         ] ,201);
    }

    public function show()
    {
        return  BuyerResourse::collection($this->buyerRepository->showBuyer());          
    }

    public function showBuyerId($id){
     
        return  BuyerResourse::collection($this->buyerRepository->showBuyerId($id));    
    
    }
}

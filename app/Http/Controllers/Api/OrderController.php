<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Repository\Interfaces\OrderRepositoryInterface;
use App\Http\Resources\OrderResourse;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    protected $orderRepository;


    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OrderResourse::collection($this->orderRepository->showOrders()); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        
        $this->orderRepository->newOrder((object)$request->all());

        return response()->json([
            'status' => "created",
         ] ,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return  OrderResourse::collection($this->orderRepository->showOrderId($id)); 
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $orders = Order::with("property", "company", "inspector")->get();
        return $this->success(200, "all orders", $orders);
    }

    public function store(OrderRequest $request)
    {
        $request["client_id"] = Auth::user()->id ?? 7;
        $newOrder = Order::create($request->toArray());
        return $this->success(200, "order added successfully!", $newOrder);
    }

    public function show($id)
    {
        $order = Order::with("property", "company", "inspector")->findOrFail($id);
        return $this->success(200, "order found!", $order);
    }

    public function update(OrderRequest $request, Order $order)
    {
        $request["client_id"] = Auth::user()->id ?? 7;
        $order->update($request->toArray());
        return $this->success(200, "order updated successfully!", $order);
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return $this->success(200, "order deleted successfully!");
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ClientOrderController extends Controller
{
    use ApiResponse;

    function filterorder($order)
    {
        return [
            'id' => $order->id,
            'property' => $order->property,
            'company' => $order->company,
            'inspector' => $order->inspector,
            'report' => $order->report,
            'price' => $order->price,
            'status' => $order['client-status']
        ];
    }

    function index()
    {
        $orders = Project::where("client_id", "!=", null)
        ->where("client_id", auth('api-client')->id())
        ->where('company-status', 'accepted')
        ->where('client-status', '!=', 'pending')->get();

        $data = [];
        foreach ($orders as $order) {
            $data[] = $this->filterorder($order);
        }

        return $this->success(200, "all orders", $data);
    }

    function show($id)
    {
        $order = Project::findOrFail($id);
        $data = $this->filterorder($order);
        return $this->success(200, 'order found!', $data);
    }

    function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        if ($request->has('company-rate') || $request->has('inspector-rate')) {
            $project->update($request->toArray());
            return $this->success(200, 'updated!');
        }
        return $this->failed(402, 'you can update company-rate or inspector-rate only');
    }
}

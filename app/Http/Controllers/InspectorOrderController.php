<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class InspectorOrderController extends Controller
{
    use ApiResponse;


    function filterOrder($data) {
        return [
            'order_id' => $data->id,
            'property' => $data->property,
            'company' => $data->company,
            'price' => $data->price
        ];
    }

    function index() {
        $orders = Project::with('company', 'property')
        ->where('inspector_id', '!=', null)
        ->where('inspector_id', auth('api-inspector')->id())->get();

        $data = [];
        foreach ($orders as $order) {
            $data[] = $this->filterOrder($order);
        }

        return $this->success(200,'all orders', $data);
    }
    
    function show($id) {
        $order = Project::findOrFail($id);

        $data = $this->filterOrder($order);

        return $this->success(200,'order found!', $data);
    }
    
    function update(Request $request, $id) {
        $order = Project::findOrFail($id);
        
        if($request->has('inspector-status')) {
            $order->update($request->toArray());
            return $this->success(200,'order updated!', $order);
        }
        return $this->failed(402,'you can update inspector-status only');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ClientPaymentController extends Controller
{
    use ApiResponse;

    function index() {
        $payments = Payment::with('project')
        ->where('from_id', auth('api-client')->id())
        ->where('from_type', 'client')
        ->where('to_type', 'company')->get();

        $data = [];
        foreach ($payments as $payment) {
            $data[] = [
                'payment_id' => $payment->id,
                'property' => $payment->project->property,
                'price' => $payment->price,
                'paid' => $payment->paid
            ];
        }

        return $this->success(200, 'all paid properties', $data);
    }

    function store(Request $request) {
        $request['from_id'] = auth('api-client')->id();
        $request['from_type'] = "client";
        $request['to_type'] = "company";

        Payment::create($request->toArray());
        return $this->success(200, 'payment added successfully!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class InspectorPaymentController extends Controller
{
    use ApiResponse;

    function index() {
        $payments = Payment::with('project')
            ->where('from_type', 'company')
            ->where('to_id', auth('api-inspector')->id())
            ->where('to_type', 'inspector')->get();

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
}

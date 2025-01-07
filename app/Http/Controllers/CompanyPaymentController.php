<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class CompanyPaymentController extends Controller
{
    use ApiResponse;

    function index() {
        $payments = Payment::with('project')
        ->where('from_id', auth('api-company')->id())
        ->where('from_type', 'company')->get();

        $data = [];
        foreach ($payments as $payment) {
            $data[] = [
                'payment_id' =>$payment->id,
                'property' => $payment->project->property,
                'price' => $payment->price
            ];
        }

        return $this->success(200, 'all paid properties!', $data);
    }
}

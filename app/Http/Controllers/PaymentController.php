<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Models\Payment;
use App\Traits\ApiResponse;

class PaymentController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $payments = Payment::with("company", "property")
        ->where("client_id", auth()->user()->id)->get();
        return $this->success(200, "all client payment", $payments);
    }

    public function show($id) // by company id
    {
        $payments = Payment::with("company", "property")->where("company_id", $id)->get();
        return $this->success(200, "all company payment", $payments);
    }

    public function update($id) // by property id
    {
        $payment = Payment::where("property_id", $id)
        ->where("client_id", auth()->user()->id)->first();
        $payment->update(["paid" => 1]);
        return $this->success(200, "payment updated!", $payment);
    }

    public function store(PaymentRequest $request)
    {
        $request["client_id"] = auth()->user()->id;
        $new_payment = Payment::create($request->toArray());
        return $this->success(200, "payment added successfully!", $new_payment);
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return $this->success(200, "payment deleted successfully!", $payment);
    }
}

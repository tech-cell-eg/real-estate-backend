<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use App\Traits\ApiResponse;

class OfferController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $offers = Offer::all();
        return $this->success(200, "all offers", $offers);
    }

    public function store(OfferRequest $request)
    {
        Offer::create($request->validated());
        return $this->success(200, "offer added successfully!");
    }

    public function show(Offer $offer)
    {
        return $this->success(200, "offer found!", $offer);
    }

    public function update(OfferRequest $request, Offer $offer)
    {
        $offer->update($request->validated());
        return $this->success(200, "offer updated successfully!");
    }

    public function destroy(Offer $offer)
    {
        $offer->delete();
        return $this->success(200, "offer deleted successfully!");
    }
}

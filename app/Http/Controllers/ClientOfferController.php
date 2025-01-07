<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ClientOfferController extends Controller
{
    use ApiResponse;

    function filterOffer($offer) {
        return [
            'id' => $offer->id,
            'property' => $offer->property,
            'company' => $offer->company,
            'offer_price' => $offer->price
        ];
    }

    function index() {
        $offers = Project::with('property', 'company')
        ->where("client_id", "!=", null)
        ->where("client_id", auth('api-client')->id())
        ->where('company-status', 'accepted')->get();

        $data = [];
        foreach ($offers as $offer) {
            $data[] = $this->filterOffer($offer);
        }

        return $this->success(200, "all offers", $data);
    }

    function show($id) {
        $offer = Project::findOrFail($id);
        $data = $this->filterOffer($offer);
        return $this->success(200, 'offer found!', $data);
    }

    function update(Request $request, $id) {
        $project = Project::findOrFail($id);
        if($request->has('client-status')) {
            $project->update($request->toArray());
            return $this->success(200, 'updated!');
        }
        return $this->failed(402, 'you can update client-status only');
    }
}

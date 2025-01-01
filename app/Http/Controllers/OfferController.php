<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use App\Traits\ApiResponse;
use App\Traits\FileControl;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    use ApiResponse, FileControl;

    private $id;

    function __construct()
    {
        $this->id = auth("api-client")->id();
    }

    public function index()
    {
        $offers = Offer::where("client_id", $this->id)->get();
        foreach ($offers as $offer) {
            $offer->file_path = env("APP_URL") . "/storage/". $offer->file_path;
        }
        return $this->success(200, "all offers", $offers);
    }

    public function store(OfferRequest $request)
    {
        $validated = $request->validated();
        $validated["client_id"] = $this->id;

        $validated["file_path"] = $this->uploadFiles($request->file, "uploads/")[0];

        Offer::create($validated);
        $validated->file_path = env("APP_URL") . "/storage/" . $validated->file_path;

        return $this->success(200, "offer added successfully!", $validated);
    }

    public function show($id)
    {
        $offer = Offer::where("client_id", $this->id)->where("id", $id)->first();
        $offer->file_path = env("APP_URL") . "/storage/" . $offer->file_path;
        return $this->success(200, "offer found!", $offer);
    }

    public function update(Request $request, $id)
    {
        $offer = Offer::where("client_id", $this->id)->where("id", $id)->first();

        $request->validate(["status" => "in:pending,accepted,rejected"]);
        $offer->update(["status" => $request->status]);

        $offer->file_path = env("APP_URL") . "/storage/" . $offer->file_path;

        return $this->success(200, "offer updated successfully!", $offer);
    }

    public function destroy(Offer $offer)
    {
        $this->deleteFiles($offer->file_path);
        $offer->delete();
        $offer->file_path = env("APP_URL") . "/storage/" . $offer->file_path;
        return $this->success(200, "offer deleted successfully!", $offer);
    }
}

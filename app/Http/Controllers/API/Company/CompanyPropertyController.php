<?php

namespace App\Http\Controllers\API\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\StorePropertyRequest;
use App\Http\Requests\Company\UpdatePropertyRequest;
use App\Http\Resources\company\PaidProjectsResource;
use App\Models\Image;
use App\Models\Payment;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Auth;

class CompanyPropertyController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::with('images')->where('status','pending')->get();
        return $this->success(200, "all properties", $properties);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropertyRequest $request)
    {
        $validatedData = $request->validated();
        unset($validatedData['images']);
        $property = Property::create($validatedData);
        // Handle image uploads
        foreach ($request->file('images') as $imageFile) {
            $path = $imageFile->store('properties', 'public'); // Store in public disk
            Image::create(['property_id' => $property->id, 'path' => $path]);
        }
        // Reload property with images
        $property->load('images');
        return $this->success(200, "property added successfully!");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $property = Property::with('images')->findOrFail($id);
        return $this->success(200, "property found!", $property);

    }

    public function showAllPaid()
    {
        $companyId = auth('api-company')->user()->id;
        $properties = Payment::with('property')->where('from_id', $companyId)->where('paid', 1)->get();
        return $this->success(200, "All Paid Properties", $properties);
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(UpdatePropertyRequest $request, Property $property)
    {
        $validatedData = $request->validated();
        unset($validatedData['images']);

        $property->update($validatedData);

        // Handle image uploads if any
        if ($request->hasFile('images')) {
            // Optionally, delete existing images
            if ($property->images->isNotEmpty()) {
                foreach ($property->images as $image) {
                    Storage::disk('public')->delete($image->path);
                    $image->delete(); // Delete from DB
                }
            }

            // Store new images
            foreach ($request->file('images') as $imageFile) {
                $path = $imageFile->store('properties', 'public');
                Image::create(['property_id' => $property->id, 'path' => $path]);
            }
        }

        $property->load('images');
        return $this->success(200, "property updated successfully!");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $property = Property::findOrFail($id);

        // Delete associated images
        foreach ($property->images as $image) {
            Storage::disk('public')->delete($image->path);
            $image->delete();
        }

        $property->delete();
        return $this->success(200, "property deleted successfully!");

    }

    public function sendOffer($id,Request $request)
    {
        $property = Property::findOrFail($id);
        $property->status = 'accepted';
        $property->save();
        return $this->success(200, "offer sent successfully!");

    }
}

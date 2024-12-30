<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\StorePropertyRequest;
use App\Http\Requests\Company\UpdatePropertyRequest;
use App\Http\Resources\company\AllPropertiesCollection;
use App\Http\Resources\company\PropertiesResource;
use App\Models\Image;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::with('images')->get();
        return PropertiesResource::collection($properties);
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
        return response()->json($property, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $property = Property::with('images')->findOrFail($id);
        return response()->json($property);
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
            return $property;
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
        return response()->json(null, 204);
    }
}
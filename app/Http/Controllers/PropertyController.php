<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyRequest;
use App\Models\Property;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    use ApiResponse;

    function index() {
        $properties = Property::all();
        return $this->success(200, "all properties", $properties);
    }

    function show(Property $property) {
        return $this->success(200, "property found!", $property);
    }

    function store(PropertyRequest $request) {
        // $request["owner_id"] = Auth::user()->id;
        $request["owner_id"] = 1;
        Property::create($request->validated());
        return $this->success(200, "property added successfully!");
    }

    function update(PropertyRequest $request, Property $property) {
        $property->update($request->validated());
        return $this->success(200, "property updated successfully!");
    }

    function destroy(Property $property) {
        $property->delete();
        return $this->success(200, "property deleted successfully!");
    }
}

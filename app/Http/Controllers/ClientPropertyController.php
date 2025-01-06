<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyRequest;
use App\Models\File;
use App\Models\Property;
use App\Traits\ApiResponse;
use App\Traits\FileControl;
use Illuminate\Http\Request;

class ClientPropertyController extends Controller
{
    use ApiResponse, FileControl;

    function index() {
        $properties = Property::with('images')->where("client_id", auth('api-client')->id())->get();
        return $this->success(200, 'all properties', $properties);
    }

    function store(PropertyRequest $request) {
        $request['client_id'] = auth('api-client')->id();

        $property = Property::create($request->toArray());

        $paths = $this->uploadFiles($request->images, "uploads/");
        foreach ($paths as $path) {
            File::create([
                "property_id" => $property->id,
                "path" => $path,
                "url" => env("APP_URL") . "/storage/" . $path
            ]);
        }

        return $this->success(200 ,"property added successfully!", $property);
    }

    function update(Request $request, Property $property) {
        // $image_paths = $property->images->pluck("path");
        // if($request->hasFile("images")) {
        //     $this->deleteFiles($image_paths);
        //     $paths = $this->uploadFiles($request->images, "uploads/");
        //     foreach ($paths as $path) {
        //         File::create([
        //             "property_id" => $property->id,
        //             "path" => $path,
        //             "url" => env("APP_URL") . "/storage/" . $path
        //         ]);
        //     }
        // }

        $property->update($request->toArray());
        return $this->success(200, "property updated successfully!", $property);
    }

    function destroy(Property $property) {
        // $image_paths = $property->images->pluck("path");
        // $this->deleteFiles($image_paths);
        $property->update(["client_id" => null]);
        // $property->forceDelete(); // مش عارف امسحه :(
        return $this->success(200, "property deleted successfully!", $property);
    }
}

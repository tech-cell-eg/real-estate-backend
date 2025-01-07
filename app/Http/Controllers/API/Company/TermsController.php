<?php

namespace App\Http\Controllers\API\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\TermsRequest;
use App\Models\Terms;
use App\Traits\ApiResponse;

class TermsController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $terms = Terms::all();
        return $this->success(200, "Terms and Conditions", $terms);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TermsRequest $request)
    {
        $validatedData = $request->validated();
        $term = Terms::create($validatedData);
        return response()->json(['message' => 'Term created successfully'], 201);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(TermsRequest $request, Terms $term)
    {
        $validatedData = $request->validated();
        $term->update($validatedData);
        return response()->json(['message' => 'Term updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Terms $term)
    {
        $term->delete();
        return response()->json(['message' => 'Term deleted successfully'], 200);
    }
}

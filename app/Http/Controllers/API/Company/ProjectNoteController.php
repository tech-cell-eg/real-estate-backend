<?php

namespace App\Http\Controllers\API\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\StoreNoteRequest;
use App\Models\ProjectNote;
use App\Traits\ApiResponse;

class ProjectNoteController extends Controller
{
    use ApiResponse;
    public function store(StoreNoteRequest $request){
        $note=ProjectNote::create($request->validated());
        return $this->success(200,'Note Added Successfully',$note);
    }
}

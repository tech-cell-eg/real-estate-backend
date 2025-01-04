<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\StoreNoteRequest;
use App\Models\ProjectNote;
use App\Models\Order;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ProjectNoteController extends Controller
{
    use ApiResponse;
    public function addNote(StoreNoteRequest $request){
        $validatedData = $request->validated();
        $note=ProjectNote::create($validatedData);
        return $this->success(200,'Note Added Successfully');
    }
}

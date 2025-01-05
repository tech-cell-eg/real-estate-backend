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
    public function store(StoreNoteRequest $request){
        $note=ProjectNote::create($request->validated);
        return $this->success(200,'Note Added Successfully');
    }
}

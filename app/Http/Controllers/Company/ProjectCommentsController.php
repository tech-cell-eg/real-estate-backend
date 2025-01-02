<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\StoreProjectCommentsRequest;
use App\Models\ProjectComment;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ProjectCommentsController extends Controller
{
    use ApiResponse;
    public function store(StoreProjectCommentsRequest $request){
        $comment=ProjectComment::create($request->validated());
        return $this->success(200,'Comment Added Successfully');
    }

    public function show(int $projectId){
        $comments=ProjectComment::where('order_id',$projectId)->get();
        return $this->success(200,'Notes Retrieved Successfully',$comments);
        }
}

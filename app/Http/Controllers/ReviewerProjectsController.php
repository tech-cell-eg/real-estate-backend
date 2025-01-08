<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ReviewerProjectsController extends Controller
{
    use ApiResponse;
    function index() {
        $projects = Project::with('property', 'company', 'report')
        ->where('reviewer_id', auth('api-reviewer')->id())
        ->where('reviewer_id', '!=', null)->get();
        return $this->success(200, 'all projects', $projects);
    }

    function show($id) {
        $project = Project::with('property', 'company', 'report')
        ->where('id', $id)->first();
        return $this->success(200, 'project found!', $project);
    }

    function update(Request $request ,$id) {
        $project = Project::find($id);
        if($request->has('reviewer-status')) {
            $project->update([
                'reviewer-status' => $request['reviewer-status']
            ]);
            return $this->success(200, 'project updated!');
        }
        return $this->success(401, 'you can update reviewer-status only');
    }
}

<?php

namespace App\Http\Controllers\API\Company;

use App\Http\Controllers\Controller;
use App\Http\Resources\company\AllProjectsResorce;
use App\Http\Resources\company\ProjectCollection;
use App\Http\Resources\company\ShowProjectsResorce;
use App\Models\Project;
use App\Models\Property;
use App\Traits\ApiResponse;
use App\Traits\AuthUserTrait;
use Illuminate\Http\Request;


class ProjectsController extends Controller
{
    use ApiResponse, AuthUserTrait;

    public function index()
    {
        $user = $this->authUser();
        $projects = Project::with("property", "company", "inspector", 'report')->where('company_id', $user->id)->where('company_id', '!=', null)->paginate();
        return response()->json([
            'status' => 200,
            'message' => 'All Projects',
            'data' => AllProjectsResorce::collection($projects),
            'meta' => AllProjectsResorce::addPaginationMeta($projects),
        ]);
    }

    public function show($id)
    {
        $user = $this->authUser();
        $project = Project::with(['property', 'company', 'inspector', 'report'])->where('company_id', $user->id)->where('company_id', '!=', null)->find($id);
        // If the project is not found, return a 404 response
        if (!$project) {
            return response()->json([
                'status' => 404,
                'message' => 'Project not found',
            ], 404);
        }
        return response()->json([
            'status' => 200,
            'message' => 'Project Details',
            'data' => new ShowProjectsResorce($project),
        ]);
    }


    public function search(Request $request)
    {           // To show project with status accepted or refused
        $user = $this->authUser();
        $status = $request->query('status', 'accepted');
        $projects = Project::with(['property', 'company', 'inspector', 'report'])->where('company_id', $user->id)->where('company_id', '!=', null)->where('status', $status);
        // Validate the status parameter to ensure it's either 'accepted' or 'refused'
        if (!in_array($status, ['accepted', 'rejected'])) {
            return response()->json([
                'status' => 400,
                'message' => 'Invalid status. Please use "accepted" or "rejected".'
            ], 400);
        }

        // Fetch the projects with the desired status
        $projects = Project::with(['property.images', 'company', 'inspector'])
            ->where('status', $status) // filter by status
            ->paginate();

        return response()->json([
            'status' => 200,
            'message' => "{$status} Projects",  // message based on the status
            'data' => AllProjectsResorce::collection($projects),
            'meta' => AllProjectsResorce::addPaginationMeta($projects),
        ]);
    }

    public function sendRequest($id, Request $request)
    {
        $user = $this->authUser();
        $clientID = Property::findOrFail($id)->client_id;
        $project = Project::create([
            'company_id' => $user->id,
            'property_id' => $id,
            'client_id' => $clientID,
            'company-status' => 'accepted',
            'price' => $request->price,
        ]);
        return $this->success(200, 'Project request sent successfully', $project);
    }
}
 


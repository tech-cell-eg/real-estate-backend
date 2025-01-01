<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Resources\company\AllProjectsResorce;
use App\Http\Resources\company\ProjectCollection;
use App\Http\Resources\company\ShowProjectsResorce;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;


class ProjectsController extends Controller
{
    use ApiResponse;
    
    public function index()
    {
        $projects = Order::with("property", "company", "inspector")->paginate();
        return response()->json([
            'status' => 200,
            'message' => 'All Projects',
            'data' => AllProjectsResorce::collection($projects),
            'meta' => AllProjectsResorce::addPaginationMeta($projects),
        ]);
    }

    public function show( $id){
        $project=Order::with(['property', 'company', 'inspector'])->find($id);
        // If the project is not found, return a 404 response
        if (!$project) {
            return response()->json([
                'status' => 404,
                'message' => 'Order not found',
            ], 404);
        }
        return response()->json([
            'status' => 200,
            'message' => 'Project Details',
            'data' => new ShowProjectsResorce($project),
            ]);
    }


    public function search( Request $request){           // To show project with status accepted or refused
        $status = $request->query('status', 'accepted');
        $projects = Order::with(['property', 'company', 'inspector'])->where('status',$status);
        return response()->json([
        'status' => 200,
        'message' => 'Projects with status ' . $status,
        'data' => ProjectCollection::collection($projects),
        'meta' => ProjectCollection::addPaginationMeta($projects),
        ]);
        // Validate the status parameter to ensure it's either 'accepted' or 'refused'
    if (!in_array($status, ['accepted', 'rejected'])) {
        return response()->json([
            'status' => 400,
            'message' => 'Invalid status. Please use "accepted" or "rejected".'
        ], 400);
    }

    // Fetch the projects with the desired status
    $projects = Order::with(['property.images', 'company', 'inspector'])
        ->where('status', $status) // filter by status
        ->paginate();

        return response()->json([
            'status' => 200,
            'message' => "{$status} Projects",  // message based on the status
            'data' => AllProjectsResorce::collection($projects),
            'meta' => AllProjectsResorce::addPaginationMeta($projects),
        ]);
    }
}
 
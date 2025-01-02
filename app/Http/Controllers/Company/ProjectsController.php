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
            return $this->failed(404,'Project not found');
        }
        return $this->success(200,'Project Details',new ShowProjectsResorce($project));
    }

    public function search(Request $request)  {
        $status = $request->query('status', 'accepted');
        $projects = Order::with(['property', 'company', 'inspector'])->where('status',$status);
        
        // Validate the status parameter to ensure it's either 'accepted' or 'refused'
    if (!in_array($status, ['accepted', 'rejected'])) {
        return $this->failed(400, 'Invalid status parameter. Please use "accepted" or "rejected".');
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
 
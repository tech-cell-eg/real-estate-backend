<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Resources\company\ProjectsResource;
use App\Http\Resources\company\AllProjectsResorce;
use App\Http\Resources\company\ProjectCollection;
use App\Http\Resources\company\ShowProjectsResorce;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;


class ProjectsController extends Controller
{
    use ApiResponse;

    public function index(Request $request)
    {
        $projects = Order::with("property.images")->filters($request->query())->paginate();
        $paginatedProjects = ProjectsResource::collection($projects);
        $paginationMeta = ProjectsResource::addPaginationMeta($projects);

        return $this->success(200, 'Projects retrieved successfully', [
            'data' => $paginatedProjects,
            'pagination' => $paginationMeta,
        ]);
    }

    public function show($id)
    {
        $project = Order::with("property.images")->find($id);
        if (!$project) {
            return $this->failed(404, 'Project not found');
        }
        return $this->success(200, 'Project Details', $project);
    }


}

 

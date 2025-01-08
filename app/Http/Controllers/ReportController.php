<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use App\Models\Report;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    use ApiResponse;

    function index() {
        $reports = Report::where('inspector_id', auth('api-inspector')->id())->get();
        return $this->success(200, 'report created successfully!', $reports);
    }

    function show($id) {
        $report = Report::findOrFail($id);
        return $this->success(200, 'report found!', $report);
    }

    function store(ReportRequest $request) {
        $request['inspector_id'] = auth('api-inspector')->id();

        $report = Report::create($request->toArray());

        return $this->success(200, 'report created successfully!', $report);
    }
}

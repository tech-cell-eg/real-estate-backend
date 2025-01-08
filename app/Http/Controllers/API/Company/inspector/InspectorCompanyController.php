<?php

namespace App\Http\Controllers\API\Company\inspector;

use App\Http\Controllers\Controller;
use App\Models\Inspector;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InspectorCompanyController extends Controller
{
    use ApiResponse;

    public function update(Request $request)
    {
        $inspectorId = $request->query('inspector_id');
        $inspector = Inspector::findOrFail($inspectorId);
        $companyId = auth('api-company')->user()->id;
        $inspector->update(['company_id' => $companyId]);
        return $this->success(200, 'Inspector Assigned to the company successfully');
    }
}

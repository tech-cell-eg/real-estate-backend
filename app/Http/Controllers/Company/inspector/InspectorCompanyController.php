<?php

namespace App\Http\Controllers\Company\inspector;

use App\Http\Controllers\Controller;
use App\Models\Inspector;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class InspectorCompanyController extends Controller
{
    use ApiResponse;
    public function update(Request $request)  {
        $inspectorId = $request->query('inspector_id');
        $inspector = Inspector::findOrFail($inspectorId);
        $companyId = 1; 
        $inspector->update(['company_id' => $companyId]);
        return $this->success(200,'Inspector Assigned to the company successfully');
    }
}

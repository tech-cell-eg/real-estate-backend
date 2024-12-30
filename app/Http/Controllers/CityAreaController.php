<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\City;
use App\Traits\ApiResponse;

class CityAreaController extends Controller
{
    use ApiResponse;

    public function cities()
    {
        $cities = City::all();
        return $this->success(200, 'Cities retrieved successfully', $cities);
    }

    public function areas()
    {
        $areas = Area::with('city')->get();
        return $this->success(200, 'Areas retrieved successfully', $areas);
    }

    public function CityAreas(City $city)
    {
        $areas = $city->areas;
        return $this->success(200, 'Areas retrieved successfully', $areas);
    }
}

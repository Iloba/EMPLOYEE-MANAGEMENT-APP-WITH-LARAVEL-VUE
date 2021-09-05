<?php

namespace App\Http\Controllers\Api;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\EmployeeDataController;

class EmployeeDataController extends Controller
{
    public function countries(){
        $countries = Country::all();
        return response()->json($countries);
        
    }

    public function states(){
        
    }

    public function cities(){
        
    }
    public function departments(){
        
    }
}

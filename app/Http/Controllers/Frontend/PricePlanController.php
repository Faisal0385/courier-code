<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PricePlanController extends Controller
{
    public function index()
    {
        return view('client.pricing-plan.pricing-plan');
    } ## End Mehtod
}

<?php

namespace App\Http\Controllers;

use App\Models\PricingPlan;
use App\Models\Testimonial;
use App\Models\Workspace;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $featuredWorkspaces = Workspace::where('is_available', true)
            ->take(6)
            ->get();

        $pricingPlans = PricingPlan::orderBy('price', 'asc')->get();

        $testimonials = Testimonial::where('is_featured', true)
            ->take(3)
            ->get();

        return view('landing', compact('featuredWorkspaces', 'pricingPlans', 'testimonials'));
    }
}

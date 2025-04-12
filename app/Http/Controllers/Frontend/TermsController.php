<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Term;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    public function index()
    {
        $termServices = Term::select('service_name_en', 'service_name_ar')
            ->orderBy('id', 'asc')
            ->groupBy('service_name_en', 'service_name_ar')
            ->get();

        return view('frontEnd.terms', compact('termServices'));
    }

}

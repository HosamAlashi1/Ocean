<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('frontEnd.about',compact('members'));
    }
}

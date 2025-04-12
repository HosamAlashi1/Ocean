<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $works = Work::where('status','1')->where('is_contact_us','1')->get();
        return view('frontEnd.contact',compact('works'));
    }
}

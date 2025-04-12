<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceDetails;
use App\Models\SoftwareSolutionServices;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ServicesController extends Controller
{
    public function index($id = null)
    {
        $services = Service::orderBy('id', 'desc')->take(6)->get();

        if ($id) {
            $works = Work::where('status', '1')->where('service_id', $id)->get();
        } else {
            $works = Work::where('status', '1')->get();
        }


        return view('frontEnd.services', compact('services', 'works','service_details'));
    }

    public function getWorksByService($id)
    {
        $works = Work::where('service_id', $id)->with('images')->get();

        // Map the works to include full URLs for only the first 4 images
        $works = $works->map(function($work) {
            $work->title_en = App::getLocale() == 'ar' ? $work->title_ar : $work->title_en;
            $work->images = $work->images->take(4)->map(function($image) {
                $image->image = asset($image->image); // Generate the full URL
                return $image;
            });
            return $work;
        });

        return response()->json($works);
    }

    public function show($id ,$name){
        $service = Service::find($id);
        if (!$service){
            session()->flash('error', __('messages.the service is not exist'));
            return redirect()->back();
        }
        $works = Work::where('status', '1')->where('service_id', $id)->paginate(6);
        $solution_services = SoftwareSolutionServices::where('service_id', $id)->get();
        $service_details = ServiceDetails::where('service_id', $id)->with('softwareSolutionServices')->get();
//        return $service_details;
        return view('frontEnd.services',compact('service', 'works','solution_services','service_details'));
    }

}

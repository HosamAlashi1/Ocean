<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Client_Satisfcation;
use App\Models\Company;
use App\Models\Customer;
use App\Models\Process;
use App\Models\Question;
use App\Models\Service;
use App\Models\Work;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::where('is_home','!=','0')->orderBy('is_home', 'asc')->get();
        $services_work = Service::where('is_home_work','!=','0')->with('works.images')->orderBy('is_home_work', 'asc')->get();

        $companies = Company::orderBy('id','desc')->take(9)->get();
        $processes = Process::all();
        $questions = Question::get();
        $clients = Client_Satisfcation::all();

        return view('frontEnd.index', compact('services','companies','processes','clients','questions','services_work'));

    }


    public function store(CustomerRequest $request) {
        try {
            $service = implode(',', $request->input('service'));

            Customer::create([
                'name_en' => $request->input('first-name') . ' ' . $request->input('last-name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'message_en' => $request->input('message'),
                'service' => $service,
            ]);

            return response()->json(['success' => true, 'message' => 'Message sent successfully.']);
        } catch (\Illuminate\Validation\ValidationException $ex) {
            return response()->json(['success' => false, 'errors' => $ex->errors()]);
        } catch (\Exception $ex) {
            return response()->json(['success' => false, 'message' => 'An error occurred. Please try again.']);
        }
    }


}

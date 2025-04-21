<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\ServicesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use App\Traits\ImageTrait;

class ServiceController extends Controller
{

    use ImageTrait;

    public function index(ServicesDataTable $dataTable)
    {
        return $dataTable->render('dashboard.services.index');
    }

    public function create()
    {
        return view('dashboard.services.create');
    }


    public function store(ServiceRequest $request)
    {
        try {
            if ($request->has('photo')) {
                $image_path = $this->uploadImage('admin', $request->photo);
            }

            Service::create([
                'desc_en' => $request->input('desc'),
                'desc_ar' => $request->input('desc_ar'),
                'image' => $image_path ?? null,
                'title_ar' => $request->input('title_ar'),
                'title_en' => $request->input('title_en'),
            ]);

            session()->flash('success', __('messages.created successfully.'));
            return redirect()->route('services.index');
        } catch (\Exception $ex) {
            session()->flash('error', __('messages.An error occurred while creating the service. Please try again.'));
            return redirect()->route('services.create');
        }
    }

    public function edit($id)
    {
        try {
            $service = Service::find($id);
            if (!$service) {
                session()->flash('error', __('messages.The service is not exist'));
                return redirect()->route('services.index');
            }
            return view('dashboard.services.edit',compact('service'));
        }catch (\Exception $ex) {
            session()->flash('error', __('messages.There was an error try again'));
            return redirect()->route('services.index');
        }
    }


    public function update(ServiceRequest $request, $id)
    {
//        return $request->all();
        try {
            $service = Service::findorfail($id);
            if ($request->has('photo')) {
                $image_path = $this->uploadImage('admin', $request->photo);
            }

            $service->update([
                'title_ar' => $request->input('title_ar'),
                'title_en' => $request->input('title_en'),
                'desc_en' => $request->input('desc'),
                'desc_ar' => $request->input('desc_ar'),
                'image' => $image_path ?? $service->image,
            ]);
            session()->flash('success', __('messages.updated successfully.'));
            return redirect()->route('services.index');
        } catch (\Exception $ex) {
            session()->flash('error', __('messages.here was an error try again'));
            return redirect()->route('services.edit', $id);
        }
    }


    public function destroy(Service $service)
    {
        $service->delete();
        return response()->json('success');
    }

    public function update_recent_work($id)
    {
        try {
            $work = Service::findOrFail($id);
            $work->show_on_recent_work = !($work->show_on_recent_work == true);
            $work->save();

            return response()->json(['message' => 'show_on_recent_work updated successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e], 500);
        }
    }

    public function update_our_service($id)
    {
        try {
            $work = Service::findOrFail($id);
            $work->show_on_our_service = !($work->show_on_our_service == true);
            $work->save();

            return response()->json(['message' => 'show_on_our_service updated successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e], 500);
        }
    }

}

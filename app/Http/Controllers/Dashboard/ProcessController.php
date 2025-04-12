<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\ProccessesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProcessRequest;
use App\Models\Process;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    use ImageTrait;

    public function index(ProccessesDataTable $dataTable)
    {
        return $dataTable->render('dashboard.process.index');
    }

    public function create()
    {
        return view('dashboard.process.create');
    }


    public function store(ProcessRequest $request)
    {
        try {
            if ($request->has('photo')) {
                $image_path = $this->uploadImage('admin', $request->photo);
            }

            Process::create([
                'name_en' => $request->input('name'),
                'name_ar' => $request->input('name_ar'),
                'desc_en' => $request->input('desc'),
                'desc_ar' => $request->input('desc_ar'),
                'image' => $image_path ?? null,
            ]);

            session()->flash('success', __('messages.created successfully.'));
            return redirect()->route('process.index');
        } catch (\Exception $ex) {
            session()->flash('error', __('messages.An error occurred while creating the process. Please try again.'));
            return redirect()->route('process.create');
        }
    }

    public function edit($id)
    {
        try {
            $process = Process::find($id);
            if (!$process) {
                session()->flash('error', __('messages.The our process is not exist'));
                return redirect()->route('process.index');
            }
            return view('dashboard.process.edit',compact('process'));
        }catch (\Exception $ex) {
            session()->flash('error', __('messages.There was an error try again'));
            return redirect()->route('process.index');
        }
    }


    public function update(ProcessRequest $request, $id)
    {
        try {
            $process = Process::findorfail($id);
            if ($request->has('photo')) {
                $image_path = $this->uploadImage('admin', $request->photo);
            }

            $process->update([
                'name_en' => $request->input('name'),
                'name_ar' => $request->input('name_ar'),
                'desc_en' => $request->input('desc'),
                'desc_ar' => $request->input('desc_ar'),
                'image' => $image_path ?? $process->image,
            ]);
            session()->flash('success', __('messages.updated successfully.'));
            return redirect()->route('process.index');
        } catch (\Exception $ex) {
            session()->flash('error', __('messages.here was an error try again'));
            return redirect()->route('process.edit', $id);
        }
    }


    public function destroy(Process $process)
    {
        $process->delete();
        return response()->json('success');
    }
}

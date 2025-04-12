<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\WorksDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\WorkRequest;
use App\Http\Requests\WorkUpdateRequest;
use App\Models\Service;
use App\Models\Work;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkController extends Controller
{
    use ImageTrait;

    public function index(WorksDataTable $dataTable)
    {
        return $dataTable->render('dashboard.works.index');
    }

    public function list()
    {
        $services = Service::select('id', 'title_en', 'title_ar')->get();
        return response()->json([
            'success' => true,
            'data' => $services
        ]);
    }

    public function store(WorkRequest $request)
    {
        try {
            DB::beginTransaction();

            $imagePath = null;
            if ($request->hasFile('photo')) {
                $imagePath = $this->uploadImage('admin', $request->file('photo'));
            }

            $work = Work::create([
                'service_id' => $request->input('service_id'),
                'image' => $imagePath,
            ]);

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => __('messages.created successfully.'),
                'data' => $work,
            ]);
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => __('messages.An error occurred while creating the work. Please try again.'),
            ], 500);
        }
    }

    public function edit($id)
    {
        try {
            $work = Work::find($id);

            if (!$work) {
                return response()->json([
                    'success' => false,
                    'message' => __('messages.The work is not exist'),
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $work
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => __('messages.There was an error. Please try again.'),
            ], 500);
        }
    }

    public function update(WorkRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $work = Work::findOrFail($id);

            $data = [
                'service_id' => $request->input('service_id'),
            ];

            if ($request->hasFile('photo')) {
                $data['image'] = $this->uploadImage('admin', $request->file('photo'));
            }

            $work->update($data);

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => __('messages.updated successfully.'),
                'data' => $work,
            ]);
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => __('messages.An error occurred while updating the work. Please try again.'),
            ], 500);
        }
    }

    public function destroy(Work $work)
    {
        try {
            $work->delete();
            return response()->json(['success' => true, 'message' => __('messages.deleted successfully.')]);
        } catch (\Exception $ex) {
            return response()->json(['success' => false, 'message' => __('messages.error_deleting')], 500);
        }
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\TagsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{

    public function index(TagsDataTable $dataTable)
    {
        return $dataTable->render('dashboard.tags.index');
    }

    public function store(TagRequest $request)
    {
        try {

            $tag = Tag::create([
                'title_en' => $request->input('title_en'),
                'title_ar' => $request->input('title_ar'),
            ]);

            return response()->json([
                'id' => $tag->id,
                'title' => App::getLocale() == 'ar' ? $tag->title_ar : $tag->title_en,
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => __('messages.An error occurred while creating the tag. Please try again.'),
            ], 500);
        }
    }

    public function edit($id)
    {
        try {
            $tag = Tag::find($id);

            if (!$tag) {
                return response()->json([
                    'success' => false,
                    'message' => __('messages.The tag does not exist'),
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $tag
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => __('messages.There was an error. Please try again.'),
            ], 500);
        }
    }

    public function update(TagRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $tag = Tag::findOrFail($id);

            $tag->update([
                'title_en' => $request->input('title_en'),
                'title_ar' => $request->input('title_ar'),
            ]);

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => __('messages.updated successfully.'),
                'data' => $tag,
            ]);
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => __('messages.An error occurred while updating the tag. Please try again.'),
            ], 500);
        }
    }

    public function destroy(Tag $tag)
    {
        try {
            $tag->delete();
            return response()->json([
                'success' => true,
                'message' => __('messages.deleted successfully.')
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => __('messages.error_deleting')
            ], 500);
        }
    }

}

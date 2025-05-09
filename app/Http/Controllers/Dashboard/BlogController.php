<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\BlogsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Models\Blog;
use App\Models\Blog_Type;
use App\Models\Tag;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    use ImageTrait;

    public function index(BlogsDataTable $dataTable)
    {
        $tags = \App\Models\Tag::all(); // You can sort this if needed
        return $dataTable->render('dashboard.blogs.index', compact( 'tags'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = \App\Models\Tag::all();
        return view('dashboard.blogs.create',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        try {
            DB::beginTransaction();

            // Upload images
            $image_path = $this->uploadImage('admin', $request->file('photo'));
            $image_ar_path = $this->uploadImage('admin', $request->file('photo_ar'));

            // Create blog
            $blog = Blog::create([
                'title_en' => $request->input('title'),
                'title_ar' => $request->input('title_ar'),
                'desc_en' => $request->input('desc'),
                'desc_ar' => $request->input('desc_ar'),
                'date' => $request->input('date'),
                'by' => $request->input('by'),
                'image' => $image_path,
                'image_ar' => $image_ar_path,
                'content_en' => $request->input('content'),
                'content_ar' => $request->input('content_ar'),
            ]);

            // Attach tags (if any)
            if ($request->filled('tags')) {
                $blog->tags()->sync($request->input('tags'));
            }

            // Add blog details (if any)
            if ($request->has('details')) {
                foreach ($request->input('details') as $detail) {
                    if (!empty($detail['url']) || !empty($detail['key_url_en']) || !empty($detail['key_url_ar'])) {
                        $blog->details()->create([
                            'url' => $detail['url'] ?? null,
                            'key_url_en' => $detail['key_url_en'] ?? null,
                            'key_url_ar' => $detail['key_url_ar'] ?? null,
                        ]);
                    }
                }
            }

            DB::commit();
            session()->flash('success', __('messages.created successfully.'));
            return redirect()->route('blog.index');

        } catch (\Exception $ex) {
            DB::rollBack();
            session()->flash('error', __('messages.An error occurred while creating the blog. Please try again.'));
            return redirect()->route('blog.create');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $blog = Blog::find($id);
            if (!$blog) {
                session()->flash('error', __('messages.The blog is not exist'));
                return redirect()->route('blog.index');
            }
            $tags = Tag::all();
            return view('dashboard.blogs.edit',compact('blog', 'tags'));
        }catch (\Exception $ex) {
            session()->flash('error', __('messages.There was an error try again'));
            return redirect()->route('blog.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        try {
            DB::beginTransaction();

            // Update image (EN)
            if ($request->hasFile('photo')) {
                $oldPath = public_path($blog->image);
                if ($blog->image && is_file($oldPath)) {
                    @unlink($oldPath);
                }
                $blog->image = $this->uploadImage('admin', $request->file('photo'));
            }

            // Update image (AR)
            if ($request->hasFile('photo_ar')) {
                $oldArPath = public_path($blog->image_ar);
                if ($blog->image_ar && is_file($oldArPath)) {
                    @unlink($oldArPath);
                }
                $blog->image_ar = $this->uploadImage('admin', $request->file('photo_ar'));
            }

            // Fill other fields
            $blog->fill([
                'title_en' => $request->input('title'),
                'title_ar' => $request->input('title_ar'),
                'desc_en' => $request->input('desc'),
                'desc_ar' => $request->input('desc_ar'),
                'date'     => $request->input('date'),
                'by'       => $request->input('by'),
                'content_en' => $request->input('content'),
                'content_ar' => $request->input('content_ar'),
            ]);

            if ($blog->isDirty()) {
                $blog->save();
            }

            // Sync tags
            $newTags = $request->input('tags', []);
            $currentTags = $blog->tags()->pluck('tags.id')->toArray();
            if (array_diff($newTags, $currentTags) || array_diff($currentTags, $newTags)) {
                $blog->tags()->sync($newTags);
            }

            // Update details
            $newDetails = collect($request->input('details', []))
                ->filter(fn($detail) => !empty($detail['url']) || !empty($detail['key_url_en']) || !empty($detail['key_url_ar']))
                ->values();

            if ($blog->details()->count() !== $newDetails->count()) {
                $blog->details()->delete();
                foreach ($newDetails as $detail) {
                    $blog->details()->create([
                        'url' => $detail['url'] ?? null,
                        'key_url_en' => $detail['key_url_en'] ?? null,
                        'key_url_ar' => $detail['key_url_ar'] ?? null,
                    ]);
                }
            }

            DB::commit();
            session()->flash('success', __('messages.updated successfully.'));
            return redirect()->route('blog.index');

        } catch (\Exception $ex) {
            DB::rollBack();
            session()->flash('error', __('messages.An error occurred while updating the blog. Please try again.'));
            return redirect()->back()->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return response()->json('success');
    }

    public function updateDefault($id)
    {
        try {
            $blog = Blog::find($id);
            $blog->is_default ='1';
            $blog->save();
            $blogs = Blog::where('id','!=',$id)->get();
            foreach ($blogs as $blog){
                $blog->update([
                    'is_default'=>'0'
                ]);
            }

            return response()->json(['message' => 'Status updated successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e], 500);
        }
    }

    public function uploadCkeditorImage(Request $request)
    {
        if ($request->hasFile('file')) {
            $originName = $request->file('file')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('file')->move(public_path('images'), $fileName);
            $url = asset('images/' . $fileName);

            return response()->json([
                'uploaded' => true,
                'link' => $url
            ]);
        }

        return response()->json([
            'uploaded' => false,
            'error' => [
                'message' => 'No file uploaded or invalid file.'
            ]
        ]);
    }


}

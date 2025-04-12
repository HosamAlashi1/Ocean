<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use ImageTrait;
    public function index()
    {
        $settingsTypes = Setting::select('type_en', 'type_ar')
            ->groupBy('type_en', 'type_ar')
            ->orderBy('id', 'asc')
            ->get();

        return view('dashboard.settings.index',compact('settingsTypes'));
    }

    public function update(Request $request)
    {

//        return $request->all();
        // Handle video update
        if ($request->hasFile('video')) {
            $video_path = $this->uploadImage('admin', $request->video);
            $this->update_setting([
                'key_id' => 'blog_video',
                'value' => $video_path,
            ], 'blog_video');
        }

        // Handle image updates
        foreach ($request->all() as $key => $file) {
            if (str_contains($key, 'image') && $request->hasFile($key)) {
                // Upload the new image and update the setting
                $image_path = $this->uploadImage('admin', $request->$key);
                $this->update_setting([
                    'key_id' => $key,
                    'value' => $image_path,
                ], $key);
            }
        }

        // Handle other settings (non-image and non-video)
        foreach ($request->except(['_token', 'video']) as $key => $value) {
            if (!str_contains($key, 'image') && $key !== 'video') {
                $this->update_setting([
                    'key_id' => $key,
                    'value' => $value,
                ], $key);
            }
        }

        return redirect()->back()->with('success', __('messages.Updated successfully'));
    }

    public function update_setting($data,$key){
        return Setting::where('key_id',$key)->update($data);
    }
}

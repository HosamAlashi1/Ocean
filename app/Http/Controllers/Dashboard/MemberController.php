<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\MembersDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\MemberRequest;
use App\Models\Member;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    use ImageTrait;
    public function index(MembersDataTable $dataTable)
    {
        return $dataTable->render('dashboard.members.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberRequest $request)
    {
        try {
            if ($request->has('photo')) {
                $image_path = $this->uploadImage('admin', $request->photo);
            }

            Member::create([
                'name_en' => $request->input('name'),
                'name_ar' => $request->input('name_ar'),
                'job_name_en' => $request->input('job_name'),
                'job_name_ar' => $request->input('job_name_ar'),
                'image' => $image_path ?? null,
            ]);
            
            session()->flash('success', __('messages.created successfully.'));
            return redirect()->route('member.index');
        } catch (\Exception $ex) {
            session()->flash('error', __('messages.An error occurred while creating the member. Please try again.'));
            return redirect()->route('member.create');
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
        //
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
            $member = Member::find($id);
            if (!$member) {
                session()->flash('error', __('messages.The member is not exist'));
                return redirect()->route('member.index');
            }
            return view('dashboard.members.edit',compact('member'));
        }catch (\Exception $ex) {
            session()->flash('error', __('messages.There was an error try again'));
            return redirect()->route('member.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MemberRequest $request, $id)
    {
        try {
            $member = Member::findorfail($id); // Retrieve the User model instance
            if ($request->has('photo')) {
                $image_path = $this->uploadImage('admin', $request->photo);
            }
            $member->update([
                'name_en' => $request->input('name'),
                'name_ar' => $request->input('name_ar'),
                'job_name_en' => $request->input('job_name'),
                'job_name_ar' => $request->input('job_name_ar'),
                'image' => $image_path ?? $member->image,
            ]);
            session()->flash('success', __('messages.updated successfully.'));
            return redirect()->route('member.index');
        } catch (\Exception $ex) {
            session()->flash('error', __('messages.there was an error try again'));
            return redirect()->route('member.edit', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return response()->json('success');
    }
}

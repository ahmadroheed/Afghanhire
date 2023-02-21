<?php

namespace App\Http\Controllers;

use App\_emp_work_experience;
use App\_emp_work_experiences;
use App\Employee;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class workExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $employees = Employee::all()->where('userid',$user->id);
        $experiences = _emp_work_experiences::all()->where('empID',$employees[0]->id);
        return view('admin.workexperience.index',compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.workexperience.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $experience = new _emp_work_experiences();
        $experience -> employer_name = $request->employer_name;
        $experience -> location = $request->location;
        $experience -> start_date = $request->start_date;
        $experience -> end_date = $request->end_date;
        $experience -> job_title = $request->job_title;
        $experience -> job_description = $request->job_desc;
        $user = Auth::user();
        $employees = Employee::all()->where('userid',$user->id);
        $experience -> empID = $employees[0]->id;
        $experience -> save();
        Toastr::success('Work Experience Created','Save');
        return redirect()->route('workexperience');
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
        $experience = _emp_work_experiences::find($id);
        return view('admin.workexperience.edit',compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $experience = _emp_work_experiences::find($id);
        $experience -> employer_name = $request->employer_name;
        $experience -> location = $request->location;
        $experience -> start_date = $request->start_date;
        $experience -> end_date = $request->end_date;
        $experience -> job_title = $request->job_title;
        $experience -> job_description = $request->job_desc;
        $experience -> save();
        Toastr::success('Work experience information successfully updated!','Updated');
        return redirect()->route('workexperience');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $experience = _emp_work_experiences::find($id);
        $experience -> delete();
        Toastr::error('Work experience successfully deleted!','Deleted');
        return redirect()->route('employee');
    }
}

<?php

namespace App\Http\Controllers;

use App\_emp_educations;
use App\_emp_work_experiences;
use App\Employee;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeEducationController extends Controller
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
        $educations = _emp_educations::all()->where('empID',$employees[0]->id);
        return view('admin.education.index',compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.education.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'institution' => 'required',
            'field_study' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'certification' => 'required',
        ]);

        $education = new _emp_educations();
        $education -> institution = $request->institution;
        $education -> field_study = $request->field_study;
        $education -> start_date = $request->start_date;
        $education -> end_date = $request->end_date;
        $education -> certification = $request->certification;
        $user = Auth::user();
        $employees = Employee::all()->where('userid',$user->id);
        $education -> empID = $employees[0]->id;
        $education -> save();
        Toastr::success('Education Created','Save');
        return redirect()->route('education');
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
        $education = _emp_educations::find($id);
        return view('admin.education.edit',compact('education'));
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
        $request -> validate([
            'institution' => 'required',
            'field_study' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'certification' => 'required',
        ]);

        $education = _emp_educations::find($id);
        $education -> institution = $request->institution;
        $education -> field_study = $request->field_study;
        $education -> start_date = $request->start_date;
        $education -> end_date = $request->end_date;
        $education -> certification = $request->certification;
        $user = Auth::user();
        $employees = Employee::all()->where('userid',$user->id);
        $education -> empID = $employees[0]->id;
        $education -> save();
        Toastr::success('Education updated Successfully.','Update');
        return redirect()->route('education');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $education = _emp_educations::find($id);
        $education -> delete();
        Toastr::error('Education successfully deleted!','Deleted');
        return redirect()->route('education');
    }
}

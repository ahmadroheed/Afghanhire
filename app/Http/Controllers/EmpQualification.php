<?php

namespace App\Http\Controllers;

use App\_emp_educations;
use App\_emp_qualification;
use App\Employee;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpQualification extends Controller
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
        $qualifications = _emp_qualification::all()->where('empID',$employees[0]->id);
        return view('admin.qualification.index',compact('qualifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.qualification.create');
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
            'year' => 'required',
            'degree' => 'required',
        ]);

        $qualifications = new _emp_qualification();
        $qualifications -> experience_year = $request->year;
        $qualifications -> degree = $request->degree;
        $qualifications -> management_experience = $request->mexperience;
        $qualifications -> achievement = $request->achievement;
        $user = Auth::user();
        $employees = Employee::all()->where('userid',$user->id);
        $qualifications -> empID = $employees[0]->id;
        $qualifications -> save();
        Toastr::success('Qualification Created','Save');
        return redirect()->route('qualification');
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
        $qualifications = _emp_qualification::find($id);
        return view('admin.qualification.edit',compact('qualifications'));
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
            'year' => 'required',
            'degree' => 'required',
        ]);

        $qualifications = _emp_qualification::find($id);
        $qualifications -> experience_year = $request->year;
        $qualifications -> degree = $request->degree;
        $qualifications -> management_experience = $request->mexperience;
        $qualifications -> achievement = $request->achievement;
        $user = Auth::user();
        $employees = Employee::all()->where('userid',$user->id);
        $qualifications -> empID = $employees[0]->id;
        $qualifications -> save();
        Toastr::success('Qualification Created','Save');
        return redirect()->route('qualification');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $qualification = _emp_qualification::find($id);
        $qualification -> delete();
        Toastr::error('Qualification successfully deleted!','Deleted');
        return redirect()->route('qualification');
    }
}

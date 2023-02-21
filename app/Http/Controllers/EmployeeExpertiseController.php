<?php

namespace App\Http\Controllers;

use App\_emp_educations;
use App\_emp_expertise;
use App\Employee;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeExpertiseController extends Controller
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
        $expertises = _emp_expertise::all()->where('empID',$employees[0]->id);
        return view('admin.expertise.index',compact('expertises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.expertise.create');

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
            'description' => 'required',
        ]);

        $expertise = new _emp_expertise();
        $expertise -> description = $request->description;
        $user = Auth::user();
        $employees = Employee::all()->where('userid',$user->id);
        $expertise -> empID = $employees[0]->id;
        $expertise -> save();
        Toastr::success('Expertise Created','Save');
        return redirect()->route('expertise');
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
        $expertises = _emp_expertise::find($id);
        return view('admin.expertise.edit',compact('expertises'));
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
            'description' => 'required',
        ]);

        $expertise = _emp_expertise::find($id);
        $expertise -> description = $request-> description;
        $user = Auth::user();
        $employees = Employee::all()->where('userid',$user->id);
        $expertise -> empID = $employees[0]->id;
        $expertise -> save();
        Toastr::success('expertise updated Successfully.','Update');
        return redirect()->route('expertise');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expertise = _emp_expertise::find($id);
        $expertise -> delete();
        Toastr::error('Expertise successfully deleted!','Deleted');
        return redirect()->route('expertise');
    }
}

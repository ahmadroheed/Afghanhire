<?php

namespace App\Http\Controllers;

use App\_emp_achievment;
use App\_emp_expertise;
use App\Employee;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpAchievementController extends Controller
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
        $achievements= _emp_achievment::all()->where('empID',$employees[0]->id);
        return view('admin.achievement.index',compact('achievements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.achievement.create');
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
            'achievement' => 'required',
        ]);

        $achievement = new _emp_achievment();
        $achievement -> achievement = $request->achievement;
        $user = Auth::user();
        $employees = Employee::all()->where('userid',$user->id);
        $achievement -> empID = $employees[0]->id;
        $achievement -> save();
        Toastr::success('Achievement Created','Save');
        return redirect()->route('achievement');
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
        $achievements = _emp_achievment::find($id);
        return view('admin.achievement.edit',compact('achievements'));
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
            'achievement' => 'required',
        ]);

        $achievement = _emp_achievment::find($id);
        $achievement -> achievement = $request-> achievement;
        $user = Auth::user();
        $employees = Employee::all()->where('userid',$user->id);
        $achievement -> empID = $employees[0]->id;
        $achievement -> save();
        Toastr::success('achievement updated Successfully.','Update');
        return redirect()->route('achievement');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $achievement = _emp_achievment::find($id);
        $achievement -> delete();
        Toastr::error('achievement successfully deleted!','Deleted');
        return redirect()->route('achievement');
    }
}

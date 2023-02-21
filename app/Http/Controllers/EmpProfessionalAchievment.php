<?php

namespace App\Http\Controllers;

use App\_emp_achievment;
use App\_emp_professional_achievement;
use App\Employee;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpProfessionalAchievment extends Controller
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
        $pachievements= _emp_professional_achievement::all()->where('empID',$employees[0]->id);
        return view('admin.professional achievement.index',compact('pachievements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.professional achievement.create');
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
            'pachievement' => 'required',
        ]);

        $pachievement = new _emp_professional_achievement();
        $pachievement -> professional_achievement = $request->pachievement;
        $user = Auth::user();
        $employees = Employee::all()->where('userid',$user->id);
        $pachievement -> empID = $employees[0]->id;
        $pachievement -> save();
        Toastr::success('professional achievement created','Save');
        return redirect()->route('pachievement');
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
        $pachievements = _emp_professional_achievement::find($id);
        return view('admin.professional achievement.edit',compact('pachievements'));
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
            'pachievement' => 'required',
        ]);

        $pachievement = _emp_professional_achievement::find($id);
        $pachievement -> professional_achievement = $request-> pachievement;
        $user = Auth::user();
        $employees = Employee::all()->where('userid',$user->id);
        $pachievement -> empID = $employees[0]->id;
        $pachievement -> save();
        Toastr::success('professional achievement updated Successfully.','Update');
        return redirect()->route('pachievement');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pachievement = _emp_professional_achievement::find($id);
        $pachievement -> delete();
        Toastr::error('professional achievement successfully deleted!','Deleted');
        return redirect()->route('pachievement');
    }
}

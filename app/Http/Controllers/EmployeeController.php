<?php

namespace App\Http\Controllers;

use App\_emp_achievment;
use App\_emp_educations;
use App\_emp_expertise;
use App\_emp_professional_achievement;
use App\_emp_qualification;
use App\_emp_work_experiences;
use App\City;
use App\Employee;
use App\Salary;
use App\User;
use Gate;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(5);
        return view('admin.employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $employees = Employee::all()->where('userid',$user->id);
        return view('admin.employee.create',compact('employees','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $request -> validate([
            'fname' => 'required',
            'lname' => 'required',
            'image' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'jdate' => 'required',
            'jtype' => 'required',
            'salary' => 'required',
            'age' => 'required',
        ]);

        $employee = new Employee();
        $employee -> first_name = $request -> fname;
        $employee -> last_name = $request -> lname;
       // $employee -> image = $request -> image;
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file -> move('uploads/gallery/', $filename);
            $employee->image = $filename;
        }else{
            $employee->image = '';
        }
        $employee -> email = $request -> email;
        $employee -> phone = $request -> phone;
        $employee -> address = $request -> address;
        $employee -> gender = $request -> gender;
        $employee -> dob = $request -> dob;
        $employee -> join_date = $request -> jdate;
        $employee -> job_type = $request -> jtype;
        $employee -> city = $request -> city;
        $employee -> salary = $request -> salary;
        $employee -> age = $request -> age;
        $employee -> save();
        Toastr::success('Employee successfully added!','Success');
        return redirect()->route('employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Gate::allows('isEmployee')){
            abort(401);
        }
        $employee = Employee::find($id);
        return view('admin.employee.edit',compact('employee'));
    }

    public function getAllEmployeees()
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $allEmployees = Employee::paginate(10);
        return view('admin.employee.all_employee_list',compact('allEmployees'));
    }

    public function getEmployeeExperience($id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $EmployeeExperiences =
            _emp_work_experiences::join('employees','employees.id','=','_emp_work_experiences.empID')
            ->where('empID',$id)
            ->get(['employees.*','_emp_work_experiences.*']);
        return view('admin.employee.employee_workexperience',compact('EmployeeExperiences'));

    }

    public function getEmployeeAchievement($id){
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $EmployeeAchievements =
            _emp_achievment::join('employees','employees.id','=','_emp_achievments.empID')
                ->where('empID',$id)
                ->get(['employees.*','_emp_achievments.*']);
        return view('admin.employee.employee_achievement',compact('EmployeeAchievements'));
    }
    public function getEmployeeEducation($id){
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $EmployeeEducations =
            _emp_educations::join('employees','employees.id','=','_emp_educations.empID')
                ->where('empID',$id)
                ->get(['employees.*','_emp_educations.*']);
        return view('admin.employee.employee_education',compact('EmployeeEducations'));
    }

    public function getEmployeeExpertise($id){
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $EmployeeExpertises =
            _emp_expertise::join('employees','employees.id','=','_emp_expertises.empID')
                ->where('empID',$id)
                ->get(['employees.*','_emp_expertises.*']);
        return view('admin.employee.employee_expertise',compact('EmployeeExpertises'));
    }

    public function getEmployeeProfessionalAchievement($id){
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $EmployeeProfessionalAchievements =
            _emp_professional_achievement::join('employees','employees.id','=','_emp_professional_achievements.empID')
                ->where('empID',$id)
                ->get(['employees.*','_emp_professional_achievements.*']);
        return view('admin.employee.employee_professional_achievement',compact('EmployeeProfessionalAchievements'));
    }
    public function getEmployeeQualification($id){
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $EmployeeQualifications =
            _emp_qualification::join('employees','employees.id','=','_emp_qualifications.empID')
                ->where('empID',$id)
                ->get(['employees.*','_emp_qualifications.*']);
        return view('admin.employee.employee_qualification',compact('EmployeeQualifications'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request -> validate([
            'hrid' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'progress'=>'required',
            'team'=>'required',
        ]);

        $employee = Employee::where('userid',$id)->get();
        if(count($employee) != 0)
        {
            $employee = Employee::find($request->empid);
            $employee -> hr_id = $request -> hrid;
            $employee -> first_name = $request -> fname;
            $employee -> middle_name = $request -> mname;
            $employee -> nick_name = $request -> nname;
            $employee -> last_name = $request -> lname;
            $employee -> gender = $request -> gender;
            $employee -> dob = $request -> dob;
            $employee -> email = $request -> email;
            $employee -> address = $request -> address;
            $employee -> phone = $request -> phone;
            $employee -> progress = $request -> progress;
            $employee -> team = $request -> team;

            if($request->hasfile('image')){
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file -> move('uploads/gallery/', $filename);
                $employee->image = $filename;
            }else{
                $employee->image = '';
            }
            $employee -> save();
            Toastr::success('Employee information successfully updated!','Updated');
        }
        else
        {
            $employee = new Employee();
            $employee -> hr_id = $request -> hrid;
            $employee -> first_name = $request -> fname;
            $employee -> middle_name = $request -> mname;
            $employee -> nick_name = $request -> nname;
            $employee -> last_name = $request -> lname;
            $employee -> gender = $request -> gender;
            $employee -> dob = $request -> dob;
            $employee -> email = $request -> email;
            $employee -> address = $request -> address;
            $employee -> phone = $request -> phone;
            $employee -> progress = $request -> progress;
            $employee -> team = $request -> team;
            if($request->hasfile('image')){
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file -> move('uploads/gallery/', $filename);
                $employee->image = $filename;
            }else{
                $employee->image = '';
            }
            $employee -> userid = $id;
            $employee -> save();
            Toastr::success('Employee information successfully updated!','Updated');
        }
        return redirect()->route('employee.create');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $employee = Employee::find($id);
        $employee -> delete();
        Toastr::error('Employee successfully deleted!','Deleted');
        return redirect()->route('employee');
    }
}

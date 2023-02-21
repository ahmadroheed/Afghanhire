<?php

namespace App\Http\Controllers;

use App\_emp_qualification;
use App\anham_applicants;
use App\ApplicantsFiles;
use App\Employee;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

$id = 0;

class AnhamApplicantsController extends Controller
{
    public function index(Request $request)
    {

        $all_applicants = anham_applicants::all();
        return view('admin.employee.all_applicants_list', compact('all_applicants'));
    }

    public function createStep1(Request $request)
    {
        $employees = anham_applicants::where('userid',Auth::user()->id)->get();
//        return view('admin.employee.step1', compact('employees'));
        return view('admin.employee.step1', compact('employees'));
    }

    public function PostcreateStep1(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'faname' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phoneno' => 'required',
            'dob' => 'required',
            'old_nic_number' => 'required_without:enic_number',
            'enic_number' => 'required_without:old_nic_number',
        ]);

        $employees_data = anham_applicants::where('userid',Auth::user()->id)->get();
        if(count($employees_data) != 0)
        {
            $employee =  anham_applicants::find($request->id);
            $employee -> FirstMiddleNames = $request -> fname;
            $employee -> LastName = $request -> lname;
            $employee -> FatherName = $request -> faname;
            $employee -> Gender = $request -> gender;
            $employee -> Email = $request -> email;
            $employee -> address = $request -> address;
            $employee -> MobilePhone = $request -> phoneno;
            $employee -> Passport = $request -> passportno;
            $employee -> dob = $request -> dob;
            $employee -> Old_NIC = $request -> old_nic_number;
            $employee -> ENIC = $request -> enic_number;
            $employee -> userid = Auth::user()->id;
            $employee -> save();
            $ids = $employee->id;
        }
        else
        {
            $employee =  new anham_applicants();
            $employee -> FirstMiddleNames = $request -> fname;
            $employee -> LastName = $request -> lname;
            $employee -> FatherName = $request -> faname;
            $employee -> Gender = $request -> gender;
            $employee -> Email = $request -> email;
            $employee -> address = $request -> address;
            $employee -> MobilePhone = $request -> phoneno;
            $employee -> Passport = $request -> passportno;
            $employee -> dob = $request -> dob;
            $employee -> Old_NIC = $request -> old_nic_number;
            $employee -> ENIC = $request -> enic_number;
            $employee -> userid = Auth::user()->id;
            $employee -> save();
            $ids = $employee->id;
        }
        Toastr::success('Personal Information successfully added!','Success');
        return view('admin.employee.step2',compact('employees_data','ids'));
    }

    public function createStep2(Request $request)
    {
        $employees_data = anham_applicants::where('userid',Auth::user()->id)->get();
        if(count($employees_data) != 0)
        {
            return view('admin.employee.step2', compact('employees_data'));
        }
        else{
            return redirect('/register-step-1');
        }
    }

    public function PostcreateStep2(Request $request)
    {
        $request->validate([
            'usgcontract' => 'required',
            'hrAvailable' => 'required',
            'HRNumber' => 'required',
            'badgeid' => 'required',
            'usgcontractor' => 'required_without:usgdirectemployer',
            'usgdirectemployer' => 'required_without:usgcontractor',
            'jobtitle' => 'required',
            'joblocation' => 'required',
            'jobduties' => 'required',
            'directsupervisor' => 'required',
            'startdate' => 'required',
            'enddate' => 'required',
            'ending_reason' => 'required',
        ]);

        $employees_data = anham_applicants::where('userid',Auth::user()->id)->get();
        $employee =  anham_applicants::find($employees_data[0]->id);
        $employee -> HRAvailable = $request -> hrAvailable;
        $employee -> HRNumber = $request -> HRNumber;
        $employee -> Badge = $request -> badgeid;
        $employee -> USGContract = $request -> usgcontract;
        $employee -> Subcontractor = $request -> usgcontractor;
        $employee -> directemployername = $request -> usgdirectemployer;
        $employee -> JobTitle = $request -> jobtitle;
        $employee -> JobLocation = $request -> joblocation;
        $employee -> JobDuties = $request -> jobduties;
        $employee -> SupvrName = $request -> directsupervisor;
        $employee -> SupvrTitle = $request -> supervisorposition;
        $employee -> SupvrEmailWork = $request -> supervisorworkemail;
        $employee -> SupvrEmailOther = $request -> supervisorpersonalemail;
        $employee -> SupvrPhone = $request -> supervisorcontactno;
        $employee -> EmpStartDate = $request -> startdate;
        $employee -> EmpEndDate = $request -> enddate;
        $employee -> EmpEndReason = $request -> ending_reason;
        $employee -> save();
        $ids = $employee->id;

        Toastr::success('Employer Information successfully added!','Success');
        return view('admin.employee.step3',compact('employees_data','ids'));
    }

    public function createStep3(Request $request)
    {
        $employees_data = anham_applicants::where('userid',Auth::user()->id)->get();
        if(count($employees_data) != 0)
        {
            return view('admin.employee.step3', compact('employees_data'));
        }
        else{
            return redirect('/register-step-1');
        }

    }

    public function PostcreateStep3(Request $request)
    {
        $request->validate([
            'Threats' => 'required',
        ]);

        $employess_data  = anham_applicants::where('userid',Auth::user()->id)->get();
        $applicants_files = ApplicantsFiles::all()->where('applicant_id',$employess_data[0]->id);
        $employees =  anham_applicants::find($request->applicants_id);
        $employees -> SIVCaseNo = $request -> SIVCaseNo;
        $employees -> Dependents = $request -> numFamDep;
        $employees -> Hardships = $request -> Hardships;
        $employees -> Threats = $request -> Threats;
        $employees -> HigherEdYears = $request -> numHighEducation;
        $employees -> HigherEdLevel = $request -> highestEducation;
        $employees -> EngReading = $request -> englishreading;
        $employees -> EngWriting = $request -> englishwritting;
        $employees -> EngListening = $request -> englishlistening;
        $employees -> EngSpeaking = $request -> englishspeaking;
        $employees -> SkillsProf = $request -> professionalSkills;
        $employees -> SkillsIT = $request -> computerSkills;
        $employees -> save();
        $ids = $employees->id;
        Toastr::success('Additional Information successfully added!','Success');
        return view('admin.employee.step4',compact('ids','employess_data','applicants_files'));
    }


    public function createStep4(Request $request)
    {
        $employess_data  = anham_applicants::where('userid',Auth::user()->id)->get();
        if(count($employess_data) != 0)
        {
            $applicants_files = ApplicantsFiles::all()->where('applicant_id',$employess_data[0]->id);
            return view('admin.employee.step4', compact('applicants_files','employess_data'));
        }
        else{
            return redirect('/register-step-1');
        }

    }

    public function PostcreateStep4(Request $request)
    {
        $request->validate([
            'filetype' => 'required',
            'file' => 'required',
        ]);
        $employees =  anham_applicants::find($request->applicants_id);
        $userData = User::where('id', Auth::user()->id)->get();
        // files
        if($request->hasfile('file')){
            $file = $request->file('file');
            $filetype = $request->filetype;
            if($filetype == "Other")
            {
                $request->validate([
                    'fileNameOther' => 'required',
                ]);
            }
            $extension = $file->getClientOriginalExtension();
            $name = $userData[0]-> userid.'-'.$employees->LastName.'-'.$request->filetype;
            $filename = $name.'.'.$extension;
            $file -> move('uploads/Applicants Files/', $filename);
            $applicantsFiles = new ApplicantsFiles();
            $applicantsFiles->filename = $request->filetype;
            $applicantsFiles->filenameother = $request->fileNameOther;
            $applicantsFiles->path = $filename;
            $applicantsFiles->applicant_id = $request->applicants_id;
            $applicantsFiles->save();
        }
        Toastr::success('Supporting documents uploaded successfully!','Success');
        return redirect('/register-create-step-4');
    }

    public function createStep5(Request $request)
    {
        $register = $request->session()->get('register');
        return redirect('/register-step-1');
    }

    public function removeImage(Request $request)
    {
        $register = $request->session()->get('register');

        $register->productImg = null;

        return view('admin.employee.step3', compact('register'));
    }

    public function store(Request $request)
    {
        $register = $request->session()->get('register');
        return redirect('/data');
    }
    public function finalized($id){
        $applicants = anham_applicants::find($id);
        $applicants -> isFinalized = 'Yes';
        $applicants->save();
        Toastr::success('The Process is completed!','completed');
        return redirect('/register-step-1');
    }
    public function deletefile($id)
    {
        $file = ApplicantsFiles::find($id);
        $file_path  =  "uploads/Applicants Files/" . $file->path;
        File::delete($file_path);
        $file -> delete();
        Toastr::error('file successfully deleted!','Deleted');
        return redirect('/register-create-step-4');
    }

    public function getEmployeeFiles($id){
        $employees_files = ApplicantsFiles::join('anham_applicants','anham_applicants.id','=','applicants_files.applicant_id')
            ->where('applicant_id',$id)
            ->get(['anham_applicants.*','applicants_files.*']);
        return view('admin.employee.viewemployeefiles',compact('employees_files'));
    }
}

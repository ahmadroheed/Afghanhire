<?php
use \App\Http\Controllers\RegisterController;
use \App\Http\Controllers\AnhamApplicantsController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('/', function () {
//    return view('welcome');
//});
Route::group(['middleware' => 'auth'], function (){

    Route::get('/register-step-1', [AnhamApplicantsController::class, 'createStep1'])->name('createStep1');
    Route::post('/register-post-step-1', [AnhamApplicantsController::class,'PostcreateStep1'])->name('register.post.step.1');
    Route::get('/register-create-step-2', [AnhamApplicantsController::class,'createStep2'])->name('register.create.step.2');
    Route::post('/register-post-step-2', [AnhamApplicantsController::class,'PostcreateStep2'])->name('register.post.step.2');
    Route::get('/register-create-step-3', [AnhamApplicantsController::class,'createStep3'])->name('register.create.step.3');
    Route::post('/register-post-step-3', [AnhamApplicantsController::class,'PostcreateStep3'])->name('register.post.step.3');
    Route::get('/register-create-step-4', [AnhamApplicantsController::class,'createStep4'])->name('register.create.step.4');
    Route::post('/register-post-step-4', [AnhamApplicantsController::class,'PostcreateStep4'])->name('register.post.step.4');
    Route::get('/register-create-step-5', [AnhamApplicantsController::class,'createStep5'])->name('register.create.step.5');
    Route::get('get/files/{id}',[AnhamApplicantsController::class,'getEmployeeFiles'])->name('view.files');

    Route::get('/Applicants-List', [AnhamApplicantsController::class,'index'])->name('applicants.list');
    Route::get('delete/file/{id}',       [ 'as'=>'file.delete',          'uses' => 'AnhamApplicantsController@deletefile']);
    Route::get('finalized/applicants/{id}',       [ 'as'=>'applicants.finalized',          'uses' => 'AnhamApplicantsController@finalized']);

    Route::get('dashboard',              [ 'as'=>'dashboard',            'uses' => 'DashboardController@index']);
    Route::get('user',                   [ 'as'=>'user',                 'uses' => 'UserController@index']);
    Route::get('user/create',            [ 'as'=>'user.create',          'uses' => 'UserController@create']);
    Route::post('user/store',            [ 'as'=>'user.store',           'uses' => 'UserController@store']);
    Route::get('user/view/{id}',         [ 'as'=>'user.view',            'uses' => 'UserController@view']);
    Route::get('user/edit/{id}',         [ 'as'=>'user.edit',            'uses' => 'UserController@edit']);
    Route::post('user/update/{id}',           [ 'as'=>'user.update',     'uses' => 'UserController@update']);
    Route::get('user/delete/{id}',       [ 'as'=>'user.delete',          'uses' => 'UserController@delete']);
    Route::get('user/search',       [ 'as'=>'user.search',      'uses' => 'UserController@search']);
    Route::get('employee',               [ 'as'=>'employee',              'uses' => 'EmployeeController@index']);
    Route::get('employee/create',        [ 'as'=>'employee.create',       'uses' => 'EmployeeController@create']);
    Route::post('employee/store',        [ 'as'=>'employee.store',        'uses' => 'EmployeeController@store']);
    Route::get('employee/edit/{id}',     [ 'as'=>'employee.edit',         'uses' => 'EmployeeController@edit']);
    Route::post('employee/update/{id}',  [ 'as'=>'employee.update',       'uses' => 'EmployeeController@update']);
    Route::get('employee/delete/{id}',   [ 'as'=>'employee.delete',       'uses' => 'EmployeeController@delete']);
    Route::get('designation',               [ 'as'=>'designation',              'uses' => 'DesignationController@index']);
    Route::get('designation/create',        [ 'as'=>'designation.create',       'uses' => 'DesignationController@create']);
    Route::post('designation/store',        [ 'as'=>'designation.store',        'uses' => 'DesignationController@store']);
    Route::get('designation/edit/{id}',     [ 'as'=>'designation.edit',         'uses' => 'DesignationController@edit']);
    Route::post('designation/update/{id}',  [ 'as'=>'designation.update',       'uses' => 'DesignationController@update']);
    Route::get('designation/delete/{id}',   [ 'as'=>'designation.delete',       'uses' => 'DesignationController@delete']);
    Route::get('department',               [ 'as'=>'department',              'uses' => 'DepartmentController@index']);
    Route::get('department/create',        [ 'as'=>'department.create',       'uses' => 'DepartmentController@create']);
    Route::post('department/store',        [ 'as'=>'department.store',        'uses' => 'DepartmentController@store']);
    Route::get('department/edit/{id}',     [ 'as'=>'department.edit',         'uses' => 'DepartmentController@edit']);
    Route::post('department/update/{id}',  [ 'as'=>'department.update',       'uses' => 'DepartmentController@update']);
    Route::get('department/delete/{id}',   [ 'as'=>'department.delete',       'uses' => 'DepartmentController@delete']);
    Route::get('designation',               [ 'as'=>'designation',              'uses' => 'DesignationController@index']);
    Route::get('designation/create',        [ 'as'=>'designation.create',       'uses' => 'DesignationController@create']);
    Route::post('designation/store',        [ 'as'=>'designation.store',        'uses' => 'DesignationController@store']);
    Route::get('designation/edit/{id}',     [ 'as'=>'designation.edit',         'uses' => 'DesignationController@edit']);
    Route::post('designation/update/{id}',  [ 'as'=>'designation.update',       'uses' => 'DesignationController@update']);
    Route::get('designation/delete/{id}',   [ 'as'=>'designation.delete',       'uses' => 'DesignationController@delete']);
    Route::get('salary',               [ 'as'=>'salary',              'uses' => 'SalaryController@index']);
    Route::get('salary/create',        [ 'as'=>'salary.create',       'uses' => 'SalaryController@create']);
    Route::post('salary/store',        [ 'as'=>'salary.store',        'uses' => 'SalaryController@store']);
    Route::get('salary/edit/{id}',     [ 'as'=>'salary.edit',         'uses' => 'SalaryController@edit']);
    Route::post('salary/update/{id}',  [ 'as'=>'salary.update',       'uses' => 'SalaryController@update']);
    Route::get('salary/delete/{id}',   [ 'as'=>'salary.delete',       'uses' => 'SalaryController@delete']);
    Route::get('city',               [ 'as'=>'city',              'uses' => 'CityController@index']);
    Route::get('city/create',        [ 'as'=>'city.create',       'uses' => 'CityController@create']);
    Route::post('city/store',        [ 'as'=>'city.store',        'uses' => 'CityController@store']);
    Route::get('city/edit/{id}',     [ 'as'=>'city.edit',         'uses' => 'CityController@edit']);
    Route::post('city/update/{id}',  [ 'as'=>'city.update',       'uses' => 'CityController@update']);
    Route::get('city/delete/{id}',   [ 'as'=>'city.delete',       'uses' => 'CityController@delete']);
    Route::get('shift',               [ 'as'=>'shift',              'uses' => 'ShiftController@index']);
    Route::get('shift/create',        [ 'as'=>'shift.create',       'uses' => 'ShiftController@create']);
    Route::post('shift/store',        [ 'as'=>'shift.store',        'uses' => 'ShiftController@store']);
    Route::get('shift/edit/{id}',     [ 'as'=>'shift.edit',         'uses' => 'ShiftController@edit']);
    Route::post('shift/update/{id}',  [ 'as'=>'shift.update',       'uses' => 'ShiftController@update']);
    Route::get('shift/delete/{id}',   [ 'as'=>'shift.delete',       'uses' => 'ShiftController@delete']);
    Route::get('leave',               [ 'as'=>'leave',              'uses' => 'LeaveController@index']);
    Route::get('leave/create',        [ 'as'=>'leave.create',       'uses' => 'LeaveController@create']);
    Route::post('leave/store',        [ 'as'=>'leave.store',        'uses' => 'LeaveController@store']);
    Route::get('leave/search',       [ 'as'=>'leave.search',      'uses' => 'LeaveController@search']);
//    Route::get('leave/edit/{id}',     [ 'as'=>'leave.edit',         'uses' => 'LeaveController@edit']);
//    Route::post('leave/update/{id}',  [ 'as'=>'leave.update',       'uses' => 'LeaveController@update']);
//    Route::get('leave/delete/{id}',   [ 'as'=>'leave.delete',       'uses' => 'LeaveController@delete']);
    Route::post('leave/approve/{id}',        [ 'as'=>'leave.approve',        'uses' => 'LeaveController@approve']);
    Route::post('leave/paid/{id}',        [ 'as'=>'leave.paid',        'uses' => 'LeaveController@paid']);
//    Route::post('leave/pending/{id}',        [ 'as'=>'leave.pending',        'uses' => 'LeaveController@pending']);
//    Route::post('leave/reject/{id}',        [ 'as'=>'leave.reject',        'uses' => 'LeaveController@reject']);
    Route::get('total-leave',               [ 'as'=>'total-leave',              'uses' => 'TotalLeaveController@index']);
    Route::get('total-leave/create',        [ 'as'=>'total-leave.create',       'uses' => 'TotalLeaveController@create']);
    Route::post('total-leave/store',        [ 'as'=>'total-leave.store',        'uses' => 'TotalLeaveController@store']);
    Route::get('total-leave/edit/{id}',     [ 'as'=>'total-leave.edit',         'uses' => 'TotalLeaveController@edit']);
    Route::post('total-leave/update/{id}',  [ 'as'=>'total-leave.update',       'uses' => 'TotalLeaveController@update']);
    Route::get('total-leave/delete/{id}',   [ 'as'=>'total-leave.delete',       'uses' => 'TotalLeaveController@delete']);
    Route::get('managesalary',                    [ 'as'=>'managesalary',                   'uses' => 'ManagesalaryController@index']);
    Route::get('managesalary/detail/{id}',        [ 'as'=>'managesalary.detail',           'uses' => 'ManagesalaryController@detail']);
    Route::post('managesalary/store',             [ 'as'=>'managesalary.store',           'uses' => 'ManagesalaryController@store']);
    Route::get('managesalary/salarylist',         [ 'as'=>'managesalary.salarylist',           'uses' => 'ManagesalaryController@salarylist']);
    Route::get('managesalary/makepayment',        [ 'as'=>'managesalary.makepayment',               'uses' => 'ManagesalaryController@makepayment']);
    Route::post('managesalary/make-advance',      [ 'as'=>'managesalary.makeadvance',               'uses' => 'ManagesalaryController@makeAdvance']);
//    Route::post('managesalary/search',            [ 'as'=>'managesalary.search',               'uses' => 'ManagesalaryController@search']);
    Route::get('event', ['as'=>'event', 'uses' => 'EventController@event']);
    Route::post('event/store', ['as'=>'event.store', 'uses' => 'EventController@store']);
    Route::get('calendar',['as'=>'calendar', 'uses' => 'CalendarController@index']);
    Route::get('calendar/add',['as'=>'calendar.add', 'uses' =>'CalendarController@add']);
    Route::post('calendar/store',['as'=>'calendar.store', 'uses' =>'CalendarController@store']);
    Route::get('profile',                   [ 'as'=>'profile',                   'uses' => 'ProfileController@index']);
    Route::get('change-password',           [ 'as'=>'change.password',           'uses' => 'ProfileController@changePassword']);
    Route::post('update-password',['as'=>'update.password','uses' => 'ProfileController@updatePassword']);
    Route::get('downloads',                 [ 'as'=>'download',                   'uses' => 'DownloadController@index']);

//    Work Experience routes

    Route::get('workexperience',['as'=>'workexperience','uses' => 'workExperienceController@index']);
    Route::get('experience/create',['as'=>'experience.create','uses' => 'workExperienceController@create']);
    Route::post('experience/store',['as'=>'experience.store','uses' => 'workExperienceController@store']);
    Route::get('experience/edit/{id}',[ 'as'=>'experience.edit','uses' =>'workExperienceController@edit']);
    Route::get('experience/delete/{id}',[ 'as'=>'experience.delete','uses' => 'workExperienceController@destroy']);
    Route::post('experience/update/{id}',  [ 'as'=>'experience.update','uses' => 'workExperienceController@update']);

//    Education routes
    Route::get('education',['as'=>'education','uses' => 'EmployeeEducationController@index']);
    Route::get('education/create',['as'=>'education.create','uses' => 'EmployeeEducationController@create']);
    Route::post('education/store',['as'=>'education.store','uses' => 'EmployeeEducationController@store']);
    Route::get('education/edit/{id}',[ 'as'=>'education.edit','uses' =>'EmployeeEducationController@edit']);
    Route::get('education/delete/{id}',[ 'as'=>'education.delete','uses' => 'EmployeeEducationController@destroy']);
    Route::post('education/update/{id}',[ 'as'=>'education.update','uses' => 'EmployeeEducationController@update']);

    //    Expertise routes
    Route::get('expertise',['as'=>'expertise','uses' => 'EmployeeExpertiseController@index']);
    Route::get('expertise/create',['as'=>'expertise.create','uses' => 'EmployeeExpertiseController@create']);
    Route::post('expertise/store',['as'=>'expertise.store','uses' => 'EmployeeExpertiseController@store']);
    Route::get('expertise/edit/{id}',[ 'as'=>'expertise.edit','uses' =>'EmployeeExpertiseController@edit']);
    Route::get('expertise/delete/{id}',[ 'as'=>'expertise.delete','uses' => 'EmployeeExpertiseController@destroy']);
    Route::post('expertise/update/{id}',[ 'as'=>'expertise.update','uses' => 'EmployeeExpertiseController@update']);


//    Achievement routes
    Route::get('achievement',['as'=>'achievement','uses' => 'EmpAchievementController@index']);
    Route::get('achievement/create',['as'=>'achievement.create','uses' => 'EmpAchievementController@create']);
    Route::post('achievement/store',['as'=>'achievement.store','uses' => 'EmpAchievementController@store']);
    Route::get('achievement/edit/{id}',[ 'as'=>'achievement.edit','uses' =>'EmpAchievementController@edit']);
    Route::get('achievement/delete/{id}',[ 'as'=>'achievement.delete','uses' => 'EmpAchievementController@destroy']);
    Route::post('achievement/update/{id}',[ 'as'=>'achievement.update','uses' => 'EmpAchievementController@update']);


    //    professional Achievement routes
    Route::get('pachievement',['as'=>'pachievement','uses' => 'EmpProfessionalAchievment@index']);
    Route::get('pachievement/create',['as'=>'pachievement.create','uses' => 'EmpProfessionalAchievment@create']);
    Route::post('pachievement/store',['as'=>'pachievement.store','uses' => 'EmpProfessionalAchievment@store']);
    Route::get('pachievement/edit/{id}',[ 'as'=>'pachievement.edit','uses' =>'EmpProfessionalAchievment@edit']);
    Route::get('pachievement/delete/{id}',[ 'as'=>'pachievement.delete','uses' => 'EmpProfessionalAchievment@destroy']);
    Route::post('pachievement/update/{id}',[ 'as'=>'pachievement.update','uses' => 'EmpProfessionalAchievment@update']);

    //    employee qualification routes
    Route::get('qualification',['as'=>'qualification','uses' => 'EmpQualification@index']);
    Route::get('qualification/create',['as'=>'qualification.create','uses' => 'EmpQualification@create']);
    Route::post('qualification/store',['as'=>'qualification.store','uses' => 'EmpQualification@store']);
    Route::get('qualification/edit/{id}',[ 'as'=>'qualification.edit','uses' =>'EmpQualification@edit']);
    Route::get('qualification/delete/{id}',[ 'as'=>'qualification.delete','uses' => 'EmpQualification@destroy']);
    Route::post('qualification/update/{id}',[ 'as'=>'qualification.update','uses' => 'EmpQualification@update']);


    //All Employees route
    Route::get('all/employee',['as'=>'employee.all','uses' => 'EmployeeController@getAllEmployeees']);
    Route::get('get/employee/experience/{id}',['as'=>'employee.experience','uses' => 'EmployeeController@getEmployeeExperience']);
    Route::get('get/employee/achievement/{id}',['as'=>'employee.achievement','uses' => 'EmployeeController@getEmployeeAchievement']);
    Route::get('get/employee/education/{id}',['as'=>'employee.education','uses' => 'EmployeeController@getEmployeeEducation']);
    Route::get('get/employee/expertise/{id}',['as'=>'employee.expertise','uses' => 'EmployeeController@getEmployeeExpertise']);
    Route::get('get/employee/professional/achievement/{id}',['as'=>'employee.professional.achievement','uses' => 'EmployeeController@getEmployeeProfessionalAchievement']);
    Route::get('get/employee/qualification/{id}',['as'=>'employee.qualification','uses' => 'EmployeeController@getEmployeeQualification']);

    // import user data
    Route::get('/file-import',[UserController::class,'importView'])->name('import-view');
    Route::post('/import',[UserController::class,'import'])->name('import');
    Route::get('/export-users',[UserController::class,'exportUsers'])->name('export-users');

});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/',['as'=>'home','uses'=> 'HomeController@index']);


<?php

namespace App\Http\Controllers;
use App\Exports\ExportUser;
use App\Imports\ImportUser;
use Brian2694\Toastr\Facades\Toastr;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }

        $users = User::all();
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        return view('admin.user.create');
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
            'username' => 'required',
            'image' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'status' => 'required',

    ]);
        $user = new User();
        $user -> username = $request -> username;
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file -> move('uploads/gallery/', $filename);
            $user->image = $filename;
        }else{
            $user->image = '';
        }
        $user -> first_name = $request -> fname;
        $user -> last_name = $request -> lname;
        $user -> role = $request -> role;
        $user -> email = $request -> email;
        $user -> password = Hash::make($request -> password);
        $user -> status = $request -> status;
        $user -> save();
        Toastr::success('Employee successfully added!','Success');
        return redirect()->route('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $user = User::find($id);
        return view('admin.user.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $request -> validate([
            'username' => 'required',
            'image' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'status' => 'required',
        ]);
        $user = User::find($id);
        $user -> username = $request -> username;
//        $user -> image = $request -> image;
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file -> move('uploads/gallery/', $filename);
            $user->image = $filename;
        }else{
//            return $request;
            $user->image = '';
        }
        $user -> first_name = $request -> fname;
        $user -> last_name = $request -> lname;
        $user -> role = $request -> role;
        $user -> email = $request -> email;
        $user -> status = $request -> status;
        $user -> save();
        Toastr::success('Employee successfully updated!','Success');
        return redirect()->route('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $user = User::find($id);
        $user -> delete();
        Toastr::error('Employee successfully deleted!','Deleted');
        return redirect()->route('user');
    }

    public function search(Request $request){
        $users = User::where('username', 'LIKE',"%{$request->search}%")->paginate();
        return view('admin.user.index',compact('users'));
    }
    public function importView(Request $request){
        return view('admin.employee.importFile');
    }

    public function import(Request $request){
        $request -> validate([
            'file' => 'required|mimes:xlx,xlsx',
        ]);
        Excel::import(new ImportUser,
            $request->file('file')->store('files'));
        Toastr::success('User data uploaded successfully.','Uploaded');
        return redirect()->back();
    }

    public function exportUsers(Request $request){
        return Excel::download(new ExportUser, 'users.xlsx');
    }

}

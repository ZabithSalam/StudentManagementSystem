<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AssignSubject;
use Illuminate\Support\Facades\Hash;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assignSubjects = AssignSubject::latest()->get();
        $students = User::latest()->get();
       
        return view('students',[
            'assignSubjects' => $assignSubjects,
            'students' => $students,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'role' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'dob' => ['required', 'string'],
            'nic' => ['required', 'string'],
            'city' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'batch' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


            $teacherID = IdGenerator::generate(['table' => 'users','field'=>'code', 'length' => 10, 'prefix' =>'STD-']);
                //output: SMS-000001
            
                 $user = new User();
                 $user->code = $teacherID;
                 $user->role =$request['role'];
                 $user->first_name =$request['first_name'];
                 $user->last_name =$request['last_name'];
                 $user->email =$request['email'];
                 $user->dob =$request['dob'];
                 $user->nic =$request['nic'];
                 $user->city= $request['city'];
                 $user->gender = $request['gender'];
                 $user->batch = $request['batch'];
                 $user->password = Hash::make($request['password']);
                 $user->save(); 
                 return back()->with('msg', 'Student enrolled successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $assignSubjects = AssignSubject::latest()->get();
       
        return view("view-profile",[
            'assignSubjects' => $assignSubjects,
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $assignSubjects = AssignSubject::latest()->get();
       
        return view("edit-user",[
            'assignSubjects' => $assignSubjects,
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'dob' => ['required', 'string'],
            'nic' => ['required', 'string'],
            'city' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'batch' => ['required', 'string'],
        ]);
       
        $updateUser = User::find($id);
        $updateUser->first_name =$request['first_name'];
        $updateUser->last_name =$request['last_name'];
        $updateUser->dob =$request['dob'];
        $updateUser->nic =$request['nic'];
        $updateUser->city= $request['city'];
        $updateUser->gender = $request['gender'];
        $updateUser->batch = $request['batch']; 
        $updateUser->update();

        return redirect()->back()->with('msg', ' Updated Successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subject = User::find($id);
        $subject->delete();
        return redirect()->back()->with('deleted', 'Student Deleted Successfully');
    }
}

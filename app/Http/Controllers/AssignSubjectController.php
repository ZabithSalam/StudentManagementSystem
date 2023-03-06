<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Models\User;
use App\Models\Marks;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\AssignSubject;

class AssignSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $subjects = Subject::latest()->get();
            $users = User::latest()->get();
            $assignSubjects = AssignSubject::latest()->get();
        
            return view('assign-subject',[
                'subjects' => $subjects,
                'users' => $users,
                'assignSubjects' => $assignSubjects,
            ]);
       
    }
    public function studentView()
    {
            $assignSubjects = AssignSubject::latest()->get();
        
            return view('enrolled-subjects',[
                'assignSubjects' => $assignSubjects,
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
      if(Auth::user()->role == 'Teacher'){

        $student_id = $request->input('student_id');
        $subject_id = $request->input('subject_id');
    
        $whereData = [
            ['user_id', $student_id],
            ['subject_id', $subject_id],
        ];
        $count = DB::table('assign_subjects')->where($whereData) ->count();

        if($count > 0){
            return back()->with('error', 'Already assigned this subject');
        }else{
           
            $assignedSubject = AssignSubject::create([
                'user_id' => $request['student_id'],
                'subject_id' => $request['subject_id'],
           ]);

            $assignedSubjectID = $assignedSubject->id;
            $DefaultsubjectForMarks = new Marks();
            $DefaultsubjectForMarks->user_id = request('student_id'); 
            $DefaultsubjectForMarks->assign_subjects_id = $assignedSubjectID; 
            $DefaultsubjectForMarks->marks = 0;
            $DefaultsubjectForMarks->save(); 

            return back()->with('subAssmessage', 'Subject Assigned successfully');
        }
    }
    else {
        $data['title'] = '404';
        $data['name'] = 'Page not found';
        return response()->view('errors.404',$data,404);
    }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      if(Auth::user()->role == 'Teacher'){
        $asssubject = AssignSubject::find($id);
        $asssubject->delete();

        return redirect()->back()->with('deleted', 'Subject Deleted Successfully');
    }
    else {
        $data['title'] = '404';
        $data['name'] = 'Page not found';
        return response()->view('errors.404',$data,404);
    }
    }
}

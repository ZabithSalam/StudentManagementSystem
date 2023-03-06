<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Contracts\Validation\Validator;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role == 'Teacher'){

        $subjects = Subject::latest()->get();
       
        return view('subjects',[
            'subjects' => $subjects
        ]);
    }
    else {
        $data['title'] = '404';
        $data['name'] = 'Page not found';
        return response()->view('errors.404',$data,404);
    }
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
        $request->validate([
            'subject' => ['required', 'string', 'max:255', 'unique:subjects'],
        ]);

        $subCode = IdGenerator::generate(['table' => 'subjects','field'=>'code', 'length' => 8, 'prefix' =>'SUB-']);
        //output: SUB-000001

        $subject = new Subject();
        $subject->code = $subCode;
        $subject->subject = request('subject'); 
        $subject->save(); 
        return back()->with('subAddmessage', 'Subject added successfully');
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
        $subject = Subject::find($id);
        $subject->delete();
        return redirect()->back()->with('deleted', 'Subject Deleted Successfully');
    }
    else {
        $data['title'] = '404';
        $data['name'] = 'Page not found';
        return response()->view('errors.404',$data,404);
    }
    }
}

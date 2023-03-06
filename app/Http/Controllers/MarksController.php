<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Marks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
       
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $marks = Marks::latest()->get();
    
        return view('marks',[
            'marks' => $marks,
            'user' => $user
        ]);
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
    public function update(Request $request, $id)
    {
        if(Auth::user()->role == 'Teacher'){

            $request->validate([
                'marks' => ['required', 'string'],
            ]);
           
            $updateUser = Marks::find($id);
            $updateUser->marks =$request['marks'];
            $updateUser->update();
    
            return redirect()->back()->with('msg', 'Updated Successfully');
        }
        else {
            $data['title'] = '404';
            $data['name'] = 'Page not found';
            return response()->view('errors.404',$data,404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

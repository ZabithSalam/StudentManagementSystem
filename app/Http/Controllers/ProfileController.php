<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('profile');
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
            'current_password' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
       
        $checkCurrentPswd = Hash::check($request->current_password, auth()->user()->password);

        if($checkCurrentPswd){
            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->back()->with('message', 'Password Updated Successfully');
        }
        else{
            return redirect()->back()->with('message2', 'Current password does not match with Old Password');
            
        }
        
    }
    public function uploadPhoto(Request $request, $id)
    {
          

        if($request->hasfile('photo')){

            $file= $request->file('photo');
            $filename= date('YmdHi').$file->getClientOriginalName();

            if(File::exists('storage/photos/'.$request->photo)){

                File::delete('storage/photos/'.$request->photo);
                
            }

            $file->move('storage/photos/', $filename);

            User::findOrFail(Auth::user()->id)->update([
                'photo' => $filename,
            ]);

        }
        return redirect()->back();
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
        //
    }
}

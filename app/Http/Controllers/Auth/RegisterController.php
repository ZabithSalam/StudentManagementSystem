<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::DASHBOARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
      

        return Validator::make($data, [
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
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if($data['role'] == 'Teacher'){
            $teacherID = IdGenerator::generate(['table' => 'users','field'=>'code', 'length' => 10, 'prefix' =>'TCR-']);
        //output: TCR-000001
            return User::create([
                'code' => $teacherID,
                'role' => $data['role'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'dob' => $data['dob'],
                'nic' => $data['nic'],
                'city' => $data['city'],
                'gender' => $data['gender'],
                'batch' => $data['batch'],
                'password' => Hash::make($data['password']),
            ]);
        }
        else if($data['role'] == 'Student'){
            $studentID = IdGenerator::generate(['table' => 'users','field'=>'code', 'length' => 10, 'prefix' =>'STD-']);
        //output: STD-000001
            return User::create([
                'code' => $studentID,
                'role' => $data['role'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'dob' => $data['dob'],
                'nic' => $data['nic'],
                'city' => $data['city'],
                'gender' => $data['gender'],
                'batch' => $data['batch'],
                'password' => Hash::make($data['password']),
            ]);
        }
        else{
            $adminID = IdGenerator::generate(['table' => 'users','field'=>'code', 'length' => 10, 'prefix' =>'ADN-']);
        //output: ADN-000001
            return User::create([
                'code' => $adminID,
                'role' => $data['role'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'dob' => $data['dob'],
                'nic' => $data['nic'],
                'city' => $data['city'],
                'gender' => $data['gender'],
                'batch' => $data['batch'],
                'password' => Hash::make($data['password']),
            ])->with('message', 'Student Enrolled Successfully');
        }
       
    }
}

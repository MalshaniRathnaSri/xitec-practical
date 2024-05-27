<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FormController extends Controller
{
    public function show(){
        return view('pages.forms');
    }

    public function customerProfile(){
        $user = Auth::user();
        
        return view('customPages.customer_profile',['user'=>$user]);
    }

    public function patientDataStore(Request $request){
        $patient = new PatientModel();
        $patient->firstName = $request->input('firstName');
        $patient->lastName = $request->input('lastName');
        $patient->email = $request->input('email');
        $patient->contact = $request->input('contact');
        $patient->dob = $request->input('dob');
        $patient->address = $request->input('address');
        $patient->password = bcrypt($request->input('password')); 
        $patient->confirmPassword = bcrypt($request->input('confirmPassword'));
        $patient->save();

        return redirect()->route('prescription.upload');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)){
            return redirect()->route('customPages.customer_profile');
        }
        
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
}

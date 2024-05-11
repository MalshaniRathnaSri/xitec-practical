<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientModel;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    public function show(){
        return view('pages.forms');
    }

    public function patientDataStore(Request $request){
        $patient = new PatientModel();
        $patient->firstName = $request->input('firstName');
        $patient->lastName = $request->input('lastName');
        $patient->email = $request->input('email');
        $patient->contact = $request->input('contact');
        $patient->dob = $request->input('dob');
        $patient->address = $request->input('address');
        $patient->password = $request->input('password');
        $patient->confirmPassword = $request->input('confirmPassword');
        $patient->save();

    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/');
        }

        // Authentication failed...
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrescriptionModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\AdminRegistrationModel;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PrescriptionController;


class AdminController extends Controller
{
    public function loginShow(){
        return view('_admin.admin_login');
    }

    public function registrationShow(){
        return view('_admin.admin_registration');
    }

    public function adminDashboard(){
        $prescriptions = PrescriptionModel::all(); 

        return view('_admin.admin_dashboard', compact('prescriptions'));
    }

    public function adminRegistration(Request $request){
        $admin = new AdminRegistrationModel();
        $admin->firstName = $request->input('firstName');
        $admin->lastName = $request->input('lastName');
        $admin->email = $request->input('email');
        $admin->contactNumber = $request->input('contactNumber');
        $admin->password = bcrypt($request->input('password')); 
        $admin->confirmPassword = bcrypt($request->input('confirmPassword'));
        $admin->save();

        return redirect()->route('admin.dashboard');
    }

    public function adminLogin(){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)){
            return redirect()->route('admin.dashboard');
        }
        
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function index(){
        $prescriptions = PrescriptionModel::all(); 
        return view('_admin.admin_dashboard', ['prescriptions' => $prescriptions]);
    }

    public function prescriptionQuotation($image)
    {
        $imagePath = public_path('upload/' . $image);

        if (File::exists($imagePath)) {
            $imageUrl = asset('upload/' . $image);
            return view('_admin.admin_prescription_preview')->with('imageUrl', $imageUrl);
        } else {
            return abort(404);
        }
    }

}

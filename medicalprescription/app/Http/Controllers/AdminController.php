<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrescriptionModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function index(){
        $prescriptions = PrescriptionModel::all(); 
        return view('_admin.admin_dashboard', ['prescriptions' => $prescriptions]);
    }

    public function prescriptionQuotation($image)
    {
        $imagePath = public_path('upload/' . $image);

        // Check if the image exists
        if (File::exists($imagePath)) {
            $imageUrl = asset('upload/' . $image);
            return view('_admin.admin_prescription_preview')->with('imageUrl', $imageUrl);
        } else {
            // Handle if the image doesn't exist
            return abort(404);
        }
    }

}

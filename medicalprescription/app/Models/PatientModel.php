<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientModel extends Model
{
    protected $table="patient";
    protected $fillable=['firstName','lastName','email','contact','dob','address','password','confirmPassword'];
    use HasFactory;
}

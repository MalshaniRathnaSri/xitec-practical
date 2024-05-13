<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminRegistrationModel extends Model
{
    protected $table="adminregistrations";
    protected $fillable=['firstName','lastName','email','contactNumber','password','confirmPassword'];
    use HasFactory;
}

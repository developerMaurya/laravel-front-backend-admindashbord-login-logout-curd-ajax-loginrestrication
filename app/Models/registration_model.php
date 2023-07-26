<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registration_model extends Model
{
    protected $table='registration_models';
    protected $fillable=['fname','lname','email','password','cpassword','utype'];
}

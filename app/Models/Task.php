<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [ 'description', 'status', 'owner', 'assigned_to'];

    function ownerTask(){
        return $this->belongsTo(User::class,'owner')
        ->selectRaw("concat(fname,' ',lname) as fullname, id");
    }
    function assignedTo(){
        return $this->belongsTo(user::class, 'assigned_to')
        ->selectRaw("concat(fname,' ',lname) as fullname, id");

    }
}

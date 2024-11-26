<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $fillable = ['name', 'email', 'role', 'password'];
    public function users()
{
    return $this->belongsToMany(User::class, 'course_user')->withPivot('role')->withTimestamps();
}


}

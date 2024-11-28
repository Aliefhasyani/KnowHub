<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $fillable = ['name', 'description', 'teacher_name', 'teacher_id','start_time','end_time'];

  
    public function users()
    {
        return $this->belongsToMany(User::class, 'course_user')
            ->withPivot('role')
            ->withTimestamps();
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}



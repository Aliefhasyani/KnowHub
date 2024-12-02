<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    /**
     * Mass assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'description', 
        'teacher_name', 
        'teacher_id',
        'start_time', 
        'end_time'
    ];

    /**
     * The users enrolled in this course.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'course_user')
            ->withPivot('role') // Includes the role in the pivot table
            ->withTimestamps(); // Automatically manages created_at and updated_at for the pivot table
    }

    /**
     * The teacher/creator of this course.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'teacher_id'); // Links the teacher ID to the User model
    }

    public function contents()
{
    return $this->hasMany(Content::class);
}

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'birth_date', 'gender', 'course_class_id'];

    public function courseClass(): BelongsTo
    {
        return $this->belongsTo(CourseClass::class);
    }
}

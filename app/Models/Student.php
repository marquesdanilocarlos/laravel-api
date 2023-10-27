<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'birth_date', 'gender', 'course_class_id'];
    protected $casts = [
        'birth_date' => 'date:d/m/Y'
    ];

    protected $visible = ['id', 'name', 'gender', 'course_class_id'];
    protected $hidden = ['created_at', 'updated_at'];

    public function courseClass(): BelongsTo
    {
        return $this->belongsTo(CourseClass::class);
    }
}

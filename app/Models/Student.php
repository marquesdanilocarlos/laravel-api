<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Date;

class Student extends Model
{
    use HasFactory;

    /**
     * Campos que podem ter seu valor definido em massa
     */
    protected $fillable = ['name', 'birth_date', 'gender', 'course_class_id'];

    /**
     * Conversões de campos no momento da serialização
     */
    protected $casts = [
        'birth_date' => 'date:d/m/Y'
    ];

    /**
     * Campos a serem exibidos na serialização
     */
    protected $visible = ['id', 'name', 'gender', 'course_class_id', 'age'];

    /**
     * Campos a serem removidos na serialização
     */
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * Campos/atributos virtuais a serem exibidos na serialização
     */
    protected $appends = ['age'];

    public function courseClass(): BelongsTo
    {
        return $this->belongsTo(CourseClass::class);
    }

    /**
     * Cria campo/atributo virtual
     */
    public function getAgeAttribute()
    {
        $currentDate = Date::now();
        $birthDate = DateTime::createFromFormat('Y-m-d', $this->attributes['birth_date']);
        return $currentDate->diff($birthDate)->y;
    }
}

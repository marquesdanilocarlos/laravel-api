<?php

namespace App\Http\Resources;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'birth_date' => $this->birth_date->format('d/m/Y'),
            'gender' => $this->gender,
            'class_id' => $this->course_class_id,
            'class' => new CourseClassResourse($this->courseClass),
            //'class' => new CourseClassResourse($this->whenLoaded('courseClass'));
            'links' => [
                ['type' => 'GET', 'url' => route('students.show', $this->id), 'rel' => 'student_details'],
                ['type' => 'PUT', 'url' => route('students.update', $this->id), 'rel' => 'student_update'],
                ['type' => 'DELETE', 'url' => route('students.destroy', $this->id), 'rel' => 'student_delete']
            ]
        ];
    }
}

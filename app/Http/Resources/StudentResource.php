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
            'class' => new CourseClassResourse($this->courseClass)
            //'class' => new CourseClassResourse($this->whenLoaded('courseClass'));
        ];
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Http\Resources\StudentCollection;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     * Accept: application/json
     */
    public function index(): StudentCollection
    {
        /*return $response->setContent('{"name": "Danilo"}')
            ->setStatusCode(201)
            ->header('Content-type', 'application/json');*/

        //return response('{"name": "Danilo"}', 201, ['Content-type' => 'application/json']);

        $students = Student::all();
        //$students = Student::paginate(2);
        //$students = Student::with('courseClass')->get();
        return new StudentCollection($students);
            //->makeHidden(['gender'])
            //->makeVisible(['created_at']);
        //abort(404, 'Recurso não encontrado');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request): Response
    {
        $data = $request->all();

        return response(Student::create($data), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student): StudentResource
    {
        return new StudentResource($student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, Student $student): Response
    {
        $data = $request->all();
        return response($student->update($data), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student): bool
    {
        return $student->deleteOrFail();
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Mail\GradeUpdateReport;
use App\Models\Grade;
use App\Models\GradeStudent;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('students.index', [
            'students' => Student::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        //Visualizar todos los parámetros que llegan a través de la petición
        //dd($request->all());

        //Crear un nuevo objeto de tipo estudiante
        $student = new Student();

        //Asignar valores a los atributos del objeto
        $student->code = $request->get('code');
        $student->document = $request->get('document');
        $student->name = $request->get('name');
        $student->lastname = $request->get('lastname');
        $student->average = $request->get('average');
        $student->birth_date = $request->get('birth_date');
        $student->email = $request->get('email');

        //Almacenar el registro en la BD
        $student->save();

        //Redireccionar
        return redirect('/students');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //Bucar el estudiante en la BD
        //$student = Student::findOrFail($id);

        $grades = Grade::all()->merge( $student->grades );

        return view('students.show', [
            'student' => $student,
            'grades' => $grades
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //$student = Student::findOrFail($id);
        //dd($student);

        return view('students.edit', [
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, Student $student)
    {
        //Visualizar todos los parámetros que llegan a través de la petición
        //dd($request->all());

        //Crear un nuevo objeto de tipo estudiante
        //$student = Student::findOrFail($id);

        //Asignar valores a los atributos del objeto
        $student->code = $request->get('code');
        $student->document = $request->get('document');
        $student->name = $request->get('name');
        $student->lastname = $request->get('lastname');
        $student->average = $request->get('average');
        $student->birth_date = $request->get('birth_date');
        $student->email = $request->get('email');

        //Almacenar el registro en la BD
        $student->save();

        //Redireccionar
        return redirect('/students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //$student = Student::findOrFail($id);

        $student->delete();

        return back();
    }

    public function associateGradeStudent(Request $request, Student $student)
    {
        //Hacer uso del log de laravel que se puede encontrar en storage/logs/log_laravel.log
        //Log::debug('Quiere asociar un nuevo registro');
        $student->grades()->attach($request->input('grade_id'), [
            'grade_student' => $request->input('grade_student')
        ]);

        return back();
    }

    public function updateGradeStudent(Request $request, Student $student, GradeStudent $gradeStudent)
    {
        //No hacer nada
        //Log::debug('Quiere actualizar un registro existente!');

        $gradeStudent->update([
           'grade_student' => $request->input('grade_student')
        ]);

        Mail::to($student->email)
            ->send(new GradeUpdateReport($student));

        return back();
    }
}

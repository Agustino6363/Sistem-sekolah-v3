<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;

class StudentController extends Controller
{
    public function index()
    {
        $title = 'Sistem Sekolah-Daftar Siswa';

        $students = Student::select(['id', 'nis', 'name', 'gender', 'major', 'class'])
        ->get();
        

        return view('students.index', [
            'title' => $title,
            'students' => $students
        ]);
    }

    public function show(Student $student)
    {
        $title = 'Sistem Sekolah-Detail Siswa';
        

        return view('students.show', [
            'title' => $title,
            'student' => $student
        ]);
    }

    public function create()
    {
        return view('students.create', [
            'title' => 'Sistem Sekolah-Catat Siswa Baru'
        ]);
    }

    public function edit(Student $student)
    {
        $title = 'Sistem Sekolah- Edit Siswa';
        return view('students.edit', [
            'title' => $title,
            'student' => $student
        ]);
    }

    public function store(StoreRequest $request)
    {
        //Validadsi
        $validatedRequest = $request->validated();

        //Tambahkan data ke database
       Student::create($validatedRequest);

        //Handle If success
        return redirect()->route('students.index');
    }

    public function update(Student $student, UpdateRequest $request)
    {
        //Validasi
        $validatedRequest = $request->validated();

        //Update data di database
        $student->update($validatedRequest);

        //Handle If success
        return redirect()->route('students.index');
    }
    

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index');
    }
     
}

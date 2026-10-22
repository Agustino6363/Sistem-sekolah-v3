<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use function Laravel\Prompts\search;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Sistem Sekolah-Daftar Siswa';
        $search = $request->query('search');
        $class = $request->query('class');
        $major = $request->query('major');

        $students = Student::select(['id', 'nis', 'name', 'gender', 'major', 'class'])
        ->when($search, function ($query, $search) {
            $query->where(function($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('nis', 'like', "%{$search}%");
            });
        })
        ->when($class,fn($query, $class) => $query->where('class', '=', $class))
        ->when($major,fn($query, $major) => $query->where('major', '=', $major))
        ->Paginate(10)
        ->withQueryString();

        $schoolClasses = ['10 AKL', '11 AKL','11 TKJ 1', '11 TKJ 2','10 BiD', '12 TKJ 1', '12 TKJ 2', '12 TKJ 3'];
        $majors = ['AKL', 'TKJ', 'BiD'];
        

        return view('students.index', [
            'title' => $title,
            'students' => $students,
            'schoolClasses' => $schoolClasses,
            'majors' => $majors
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

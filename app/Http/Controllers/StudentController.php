<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $title = 'Sistem Sekolah-Daftar Siswa';
        $students =[
            [
                'id' => 1,
                'nis' => '1001',
                'name' => 'Andi',
                'class' => 'XII TKJ 2',
                'major' => 'TKJ'
            ],

              [
                'id' => 2,
                'nis' => '1002',
                'name' => 'Budi',
                'class' => 'XII AKL 1',
                'major' => 'AKL'
            ]
        ];
        return view('students.index', [
            'title' => $title,
            'students' => $students
        ]);
    }

    public function show(string $id)
    {
        return view('students.show', [
            'title' => 'Sistem Sekolah-Lembar Siswa'
        ]);
    }

    public function create()
    {
        return view('students.create', [
            'title' => 'Sistem Sekolah-Catat Siswa Baru'
        ]);
    }

    public function edit(string $id)
    {
        return view('students.edit', [
            'title' => 'Sistem Sekolah-Ubah Data Siswa'
        ]);
    }

    public function store(Request $request)
    {
        return "Melakukan penambahan data siswa baru";
    }

    public function update(string $id)
    {
        return "Mengubah data siswa dengan ID: {$id}";
    }

    public function destroy(string $id)
    {
        return "Menghapus data siswa dengan ID: {$id}";
    }
}

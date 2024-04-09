<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    private $student;
    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    public function index()
    {
        $allStudents = $this->student->getAllStudents();
        return view('student', compact('allStudents'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'phone' => $request->input('phone')
        ];
        $this->student->createStudent($data);
        return redirect()->route('index')->with('msg', "Data created successfully");
    }

    public function show($id)
    {
        $student = $this->student->getStudentById($id);
        return view('students.show', compact('student'));
    }

    public function edit($id)
    {
        $student = $this->student->getStudentById($id);
        return view('students.update', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->input('name'),
            'phone' => $request->input('phone')
        ];
        $this->student->updateStudent($data, $id);
        return redirect()->route('index')->with('msg', "Data updated successfully");
    }


    public function destroy($id)
    {
        $success = $this->student->deleteStudent($id);

        if ($success) {
            return redirect()->route('index')->with('msg', "Student has been deleted successfully");
        } else {
            return redirect()->route('index')->with('error', "Failed to delete the student");
        }
    }
}

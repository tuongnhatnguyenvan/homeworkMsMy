<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'phone'];
    protected $table ='students';

    public function getAllStudents(){
        $students = DB::table($this->table)->get();
        return $students;
    }

    public function getStudentById($id){
        $student = DB::table($this->table)->where('id', $id)->first();
        return $student;
    }

    public function createStudent($data){
        DB::table($this->table)->insert($data);
    }

    public function updateStudent($data, $id){
        DB::table($this->table)->where('id', $id)->update($data);
    }

    public function deleteStudent($id){
        DB::table($this->table)->where('id', $id)->delete();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $table = 'users';

    public function getAllUsers(){
        $users = DB::table($this->table)->get();
        return $users;
    }

    public function getUserById($id){
        $user = DB::table($this->table)->where('id',$id)->first();
        return $user;
    }

    public function deleteUserById($id){
        $user = DB::table($this->table)->where('id',$id)->delete();
    }

    public function updateUserById($id,$data){
        $user = DB::table($this->table)->where('id',$id)->update($data);
    }
    
    public function createUser($data){
        $user = DB::table($this->table)->insert($data);
    }
}

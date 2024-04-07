<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    protected $fillable = [
        'title',
        'description',
    ];

    public function getAllPosts(){
        $posts = DB::table($this->table)->get();
        return $posts;
    }

    public function getPostById($id){
        $post = DB::table($this->table)->find($id);
        return $post;
    }

    public function createPost($input){
        $data = [
            'title' => $input['title'],
            'description' => $input['description'],
        ];
        DB::table($this->table)->insert($data);
    }

    public function updatePost($id, $input){
        $data = [
            'title' => $input['title'],
            'description' => $input['description'],
        ];
        DB::table($this->table)->where('id',$id)->update($data);
    }

    public function deletePost($id){
        DB::table($this->table)->where('id', $id)->delete();
    }
}

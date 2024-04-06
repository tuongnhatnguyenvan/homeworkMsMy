<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    public function getAllPosts()
    {
        $posts = DB::table($this->table)->get();
        return $posts;
    }

    public function getOnePost($id)
    {
        $post = DB::table($this->table)->where('id', $id)->first();
        return $post;
    }

    public function addPost($data)
    {
        // DB::enableQueryLog();
        DB::insert('INSERT INTO ' . $this->table . ' (title, description) VALUES (?, ?)', [$data['title'], $data['description']]);
        // $sql = DB::getQueryLog();
        // dd($sql);/
    }

    public function deletePost($id)
    {
        DB::delete('DELETE FROM '. $this->table.' WHERE id =?', [$id]);
    }


    public function updatePost($id, $data)
    {
        DB::update('UPDATE ' . $this->table . ' SET title = ?, description = ? WHERE id = ?', [$data['title'], $data['description'], $id]);
    }    
}

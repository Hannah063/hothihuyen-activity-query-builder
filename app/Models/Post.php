<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;

    public function getAllPosts(){
        return DB::table('posts')->get();
    }
    public function getOnePost(){
        return
        DB::table('posts')
        ->where('id', 10)
        ->get();
    }
}

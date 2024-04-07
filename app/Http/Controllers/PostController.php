<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //
    private $post;
    public function __construct()
    {
        $this->post = new Post();
    }

    public function getAllPosts(){
        return $this->post->getAllPosts();
    }

    public function getOnePost(){
        return $this->post->getOnePost();
    }
}

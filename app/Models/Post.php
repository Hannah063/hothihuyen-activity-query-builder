<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PDO;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description'];

    public function getAllPosts(){
        return DB::table('posts')->get();
    }
    public function getOnePost(){
        return
        DB::table('posts')
        ->where('id', 10)
        ->get();
    }

    public function createPDO(){
        $pdo = new PDO('mysql:host=localhost;dbname=hoclaravel', 'root', '');
        $stmt = $pdo->prepare("INSERT INTO posts (title, description) VALUES (?, ?)");
        $title = "New Post Title";
        $description = "New post description.";
        $stmt->bindParam(1, $title, PDO::PARAM_STR);
        $stmt->bindParam(2, $description, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function showPDO(){
        $pdo = new PDO('mysql:host=localhost;dbname=hoclaravel', 'root', '');
        $stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
        $id = 51;
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $post = $stmt->fetch(PDO::FETCH_ASSOC);
        return $post;
    }

    public function updatePDO(){
        $pdo = new PDO('mysql:host=localhost;dbname=hoclaravel', 'root', '');
        $stmt = $pdo->prepare("UPDATE posts SET title = ?, description = ? WHERE id = ?");
        $title = "Updated Post Title";
        $description = "Updated post description.";
        $id = 51;
        $stmt->bindParam(1, $title, PDO::PARAM_STR);
        $stmt->bindParam(2, $description, PDO::PARAM_STR);
        $stmt->bindParam(3, $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function deletePDO(){
        $pdo = new PDO('mysql:host=localhost;dbname=hoclaravel', 'root', '');
        $stmt = $pdo->prepare("DELETE FROM posts WHERE id = ?");
        $id = 51;
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function createMySQL(){
        DB::insert('INSERT INTO posts (title, description, id) VALUE title = ?, description = ?, id = ?', ['New 51', 'New description', 51]);
    }

    public function showMySQL(){
        DB::select('SELECT * FROM posts WHERE id = ?', [51]);
    }

    public function updateMySQL(){
        DB::update('UPDATE posts SET title = ?, description = ? WHERE id = ?', ['New 51', 'New description', 51]);
    }

    public function deleteMySQL(){
        DB::delete('DELETE posts WHERE id = ?', [51]);
    }
}

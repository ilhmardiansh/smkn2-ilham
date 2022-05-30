<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post
{

private static $blog_posts =  [
    [
        "title" => "Judul Post Pertama",
        "slug" => "judul-post-pertama",
        "author" => "Satoshi Odegawa",
        "body" => " Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus quis reiciendis minus numquam, beatae debitis nihil quidem voluptates inventore fugiat laboriosam
        enim placeat pariatur rem assumenda sequi odio eaque sint iste? Recusandae
        asperiores assumenda nostrum velit! Neque deserunt doloremque iure excepturi consectetur veritatis rerum natus dolore voluptas vero id omnis placeat tempora quia, amet ullam? A odio ullam, officia commodi
         provident unde labore quae ea facere nostrum asperiores alias suscipit culpa reiciendis delectus, vitae doloribus maxime aut? Provident, in quis?"
    ],
    [
        "title" => "Judul Post Kedua",
        "slug" => "judul-post-kedua",
        "author" => "Komi Odegawa",
        "body" => " Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus quis reiciendis minus numquam, beatae debitis nihil quidem voluptates inventore fugiat laboriosam
        enim placeat pariatur rem assumenda sequi odio eaque sint iste? Recusandae
        asperiores assumenda nostrum velit! Neque deserunt doloremque iure excepturi consectetur veritatis rerum natus dolore voluptas vero id omnis placeat tempora quia, amet ullam? A odio ullam, officia commodi
         provident unde labore quae ea facere nostrum asperiores alias suscipit culpa reiciendis delectus, vitae doloribus maxime aut? Provident, in quis?"
    ]
    ];

     public static function all()
     {
         return collect(self::$blog_posts);
     }

      public static function find($slug)
      {
          $posts = static::all();

    return $posts->firstWhere('slug',$slug);
      }


}

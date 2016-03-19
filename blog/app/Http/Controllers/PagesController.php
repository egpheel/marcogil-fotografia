<?php

namespace App\Http\Controllers;
use App\Post;

class PagesController extends Controller {

  public function getIndex() {
    $posts = Post::orderBy('created_at', 'desc')->paginate(5);

    return view('pages.home2')->with('posts', $posts);
  }

}

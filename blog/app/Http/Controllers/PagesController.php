<?php

namespace App\Http\Controllers;
use App\Post;

class PagesController extends Controller {

  public function getIndex() {
    $posts = Post::orderBy('created_at', 'desc')->paginate(5);
    $recent_posts = Post::orderBy('created_at', 'desc')->take(10)->get();

    $archives = Post::latest()->get()->groupBy(function($date) {
      switch ($date->created_at->format('n')) {
        case 1:
          $month = 'Janeiro';
          break;
        case 2:
          $month = 'Fevereiro';
          break;
        case 3:
          $month = 'Março';
          break;
        case 4:
          $month = 'Abril';
          break;
        case 5:
          $month = 'Maio';
          break;
        case 6:
          $month = 'Junho';
          break;
        case 7:
          $month = 'Julho';
          break;
        case 8:
          $month = 'Agosto';
          break;
        case 9:
          $month = 'Setembro';
          break;
        case 10:
          $month = 'Outubro';
          break;
        case 11:
          $month = 'Novembro';
          break;
        case 12:
          $month = 'Dezembro';
          break;

        default:
          break;
      }

      return $month . ' ' . $date->created_at->format('Y');
    });

    foreach ($posts as $post) {
      switch ($post->created_at->month) {
        case 1:
          $month = 'Janeiro';
          break;
        case 2:
          $month = 'Fevereiro';
          break;
        case 3:
          $month = 'Março';
          break;
        case 4:
          $month = 'Abril';
          break;
        case 5:
          $month = 'Maio';
          break;
        case 6:
          $month = 'Junho';
          break;
        case 7:
          $month = 'Julho';
          break;
        case 8:
          $month = 'Agosto';
          break;
        case 9:
          $month = 'Setembro';
          break;
        case 10:
          $month = 'Outubro';
          break;
        case 11:
          $month = 'Novembro';
          break;
        case 12:
          $month = 'Dezembro';
          break;

        default:
          break;
      }

      $date = $post->created_at->day . ' ' . $month . ' ' . $post->created_at->year;

      $post->date = $date;
    }

    return view('pages.home')->with('posts', $posts)->with(compact('recent_posts'))->with(compact('archives'));
  }

}

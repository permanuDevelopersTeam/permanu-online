<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\News;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\AllFiles;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->limit(3)->get();
        $events = Event::orderBy('created_at', 'desc')->limit(4)->get();
        $announcement = Announcement::orderBy('created_at', 'desc')->limit(3)->get();
        $gallery = Gallery::orderBy('created_at', 'desc')->limit(3)->get();
        $allFile = AllFiles::orderBy('created_at', 'desc')->limit(6)->get();
        return view('index', compact('news', 'events', 'announcement', 'gallery', 'allFile'));
    }

}

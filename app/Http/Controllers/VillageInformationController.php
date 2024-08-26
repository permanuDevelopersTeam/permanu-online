<?php

namespace App\Http\Controllers;

use App\Models\AllFiles;
use App\Models\Announcement;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Services;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class VillageInformationController extends Controller
{
    public function news()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(25);
        return view('informasi.news', compact('news'));
    }

    public function detailNews(News $news)
    {
        return view('informasi.detail-news', compact('news'));
    }

    public function events()
    {
        $events = Event::orderBy('created_at', 'desc')->paginate(25);
        return view('informasi.events', compact('events'));
    }
    public function detailEvent(Event $event)
    {
        return view('informasi.detail-event', compact('event'));
    }
    public function announcements()
    {
        $announcement = Announcement::orderBy('created_at', 'desc')->paginate(15);
        return view('informasi.announcement', compact('announcement'));
    }
    public function announcementShow(Announcement $announcement)
    {
        return view('informasi.announcement-show', compact('announcement'));
    }

    public function gallery()
    {
        $gallery = Gallery::orderBy('created_at', 'desc')->paginate(15);
        return view('informasi.gallery', compact('gallery'));
    }
    public function galleryShow(Gallery $gallery)
    {
        return view('informasi.gallery-show', compact('gallery'));
    }

    public function downloads()
    {
        $allFiles = AllFiles::orderBy('created_at', 'desc')->paginate(15);
        return view('informasi.download', compact('allFiles'));
    }

    public function downloadFile(AllFiles $allFile)
    {
        $filePath = $allFile->file;

        if (Storage::exists($filePath)) {
            return Storage::download($filePath, $allFile->name . '.pdf');
        } else {
            abort(404, 'File not found');
        }
    }
    public function detailFile(AllFiles $allFile)
    {
        return view('informasi.document-show', compact('allFile'));
    }

    public function services()
    {
        $services = Services::first();
        return view('informasi.services', compact('services'));
    }
}

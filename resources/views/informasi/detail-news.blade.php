@extends('partials.main')

@section('container')

<div class="h-[500px] mb-8 px-5">
  <img src="{{ asset('storage/' . $news->images) }}" alt="images.jpg" class="w-full h-full object-cover">
</div>
<div class="px-5">
  <p class="text-gray-400 mb-3">{{ \Carbon\Carbon::parse($news->date)->translatedFormat('l, j F Y') }}</p>
  <p class="mb-3">{!! $news->body !!}</p>
  <a href="{{ route('information.news') }}" class="text-sky-600 underline">Kembali ke halaman berita</a>
</div>


@endsection
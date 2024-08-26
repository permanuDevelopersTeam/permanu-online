@extends('partials.main')

@section('container')
<div class="h-[500px] mb-8 px-5">
  <img src="{{ asset('storage/' . $event->image1) }}" alt="images.jpg" class="w-full h-full object-cover">
</div>
<div class="px-5">
  <p class="text-gray-400 mb-3"><span class="text-black">Waktu Kegiatan</span> {{ \Carbon\Carbon::parse($event->start_event)->translatedFormat('l, j F Y') }} - {{ \Carbon\Carbon::parse($event->end_event)->translatedFormat('l, j F Y') }}</p>
  <p class="mb-3">{!! $event->body !!}</p>
  <a href="{{ route('information.events') }}" class="text-sky-600 underline">Kembali ke halaman events</a>
</div>


@endsection
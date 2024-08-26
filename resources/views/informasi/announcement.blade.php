@extends('partials.main')

@section('container')
<div class="flex justify-center items-center p-5 bg-gray-100 mb-5">
  <h1 class="text-[60px] text-gray-400 monserrat font-bold">PENGUMUMAN</h1>
</div>
<div class="flex justify-center">
  <div class="w-[80%]">
    @if ($announcement->count())
    @foreach ($announcement as $item)
    <div class="flex gap-5 px-2 border-b">
      <div class="w-[75px]">
        <img src="{{ asset('images/permanu-icon.png') }}" alt="logo-permanu.jpg" class="w-full h-full object-cover">
      </div>
      <div class="flex-1 py-4">
        <a href="{{ route('information.announcements.show', $item->uuid) }}" class="text-lg text-sky-600 mb-3 hover:text-sky-800 hover:underline">{{ $item->title }}</a>
        <p class="text-[14px]">{{ \Carbon\Carbon::parse($item->date)->translatedFormat('l, j F Y') }}</p>
      </div>
    </div>
    @endforeach
    <div class="text-end">
      <div class="mt-4">
        {{ $announcement->links() }}
      </div>
    </div>
    @else
    <div class="text-center">Data Belum Tersedia</div>
    @endif
  </div>
</div>
@endsection
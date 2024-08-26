@extends('partials.main')

@section('container')
<div class="flex justify-center items-center p-5 bg-gray-100 mb-5">
  <h1 class="text-[60px] text-gray-400 monserrat font-bold">GALLERY</h1>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2 px-10">
  @if ($gallery->count())
  @foreach ($gallery as $item)
  <a href="{{ route('information.gallery.show', $item->uuid) }}" class="h-full w-full border rounded overflow-hidden">
    <div class="w-full h-[300px]">
      <img src="{{ asset('storage/' . $item->image1) }}" alt="gallery.jpg" class="w-full h-full object-cover">
    </div>
    <div class="p-3 text-[14px]">
      <p class="my-2">{{ \Carbon\Carbon::parse($item->date)->translatedFormat('l, j F Y') }}</p>
      <h3 class="font-bold uppercase">{{ $item->title }}</h3>
    </div>
  </a>
  @endforeach
  @else
  <p class="text-center">
    Belum Ada Data
  </p>
  @endif
</div>
@endsection
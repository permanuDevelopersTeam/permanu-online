@extends('partials.main')

@section('container')

<div class="flex flex-col justify-center items-center p-5 mb-5">
  <h1 class="text-[40px] text-gray-400 monserrat font-bold">DETAIL GALLERY</h1>
</div>

<div class="p-16 flex my-10 justify-center">
  <div class="w-[80%]">
    <div class="mb-10">
      <h2 class="text-xl font-semibold mb-4">Gambar Utama</h2>
      <img src="{{ asset('storage/' . $gallery->image1) }}" alt="{{ $gallery->title }}" class="w-full h-[400px] border rounded-lg object-cover">
    </div>

    <div class="mb-10">
      <div class="grid grid-cols-2 gap-4">
        @foreach(range(2, 9) as $i)
        @if($gallery->{'image' . $i})
        <div class="{{ $loop->odd ? 'col-span-1' : 'col-span-1' }}">
          <img src="{{ asset('storage/' . $gallery->{'image' . $i}) }}" alt="Gambar {{ $i }}" class="w-full h-[200px] border rounded-lg object-cover">
        </div>
        @endif
        @endforeach
      </div>
      <p class="text-[14px] text-gray-600 my-3">{{ \Carbon\Carbon::parse($gallery->date)->translatedFormat('l, j F Y') }}</p>
    </div>
    <div class="mb-10">
      <p class="text-lg capitalize">{{ $gallery->title }}</p>
    </div>

    <div class="text-end">
      <a href="{{ route('information.gallery') }}" class="py-2 px-4 text-sky-600 underline">Back to Gallery</a>
    </div>
  </div>
</div>

@endsection
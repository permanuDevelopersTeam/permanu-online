@extends('partials.main')

@section('container')
<div class="flex justify-center items-center p-5 bg-gray-100">
  <h1 class="text-[55px] text-gray-400 monserrat font-bold">SEJARAH DESA</h1>
</div>

<div class="px-16">
  <div class="w-full h-[450px]">
    <img src="{{ asset('storage/' . $villageHistory->image) }}" alt="image.jpg" class="w-full h-full object-cover">
  </div>
  <div class="my-10 text-[14px]">
    <p>
      {!! $villageHistory->body !!}
    </p>
  </div>
</div>
@endsection
@extends('partials.main')

@section('container')

<div class="px-16">
  <div class="w-full h-[500px] mb-3">
    <img src="{{ asset('storage/' . $potential->image) }}" alt="" class="object-cover w-full h-full">
  </div>
  <div class="text-[14px]">
    <h3 class="mb-3 text-lg font-bold capitalize">{{ $potential->title }}</h3>
    <p>{!! $potential->body !!}</p>
  </div>
</div>

@endsection
@extends('partials.main')

@section('container')
<div class="flex justify-center items-center p-5 bg-gray-100 mb-5">
  <h1 class="text-[55px] text-gray-400 monserrat font-bold">POTENSI DESA</h1>
</div>
<div class="px-16 py-10 border-b">
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
    @foreach ($typePotentialAll as $item)
    <a href="{{ route('potential.detail', $item->type) }}">
      <div class="min-w-[250px] py-6 capitalize text-center rounded-full bg-sky-600 text-white duration-200 hover:bg-sky-700">{{ $item->type }}</div>
    </a>
    @endforeach
  </div>
</div>
@endsection
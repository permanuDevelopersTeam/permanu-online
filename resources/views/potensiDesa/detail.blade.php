@extends('partials.main')

@section('container')
<div class="flex justify-center items-center p-5 bg-gray-100 mb-5">
  <h1 class="text-[55px] text-gray-400 monserrat font-bold">POTENSI DESA</h1>
</div>
<div class="px-16">
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 py-10 border-b mb-10">
    @foreach ($typePotentialAll as $item)
    <a href="{{ route('potential.detail', $item->type) }}">
      <div class="min-w-[250px] py-6 capitalize text-center rounded-full bg-sky-600 text-white duration-200 hover:bg-sky-700">{{ $item->type }}</div>
    </a>
    @endforeach
  </div>
  <div class="my-10 font-bold uppercase text-lg">
    <p>{{ $typePotential->type }}</p>
  </div>
  @if ($potential->count())
  @foreach ($potential as $item)
  <a href="{{ route('potential.show', $item->uuid) }}" class="duration-100 text-[14px] mb-2">
    <div class="flex gap-5 p-2 border-b hover:bg-gray-100">
      <div class="w-[220px] h-[120px] bg-black">
        <img src="{{ asset('storage/' . $item->image) }}" alt="images-potentials.jpg" class="w-full h-full object-cover">
      </div>
      <div class="flex-1">
        <h3 class="font-bold capitalize text-sky-600 mb-2">{{ $item->title }}</h3>
        <p class="mb-2"> {!! $item->excerpt !!} Lorem ipsum dolor sit amet consectetur, adipisicing elit. Animi, alias.</p>
        <p class="text-xs"> {{ $item->created_at->diffForHumans() }} </p>
      </div>
    </div>
  </a>
  @endforeach
  @else
  <div class="text-center">
    <p class="text-gray-600 text-lg">Data Belum Tersedia</p>
  </div>
  @endif
</div>
@endsection
@extends('partials.main')

@section('container')

<div class="flex justify-center items-center p-5 bg-gray-100 mb-5">
  <h1 class="text-[55px] text-gray-400 monserrat font-bold text-center">SOTK</h1>
</div>

<div class="px-16 py-10">
  @if ($sotk)
  <div class="w-full h-[400px] overflow-hidden">
    @if ($sotk->image)
    <img src="{{ asset('storage/' . $sotk->image) }}" class="w-full h-full object-cover">
    @else
    <img src="https://emgotas.com/wp-content/uploads/2016/11/what-is-a-team.jpg?w=840" alt="team-images.jpg" class="w-full h-full object-cover">
    @endif
  </div>
  <h3 class="py-5 font-semibold text-lg uppercase">Struktur Organisasi Dan Tata Kerja</h3>
  <div class="w-full h-auto">
    @if ($sotk->image2)
    <img src="{{ asset('storage/' . $sotk->image2) }}" alt="village-teamwork.jpg" class="w-full h-full object-cover">
    @else
    <img src="https://koinworks.com/wp-content/uploads/2021/02/struktur-organisasi-tipe-hirarki.png" alt="village-teamwork.jpg" class="w-full h-full object-cover">
    @endif
  </div>
  <div>
    <p>{!! $sotk->body !!}</p>
  </div>
  @else
  <div class="text-center">Belum ada data yang tersedia</div>
  @endif
</div>

@endsection
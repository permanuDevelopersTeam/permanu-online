@extends('partials.main')

@section('container')

<div class="container mx-auto p-16">
  <h1 class="text-2xl font-bold mb-4 text-center capitalize">{{ $allFile->name }}</h1>
  <p class="mb-4 pb-4 border-b font-semibold text-center">Tanggal Pembuatan: {{ \Carbon\Carbon::parse($allFile->date)->translatedFormat('l, j F Y') }}</p>
  <a href="{{ route('information.downloads') }}" class="text-sky-600 mb-4 hover:underline">Kembali</a>
  <embed src="{{ asset('storage/' . $allFile->file) }}" type="application/pdf" width="100%" height="600px">
</div>

@endsection
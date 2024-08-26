@extends('partials.main')

@section('container')
<div class="flex justify-center items-center p-5 bg-gray-100 mb-5">
  <h1 class="text-[60px] text-gray-400 monserrat font-bold">DOWNLOAD</h1>
</div>
<div class="flex justify-center">
  <div class="w-[80%] min-w-[500px]">
    <table class="w-full">
      <thead>
        <th class="text-start p-2">NO</th>
        <th class="text-start p-2">JUDUL DOKUMEN</th>
        <th class="text-start p-2">UKURAN</th>
        <th class="text-start p-2">AKSI</th>
      </thead>
      <tbody class=" text-[14px]">
        @if ($allFiles->count())
        @foreach ($allFiles as $item)
        <tr>
          <td class="p-2">{{ $loop->iteration }}</td>
          <td class="p-2">{{ $item->name }}</td>
          <td class="p-2">{{ number_format($item->size / 1024) }} KB</td>
          <td class="p-2 text-xs"><a href="{{ route('information.download.file', $item->uuid) }}" class="px-3 py-2 rounded border border-sky-600 duration-200 hover:bg-sky-600 hover:text-white">Download <i class="bi bi-arrow-down"></i></a></td>
        </tr>
        @endforeach
        @else
        <p class="text-center text-lg">Belum Ada Data</p>
        @endif
      </tbody>
    </table>
  </div>
</div>
@endsection
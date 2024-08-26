@extends('admin.partials.main')

@section('container')

@if (session('success'))
<div class="alert bg-green-200 m-3 p-3 text-center text-green-600 capitalize">
  {{ session('success') }}
</div>
@endif

<div class="flex flex-col justify-center items-center p-5 mb-5">
  <h1 class="text-[40px] text-gray-400 monserrat font-bold">EVENTS</h1>
</div>
<div class="fixed bottom-0 end-0 m-10 w-[50px] h-[50px] rounded-lg bg-sky-600">
  <a href="{{ route('admin.event.create') }}" class="font-bold text-white text-3xl w-full h-full flex justify-center items-center ">
    +
  </a>
</div>
<div class="px-16">
  <div class="flex gap-3 items-center justify-end mb-5">
    <a href="{{ route('admin.event.create') }}" class="px-3 py-2 rounded-lg bg-sky-600 text-white">Buat Data</a>
  </div>
  @if ($events->count())
  <table class="w-full">
    <thead>
      <tr class="bg-gray-200 border">
        <th class="text-center p-3 border">No</th>
        <th class="text-center p-3 border">Judul Event</th>
        <th class="text-center p-3 border">Tanggal Mulai</th>
        <th class="text-center p-3 border">Tanggal Selesai</th>
        <th class="text-center p-3 border">Status</th>
        <th class="text-center p-3 border">Akses</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($events as $item)
      <tr class="border text-[14px] odd:bg-white even:bg-gray-100">
        <th class="text-start p-3 border">{{ $loop->iteration }} </th>
        <td class="text-start p-3 border">{{ $item->title }} </td>
        <td class="text-start p-3 border">{{ \Carbon\Carbon::parse($item->start_event)->translatedFormat('l, j F Y') }}</td>
        <td class="text-start p-3 border">{{ \Carbon\Carbon::parse($item->end_event)->translatedFormat('l, j F Y') }}</td>
        <td class="text-start p-3 border">{{ $item->status }}</td>
        <td class="text-start p-3 flex items-center justify-center gap-2">
          <a href="{{ route('admin.event.edit', $item->uuid) }}" class="px-3 py-2 rounded-lg bg-orange-400 text-white"><i class="bi bi-pencil-square"></i></a>
          <form action="{{ route('admin.event.delete', $item->uuid) }}" method="post">
            @method('delete')
            @csrf
            <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')" class="px-3 py-2 rounded-lg bg-red-500 text-white"><i class="bi bi-trash"></i></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="text-end">
    <div class="mt-4">
      {{ $events->links() }}
    </div>
  </div>
  @else
  <div class="text-center">Data Belum Tersedia!</div>
  @endif


</div>

<script>
  $(document).ready(function() {
    setTimeout(() => {
      $('.alert').fadeOut('slow');
    }, 5000);
  });
</script>
@endsection
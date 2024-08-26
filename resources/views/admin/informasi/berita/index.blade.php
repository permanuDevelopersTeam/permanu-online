@extends('admin.partials.main')

@section('container')

@if (session('success'))
<div class="alert bg-green-200 m-3 p-3 text-center text-green-600 capitalize">
  {{ session('success') }}
</div>
@endif


<div class="flex flex-col justify-center items-center p-5 mb-5">
  <h1 class="text-[40px] text-gray-400 monserrat font-bold">BERITA</h1>
</div>
<div class="fixed bottom-0 end-0 m-10 w-[50px] h-[50px] rounded-lg bg-sky-600">
  <a href="{{ route('admin.news.create') }}" class="font-bold text-white text-3xl w-full h-full flex justify-center items-center ">
    +
  </a>
</div>
<div class="px-16">
  <div class="flex gap-3 items-center justify-end mb-5">
    <a href="{{ route('admin.news.create') }}" class="px-3 py-2 rounded-lg bg-sky-600 text-white">Buat Data</a>
  </div>
  @if ($news->count())
  <table class="w-full">
    <thead>
      <tr class="bg-gray-100 border">
        <th class="text-center p-3 border">No</th>
        <th class="text-center p-3 border">Judul Berita</th>
        <th class="text-center p-3 border">Tanggal Pembuatan</th>
        <th class="text-center p-3 border">Akses</th>
      </tr>
    </thead>
    <tbody>
      @foreach ( $news as $item )
      <tr class="border text-[14px] odd:bg-white even:bg-gray-100">
        <th class="text-start p-3 border">{{ $loop->iteration }}</th>
        <td class="text-start p-3 border">{{ $item->title }}</td>
        <td class="text-start p-3 border">{{ \Carbon\Carbon::parse($item->date)->translatedFormat('l, j F Y') }}</td>
        <td class="text-start p-3 flex items-center justify-center gap-2">
          <a href="{{ route('admin.news.edit', $item->uuid) }}" class="px-3 py-2 rounded-lg bg-orange-400 text-white"><i class="bi bi-pencil-square"></i></a>
          <form action="{{ route('admin.news.delete', $item->uuid) }}" method="post">
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
      {{ $news->links() }}
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

    $('#openModal').on('click', function() {
      $('#myModal').removeClass('hidden');
    });
    $('#closeModal').on('click', function() {
      $('#myModal').addClass('hidden');
    });

    $('#openListModal').on('click', function() {
      $('#listModal').removeClass('hidden');
    });

    $('#closeListModal').on('click', function() {
      $('#listModal').addClass('hidden');
    });

    $(document).on('click', function(event) {
      if ($(event.target).is('#myModal')) {
        $('#myModal').addClass('hidden');
      }
      if ($(event.target).is('#listModal')) {
        $('#listModal').addClass('hidden');
      }
    });
  });
</script>
@endsection
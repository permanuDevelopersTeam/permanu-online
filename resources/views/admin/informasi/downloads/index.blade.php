@extends('admin.partials.main')

@section('container')

@if (session('success'))
<div class="alert bg-green-200 m-3 p-3 text-center text-green-600 capitalize">
  {{ session('success') }}
</div>
@endif

<div class="flex flex-col justify-center items-center p-5 mb-5">
  <h1 class="text-[40px] text-gray-400 monserrat font-bold">DAFTAR FILE</h1>
</div>

<div class="fixed bottom-0 end-0 m-10 w-[50px] h-[50px] rounded-lg bg-sky-600">
  <a href="{{ route('admin.download.create') }}" class="font-bold text-white text-3xl w-full h-full flex justify-center items-center ">
    +
  </a>
</div>
<div class="p-16">
  <div class="flex gap-3 items-center justify-end mb-5">
    <a href="{{ route('admin.download.create') }}" class="px-3 py-2 rounded-lg bg-sky-600 text-white">Buat Data</a>
  </div>
  <div class="w-full">
    @if ($allFiles->count())
    <table class="min-w-full bg-white border border-gray-300 rounded-lg">
      <thead>
        <tr class="bg-gray-100">
          <th class="py-3 px-6 text-center font-semibold border text-gray-600 border-b">No</th>
          <th class="py-3 px-6 text-center font-semibold border text-gray-600 border-b">Nama File</th>
          <th class="py-3 px-6 text-center font-semibold border text-gray-600 border-b">Ukuran File</th>
          <th class="py-3 px-6 text-center font-semibold border text-gray-600 border-b">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($allFiles as $item)
        <tr class="odd:bg-white even:bg-gray-100">
          <td class="py-4 px-6 text-center border text-gray-700">{{ $loop->iteration }}</td>
          <td class="py-4 px-6 border text-gray-700">{{ $item->name }}</td>
          <td class="py-4 px-6 border text-gray-700">{{ number_format($item->size / 1024) }} KB</td>
          <td class="text-start p-3 flex items-center justify-center gap-2">
            <a href="{{ route('admin.download.edit', $item->uuid) }}" class="px-3 py-2 rounded-lg bg-orange-400 text-white"><i class="bi bi-pencil-square"></i></a>
            <form action="{{ route('admin.download.delete', $item->uuid) }}" method="post">
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
        {{ $allFiles->links() }}
      </div>
    </div>
    @else
    <p class="my-10 text-2xl text-center">Belum Ada Data</p>
    @endif
  </div>
</div>

<script>
  $(document).ready(function() {
    setTimeout(() => {
      $('.alert').fadeOut('slow');
    }, 5000);
  });
</script>
@endsection
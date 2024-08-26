@extends('admin.partials.main')

@section('container')

@if (session('success'))
<div class="alert bg-green-200 m-3 p-3 text-center text-green-600 capitalize">
  {{ session('success') }}
</div>
@endif

@if ($errors->any())
<div class="alert bg-red-200 m-3 p-3 text-center text-red-600 capitalize">
  @foreach($errors->all() as $error)
  {{ $error }}
  @endforeach
</div>
@endif

<div class="flex flex-col justify-center items-center p-5 mb-5">
  <h1 class="text-[40px] text-gray-400 monserrat font-bold">POTENSI DESA</h1>
</div>

<!-- Modal -->
<div id="myModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
  <div class="bg-white w-1/3 rounded-lg shadow-lg p-6">
    <div class="flex justify-between items-center mb-4">
      <h2 class="text-xl font-bold">Form Input</h2>
      <button id="closeModal" class="text-gray-600 hover:text-gray-900">&times;</button>
    </div>
    <form action="{{ route('type.store') }}" method="POST">
      @csrf
      <div class="mb-4">
        <label for="type" class="block text-gray-700">Tipe Potensi</label>
        <input type="text" id="type" name="type" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-sky-600">
      </div>
      <div class="flex justify-end">
        <button type="submit" class="bg-sky-600 text-white px-4 py-2 rounded hover:bg-sky-700">
          Submit
        </button>
      </div>
    </form>
  </div>
</div>

<!-- Modal untuk list data -->
<div id="listModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
  <div class="bg-white w-1/3 rounded-lg shadow-lg p-6">
    <div class="flex justify-between items-center mb-4">
      <h2 class="text-xl font-bold">List Data</h2>
      <button id="closeListModal" class="text-gray-600 hover:text-gray-900">&times;</button>
    </div>
    <div>
      <table class="w-full">
        <thead>
          <tr class="bg-gray-100 border">
            <th class="text-center p-1 border">No</th>
            <th class="text-center p-1 border">Judul Potensi</th>
            <th class="text-center p-1 border">Akses</th>
          </tr>
        </thead>
        <tbody>
          @foreach($typePotential as $item)
          <tr class="border">
            <th class="text-start p-1 border">{{ $loop->iteration }}</th>
            <td class="text-start p-1 border">{{ $item->type }}</td>
            <td class="text-start p-1 flex items-center justify-center gap-2">
              <a href="{{ route('type.edit', $item->uuid) }}" class="px-3 py-2 rounded-lg bg-orange-400 text-white"><i class="bi bi-pencil-square"></i></a>
              <form action="{{ route('type.delete', $item->uuid) }}" method="post">
                @method('delete')
                @csrf
                <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')" class="px-3 py-2 rounded-lg bg-red-500 text-white"><i class="bi bi-trash"></i></button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="px-16">
  <div class="flex gap-3 items-center justify-end mb-5">
    <button id="openListModal" class="px-3 py-2 rounded-lg bg-yellow-300">List Tipe Potensi</button>
    <button id="openModal" class="px-3 py-2 rounded-lg bg-green-600 text-white">Tambah Tipe Potensi</button>
    <a href="{{ route('admin.potential.create') }}" class="px-3 py-2 rounded-lg bg-sky-600 text-white">Buat Data</a>
  </div>
  @if ($potential->count())
  <table class="w-full">
    <thead>
      <tr class="bg-gray-100 border">
        <th class="text-center p-3 border">No</th>
        <th class="text-center p-3 border">Judul Potensi</th>
        <th class="text-center p-3 border">Akses</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($potential as $item)
      <tr class="border">
        <th class="text-start p-3 border">{{ $loop->iteration }}</th>
        <td class="text-start p-3 border">{{ $item->title }}</td>
        <td class="text-start p-3 flex items-center justify-center gap-2">
          <a href="{{ route('admin.potential.edit', $item->uuid) }}" class="px-3 py-2 rounded-lg bg-orange-400 text-white"><i class="bi bi-pencil-square"></i></a>
          <form action="{{ route('admin.potential.delete', $item->uuid) }}" method="post">
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
      {{ $potential->links() }}
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
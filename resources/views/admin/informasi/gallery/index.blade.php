@extends('admin.partials.main')

@section('container')

<div>
  @if (session('success'))
  <div class="alert bg-green-200 m-3 p-3 text-center text-green-600 capitalize">
    {{ session('success') }}
  </div>
  @endif
  <div class="flex flex-col justify-center items-center p-5 mb-5">
    <h1 class="text-[40px] text-gray-400 monserrat font-bold">GALLERY</h1>
  </div>
  <div class="fixed bottom-0 end-0 m-10 w-[50px] h-[50px] rounded-lg bg-sky-600">
    <a href="{{ route('admin.gallery.create') }}" class="font-bold text-white text-3xl w-full h-full flex justify-center items-center ">
      +
    </a>
  </div>

  <div class="overflow-x-auto py-8 px-16">
    <div class="text-end mb-5">
      <a href="{{ route('admin.gallery.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Add New Image
      </a>
    </div>
    <table class="min-w-full bg-white border border-gray-200 text-[14px]">
      <thead>
        <tr class=" bg-gray-100">
          <th class="px-4 py-2 border border-gray-300">No</th>
          <th class="px-4 py-2 border border-gray-300">Judul Galleri</th>
          <th class="px-4 py-2 border border-gray-300">Gambar</th>
          <th class="px-4 py-2 border border-gray-300">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($galleries as $item)
        <tr class="border odd:bg-white even:bg-gray-100">
          <td class="p-3 border">{{ $loop->iteration }}</td>
          <td class="p-3 border">
            <a href="{{ route('admin.gallery.show', $item->uuid) }}" class="text-sky-600 hover:underline">
              {{ $item->title }}
            </a>
          </td>
          <td class="p-3 border">
            <img src="{{ asset('storage/' . $item->image1) }}" alt="gallery-1.jpg" class="h-[100px] w-[200px] object-cover">
          </td>
          <td class="p-3 flex gap-3 justify-center items-center">
            <a href="{{ route('admin.gallery.edit', $item->uuid) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded">
              <i class="bi bi-pencil-square"></i>
            </a>
            <form action="{{ route('admin.gallery.delete', $item->uuid) }}" method="POST" onsubmit="return confirm('Are you sure?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                <i class="bi bi-trash"></i>
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="text-end">
      <div class="mt-4">
        {{ $galleries->links() }}
      </div>
    </div>
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
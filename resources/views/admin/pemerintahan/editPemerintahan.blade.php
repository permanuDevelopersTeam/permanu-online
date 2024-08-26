@extends('admin.partials.main')

@section('container')

@if (session('success'))
<div class="alert bg-green-200 m-3 p-3 text-center text-green-600 capitalize">
  {{ session('success') }}
</div>
@endif
<div class="flex flex-col justify-center items-center p-5 mb-5">
  <h1 class="text-[40px] text-gray-400 monserrat font-bold">EDIT DATA</h1>
  <p class="text-[20px] text-gray-400 monserrat font-bold">{{ $pemerintahanDesa->status }}</p>
</div>

<div class="px-16 flex justify-center">
  <div class="w-[80%] pb-3 mb-3 border-b">
    <form action="{{ route('pemerintahan.update', $pemerintahanDesa->uuid) }}" class="w-full flex gap-3" method="post" enctype="multipart/form-data">
      @csrf
      @method('put')
      <div class="w-[250px] h-auto">
        @if ($pemerintahanDesa->image)
        <img class="img-preview w-[230px] h-[260px] border rounded-lg mb-3 object-cover" src="{{ asset('storage/' . $pemerintahanDesa->image) }}">
        <input type="hidden" name="oldImage" value="{{ $pemerintahanDesa->image }}">
        @else
        <img class="img-preview w-[230px] h-[260px] border rounded-lg mb-3 object-cover">
        @endif
        <label class="block pb-3 w-full mb-3">
          <span class="sr-only">Choose photo</span>
          <input type="file" class="block w-full text-sm text-slate-500 file:border
              file:mr-4 file:py-2 file:px-4 file:rounded-lg
              file:text-sm file:font-semibold file:bg-white
              file:border-sky-600 file:text-sky-600
              hover:file:bg-sky-600 hover:file:text-white
            " name="image" id="image" onchange="previewImage()" />
        </label>
        @error('image')
        <div class="text-xs text-red-400">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="flex-1">
        <div class="mb-3">
          <label for="name" class="font-semibold">Nama Petugas :</label>
          <input type="text" class="w-full p-3 border @error('name') border-red-400 @enderror" name="name" id="name" value="{{ old('name', $pemerintahanDesa->name) }}" placeholder="Nama Petugas...">
          @error('name')
          <div class="text-xs text-red-400">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="my-3">
          <label for="status" class="font-semibold">Jabatan :</label>
          <input type="text" name="status" id="status" value="{{ old('status', $pemerintahanDesa->status) }}" class="w-full p-3 rounded border" disabled>
          @error('status')
          <div class="text-xs text-red-400">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="text-end">
          <button type="submit" class="px-3 py-2 rounded-lg bg-sky-600 text-white hover:bg-sky-700">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
  function previewImage() {
    const image = $('#image')[0].files[0];
    const imgPreview = $('.img-preview')[0];

    imgPreview.style.display = 'block';
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image);
    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }

  $(document).ready(function() {
    setTimeout(() => {
      $('.alert').fadeOut('slow');
    }, 5000);
  });
</script>
@endsection
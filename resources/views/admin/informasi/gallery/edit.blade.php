@extends('admin.partials.main')

@section('container')

<div class="flex flex-col justify-center items-center p-5 mb-5">
  <h1 class="text-[40px] text-gray-400 monserrat font-bold">EDIT GALLERY</h1>
</div>

<div class="p-16 flex justify-center">
  <div class="w-[80%]">
    <form action="{{ route('admin.gallery.update', $gallery->uuid) }}" method="post" class="w-full" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <!-- Input Title -->
      <div class="mb-5">
        <label for="title" class="font-semibold mb-3">Judul Gallery</label>
        <input type="text" name="title" id="title" class="w-full @error('title') border border-red-500 @enderror p-3 rounded border border-gray-600 outline-gray-700" value="{{ old('title', $gallery->title) }}">
        @error('title')
        <div class="text-xs text-red-500">
          {{ $message }}
        </div>
        @enderror
      </div>

      <!-- Input Date -->
      <div class="mb-5">
        <label for="date" class="font-semibold mb-3">Tanggal</label>
        <input type="date" name="date" id="date" class="w-full @error('date') border border-red-500 @enderror p-3 rounded border border-gray-600 outline-gray-700" value="{{ old('date', $gallery->date) }}">
        @error('date')
        <div class="text-xs text-red-500">
          {{ $message }}
        </div>
        @enderror
      </div>

      <!-- Input Images 1 - 9 -->
      @for($i = 1; $i <= 9; $i++)
        <div class="mb-3 border-b">
        <p class="my-3 font-semibold">Gambar {{ $i }}</p>
        @if($gallery->{'image'.$i})
        <img src="{{ asset('storage/' . $gallery->{'image'.$i}) }}" alt="Gambar {{ $i }}" class="img-preview-{{ $i }} w-full h-[260px] border rounded-lg mb-3 object-cover">
        <input type="hidden" name="oldImage{{ $i }}" value="{{ $gallery->{'image'. $i} }}">
        @else
        <img class="img-preview-{{ $i }} w-full h-[260px] border rounded-lg mb-3 object-cover">
        @endif
        <label class="block pb-3 w-full mb-3">
          <span class="sr-only">Choose photo</span>
          <input type="file" class="block w-full text-sm text-slate-500 file:border
                        file:mr-4 file:py-2 file:px-4 file:rounded-lg
                        file:text-sm file:font-semibold file:bg-white
                        file:border-sky-600 file:text-sky-600
                        hover:file:bg-sky-600 hover:file:text-white
                      " name="image{{ $i }}" id="image{{ $i }}" onchange="previewImage({{ $i }})" />
        </label>
        @error("image$i")
        <div class="text-xs text-red-400">
          {{ $message }}
        </div>
        @enderror
  </div>
  @endfor

  <div class="text-end">
    <button class="py-2 px-4 rounded-lg bg-sky-600 text-white disabled:bg-opacity-50">Submit</button>
  </div>
  </form>
</div>
</div>

<script>
  function previewImage(index) {
    const image = $(`#image${index}`)[0].files[0];
    const imgPreview = $(`.img-preview-${index}`)[0];

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
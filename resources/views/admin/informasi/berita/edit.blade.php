@extends('admin.partials.main')

@section('container')

<div class="flex flex-col justify-center items-center p-5 mb-5">
  <h1 class="text-[40px] text-gray-400 monserrat font-bold">BUAT BERITA</h1>
</div>

<div class="p-16 flex justify-center">
  <div class="w-[80%]">
    <form action="{{ route('admin.news.update', $news->uuid) }}" method="post" class="w-full" enctype="multipart/form-data">
      @csrf
      @method('put')
      <div class="mb-3 border-b">
        <p class="my-3 font-semibold">Gambar Terkait</p>
        @if ($news->images)
        <img class="img-preview w-full h-[260px] border rounded-lg mb-3 object-cover" src="{{ asset('storage/' . $news->images) }}">
        <input type="hidden" name="oldImages" value="{{ $news->images }}">
        @else
        <img class="img-preview w-full h-[260px] border rounded-lg mb-3 object-cover">
        @endif
        <label class="block pb-3 w-full mb-3">
          <span class="sr-only">Choose photo</span>
          <input type="file" class="block w-full text-sm text-slate-500 file:border
                file:mr-4 file:py-2 file:px-4 file:rounded-lg
                file:text-sm file:font-semibold file:bg-white
                file:border-sky-600 file:text-sky-600
                hover:file:bg-sky-600 hover:file:text-white
              " name="images" id="image" onchange="previewImage()" />
        </label>
        @error('image')
        <div class="text-xs text-red-400">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-5">
        <label for="title" class="font-semibold mb-3">Judul Berita</label>
        <input type="text" name="title" id="title" class="w-full @error('title') border border-red-500 @enderror p-3 rounded border border-gray-600 outline-gray-700" value="{{ old('title', $news->title) }}">
        @error('title')
        <div class="text-xs text-red-500">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-5">
        <label for="date" class="font-semibold mb-3">Waktu Rilis</label>
        <input type="date" name="date" id="date" class="w-full @error('date') border border-red-500 @enderror p-3 rounded border border-gray-600 outline-gray-700" value="{{ old('date', $news->date) }}">
        @error('date')
        <div class="text-xs text-red-500">
          {{ $message }}
        </div>
        @enderror
      </div>

      <!-- text -->
      <div class="mb-3 trix-wrapper rounded">
        <p class="mb-2 ms-2 font-semibold">Detail Berita</p>
        <input id="body" type="hidden" name="body" value="{{ old('body', $news->body) }}">
        <trix-editor input="body" class="@error('body') border border-red-500 @enderror min-h-[250px]" placeholder="Input Here..."></trix-editor>
        @error('body')
        <div class="text-xs text-red-500">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="text-end">
        <button class="py-2 px-4 rounded-lg bg-sky-600 text-white disabled:bg-opacity-50">Submit</button>
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
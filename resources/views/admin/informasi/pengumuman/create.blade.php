@extends('admin.partials.main')

@section('container')

<div class="flex flex-col justify-center items-center p-5 mb-5">
  <h1 class="text-[40px] text-gray-400 monserrat font-bold">BUAT PENGUMUMAN</h1>
</div>

<div class="p-16 flex justify-center">
  <div class="w-[80%]">
    <form action="{{ route('admin.announcement.store') }}" method="post" class="w-full" enctype="multipart/form-data">
      @csrf
      <div class="mb-5">
        <label for="title" class="font-semibold mb-3">Judul Pengumuman</label>
        <input type="text" name="title" id="title" class="w-full @error('title') border border-red-500 @enderror p-3 rounded border border-gray-600 outline-gray-700" value="{{ old('title') }}">
        @error('title')
        <div class="text-xs text-red-500">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-5">
        <label for="date" class="font-semibold mb-3">Waktu Rilis</label>
        <input type="date" name="date" id="date" class="w-full @error('date') border border-red-500 @enderror p-3 rounded border border-gray-600 outline-gray-700" value="{{ old('date') }}">
        @error('date')
        <div class="text-xs text-red-500">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3 border-b">
        <p class="my-3 font-semibold">File Pengumuman</p>
        <embed id="pdf-preview" class="w-full h-[260px] border rounded-lg mb-3" type="application/pdf" style="display:none;"></embed>
        <label class="block pb-3 w-full mb-3">
          <span class="sr-only">Choose Files</span>
          <input type="file" class="block w-full text-sm text-slate-500 file:border
                file:mr-4 file:py-2 file:px-4 file:rounded-lg
                file:text-sm file:font-semibold file:bg-white
                file:border-sky-600 file:text-sky-600
                hover:file:bg-sky-600 hover:file:text-white
              " name="file" id="file" accept="application/pdf" onchange="previewFile()" />
        </label>
        @error('file')
        <div class="text-xs text-red-400">
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
  function previewFile() {
    const file = $('#file')[0].files[0];
    const pdfPreview = $('#pdf-preview')[0];

    if (file.type === "application/pdf") {
      pdfPreview.style.display = 'block';
      const fileURL = URL.createObjectURL(file);
      pdfPreview.src = fileURL;
    } else {
      pdfPreview.style.display = 'none';
      alert("File bukan PDF!");
    }
  }
</script>

@endsection
@extends('admin.partials.main')

@section('container')

<div class="flex flex-col justify-center items-center p-5 mb-5">
  <h1 class="text-[40px] text-gray-400 monserrat font-bold">EDIT FILE</h1>
</div>

<div class="p-16 flex justify-center">
  <div class="w-[80%]">
    <form action="{{ route('admin.download.update', $allFile->uuid) }}" method="post" class="w-full" enctype="multipart/form-data">
      @csrf
      @method('put')

      <div class="mb-5">
        <label for="name" class="font-semibold mb-3">Nama File</label>
        <input type="text" name="name" id="name" class="w-full @error('name') border border-red-500 @enderror p-3 rounded border border-gray-600 outline-gray-700" value="{{ old('name', $allFile->name) }}">
        @error('name')
        <div class="text-xs text-red-500">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="mb-3 border-b">
        <p class="my-3 font-semibold">File Pengumuman</p>
        @if($allFile->file)
        <embed id="pdf-preview" class="w-full h-[400px] border rounded-lg mb-3" src="{{ asset('storage/' . $allFile->file) }}" type="application/pdf">
        <input type="hidden" name="oldFile" value="{{ $allFile->file }}">
        @else
        <embed id="pdf-preview" class="w-full h-[400px] border rounded-lg mb-3" type="application/pdf" style="display:none;">
        @endif

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
        <button type="submit" class="py-2 px-4 rounded-lg bg-sky-600 text-white hover:bg-sky-700">Perbarui</button>
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
@extends('admin.partials.main')

@section('container')

<div class="flex flex-col justify-center items-center p-5 mb-5">
  <h1 class="text-[40px] text-gray-400 monserrat font-bold">UNGGAH FILE</h1>
</div>

<div class="p-16 flex justify-center">
  <div class="w-[80%]">
    <form action="{{ route('admin.download.store') }}" method="post" class="w-full" enctype="multipart/form-data">
      @csrf

      <div class="mb-5">
        <label for="name" class="font-semibold mb-3">Nama File</label>
        <input type="text" name="name" id="name" class="w-full @error('name') border border-red-500 @enderror p-3 rounded border border-gray-600 outline-gray-700" value="{{ old('name') }}">
        @error('name')
        <div class="text-xs text-red-500">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div id="pdfPreview" class="mb-5 hidden">
        <label class="font-semibold mb-3">Pratinjau PDF</label>
        <embed id="pdfViewer" class="w-full h-[500px] border border-gray-600 rounded-lg" type="application/pdf">
      </div>
      <div class="mb-5">
        <label for="file" class="font-semibold mb-3">Pilih File (.pdf)</label>
        <input type="file" name="file" id="file" class="w-full @error('file') border border-red-500 @enderror p-3 rounded border border-gray-600 outline-gray-700" accept=".pdf" onchange="previewFile()">
        @error('file')
        <div class="text-xs text-red-500">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="text-end">
        <button type="submit" class="py-2 px-4 rounded-lg bg-sky-600 text-white hover:bg-sky-700">Submit</button>
      </div>
    </form>
  </div>
</div>

<script>
  function previewFile() {
    const fileInput = document.getElementById('file');
    const pdfPreview = document.getElementById('pdfPreview');
    const pdfViewer = document.getElementById('pdfViewer');

    const file = fileInput.files[0];
    if (file) {
      const fileURL = URL.createObjectURL(file);

      if (file.type === 'application/pdf') {
        pdfPreview.classList.remove('hidden');
        pdfViewer.src = fileURL;
      } else {
        pdfPreview.classList.add('hidden');
        pdfViewer.src = '';
      }
    }
  }
</script>

@endsection
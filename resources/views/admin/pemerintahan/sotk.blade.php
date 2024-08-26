@extends('admin.partials.main')

@section('container')

@if (session('success'))
<div class="alert bg-green-200 m-3 p-3 text-center text-green-600 capitalize">
  {{ session('success') }}
</div>
@endif
<div class="flex flex-col justify-center items-center p-5 mb-5">
  <h1 class="text-[40px] text-gray-400 monserrat font-bold">SOTK</h1>
</div>

<div class="px-16 mb-10">
  @if ($sotk)
  <form action="{{ route('admin.sotk.update') }}" class="w-full flex justify-center gap-3" method="post" enctype="multipart/form-data">
    @method('put')
    @else
    <form action="{{ route('admin.sotk.store') }}" class="w-full flex justify-center gap-3" method="post" enctype="multipart/form-data">
      @endif
      @csrf
      <div class="w-full h-auto">
        <div class="pb-3 mb-3 border-b">
          <p class="my-3 font-semibold">Team Image</p>
          @if ($sotk)
          @if ($sotk->image)
          <img class="img-preview w-full h-[260px] border rounded-lg mb-3 object-cover" src="{{ asset('storage/' . $sotk->image) }}">
          <input type="hidden" name="oldImage" value="{{ $sotk->image }}">
          @endif
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
              " name="image" id="image" onchange="previewImage()" />
          </label>
          @error('image')
          <div class="text-xs text-red-400">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="pb-3 mb-3 border-b">
          <p class="my-3 font-semibold">Struktur Organisasi Dan Tata Kerja</p>
          @if ($sotk)
          @if ($sotk->image2)
          <img class="img-preview2 w-full h-auto border rounded-lg mb-3 object-cover" src="{{ asset('storage/' . $sotk->image) }}">
          <input type="hidden" name="oldImage2" value="{{ $sotk->image2 }}">
          @endif
          @else
          <img class="img-preview2 w-full h-[260px] border rounded-lg mb-3 object-cover">
          @endif
          <label class="block pb-3 w-full mb-3">
            <span class="sr-only">Choose photo</span>
            <input type="file" class="block w-full text-sm text-slate-500 file:border
                file:mr-4 file:py-2 file:px-4 file:rounded-lg
                file:text-sm file:font-semibold file:bg-white
                file:border-sky-600 file:text-sky-600
                hover:file:bg-sky-600 hover:file:text-white
              " name="image2" id="image2" onchange="previewImage2()" />
          </label>
          @error('image2')
          <div class="text-xs text-red-400">
            {{ $message }}
          </div>
          @enderror
        </div>
        <!-- text -->
        <div class="mb-5 trix-wrapper rounded">
          <p class="mb-2 ms-2 font-semibold">Tuliskan Penjelasan Tata Kerja Dari Masing-Masing Jabatan</p>
          @if ($sotk)
          <input id="body" type="hidden" name="body" value="{{ old('body', $sotk->body) }}">
          @else
          <input id="body" type="hidden" name="body" value="{{ old('body') }}">
          @endif
          <trix-editor input="body" class="@error('body') border border-red-500 @enderror min-h-[300px]" placeholder="Input Here..."></trix-editor>
          @error('body')
          <div class="text-xs text-red-500">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="text-end">
          <button class="py-2 px-4 rounded-lg bg-sky-600 text-white disabled:bg-opacity-50" id="submitButton" disabled>Submit</button>
        </div>
      </div>
    </form>
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

  function previewImage2() {
    const image2 = $('#image2')[0].files[0];
    const imgPreview2 = $('.img-preview2')[0];

    imgPreview2.style.display = 'block';
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image2);
    oFReader.onload = function(oFREvent) {
      imgPreview2.src = oFREvent.target.result;
    }
  }
  $(document).ready(function() {
    setTimeout(() => {
      $('.alert').fadeOut('slow');
    }, 5000);

    const body = $('#body').val();

    function checkEditors() {
      const bodyContent = $('#body').val().trim();

      if ((bodyContent !== body && bodyContent !== '')) {
        $('#submitButton').prop('disabled', false);
      } else {
        $('#submitButton').prop('disabled', true);
      }
    }

    document.addEventListener('trix-change', checkEditors);
  });
</script>

@endsection
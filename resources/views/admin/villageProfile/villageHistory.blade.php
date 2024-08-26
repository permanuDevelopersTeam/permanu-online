@extends('admin.partials.main')

@section('container')
@if (session('success'))
<div class="alert bg-green-200 m-3 p-3 text-center text-green-600 capitalize">
  {{ session('success') }}
</div>
@endif

<div class="flex justify-center items-center p-5 mb-5">
  <h1 class="text-[40px] text-gray-400 monserrat font-bold">SEJARAH DESA</h1>
</div>

<div class="px-10 mb-10">
  @if ($villageHistory)
  <form action="{{ route('villageHistoryUpdate') }}" method="post" class="w-full" enctype="multipart/form-data">
    @method('put')
    @else
    <form action="{{ route('villageHistoryStore') }}" method="post" class="w-full" enctype="multipart/form-data">
      @endif
      @csrf
      <p class="font-semibold mb-3">View Permanu Images</p>
      @if ($villageHistory)
      <img class="img-preview w-full h-[400px] border rounded-lg mb-3 object-cover" src="{{ asset('storage/' . $villageHistory->image) }}">
      <input type="hidden" name="oldImage" value="{{ $villageHistory->image }}">
      @else
      <img class="img-preview w-full h-[400px] border rounded-lg mb-3 object-cover">
      @endif
      <label class="block border-b pb-3 w-full mb-3">
        <span class="sr-only">Choose photo</span>
        <input type="file" class="block w-full text-sm text-slate-500 file:border
            file:mr-4 file:py-2 file:px-4 file:rounded-lg
            file:text-sm file:font-semibold file:bg-white
            file:border-sky-600 file:text-sky-600
            hover:file:bg-sky-600 hover:file:text-white
          " name="image" id="image" onchange="previewImage()" />
      </label>

      <!-- text -->
      <div class="mb-5 trix-wrapper rounded">
        <p class="mb-2 ms-2 font-semibold">Write Permanu History</p>
        @if ($villageHistory)
        <input id="body" type="hidden" name="body" value="{{ old('body', $villageHistory->body) }}">
        @else
        <input id="body" type="hidden" name="body" value="{{ old('body') }}">
        @endif
        <trix-editor input="body" class="@error('body') border border-red-500 @enderror min-h-[300px]" placeholder="Input History Here..."></trix-editor>
        @error('body')
        <div class="text-xs text-red-500">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="text-end">
        <button class="py-2 px-4 rounded-lg bg-sky-600 text-white disabled:bg-opacity-50" id="submitButton" disabled>Submit</button>
      </div>
    </form>
</div>

<script>
  document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
  });

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
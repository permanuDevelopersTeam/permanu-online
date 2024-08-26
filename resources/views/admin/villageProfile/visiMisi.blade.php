@extends('admin.partials.main')

@section('container')
@if (session('success'))
<div class="alert bg-green-200 m-3 p-3 text-center text-green-600 capitalize">
  {{ session('success') }}
</div>
@endif
<div class="flex justify-center items-center p-5 mb-5">
  <h1 class="text-[40px] text-gray-400 monserrat font-bold">VISI & MISI</h1>
</div>

<div class="flex justify-center my-8">
  <form method="post" action="{{ route('visiMisi') }}" class="w-[80%] trix-wrapper">
    @csrf
    <div class="mb-5 trix-wrapper rounded">
      <p class="mb-2 ms-2 font-semibold">VISI</p>
      @if ($visiMisi)
      <input id="visi" type="hidden" name="visi" value="{{ old('visi', $visiMisi->visi) }}">
      @else
      <input id="visi" type="hidden" name="visi" value="{{ old('visi') }}">
      @endif
      <trix-editor input="visi" class="@error('visi') border border-red-500 @enderror min-h-[150px]" placeholder="Input Visi Here..."></trix-editor>
      @error('visi')
      <div class="text-xs text-red-500">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-5 trix-wrapper rounded">
      <p class="mb-2 ms-2 font-semibold">MISI</p>
      @if ($visiMisi)
      <input id="misi" type="hidden" name="misi" value="{{ old('misi', $visiMisi->misi) }}">
      @else
      <input id="misi" type="hidden" name="misi" value="{{ old('misi') }}">
      @endif
      <trix-editor input="misi" class="@error('misi') border border-red-500 @enderror min-h-[250px]" placeholder="Input Misi Here..."></trix-editor>
      @error('misi')
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

  $(document).ready(function() {
    setTimeout(() => {
      $('.alert').fadeOut('slow');
    }, 5000);

    const visi = $('#visi').val();
    const misi = $('#misi').val();

    function checkEditors() {
      const visiContent = $('#visi').val().trim();
      const misiContent = $('#misi').val().trim();

      if ((visiContent !== visi && visiContent !== '') ||
        (misiContent !== misi && misiContent !== '')) {
        $('#submitButton').prop('disabled', false);
      } else {
        $('#submitButton').prop('disabled', true);
      }
    }

    document.addEventListener('trix-change', checkEditors);
  });
</script>
@endsection
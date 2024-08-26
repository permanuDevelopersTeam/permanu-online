@extends('admin.partials.main')

@section('container')


@if (session('error'))
<div class="alert bg-red-200 m-3 p-3 text-center text-red-600 capitalize">
  {{ session('error') }}
</div>
@endif
<div class="flex flex-col justify-center items-center p-5 mb-5">
  <h1 class="text-[40px] text-gray-400 monserrat font-bold">Masukkan Password</h1>
</div>

<div class="p-16 flex justify-center">
  <div class="w-[70%]">
    <form action="{{ route('admin.password.confirm.post') }}" method="post" class="w-full">
      @csrf
      <div class="mb-5 relative">
        <label for="password" class="font-semibold mb-3">Password</label>
        <input type="password" name="password" id="password" class="w-full @error('password') border border-red-500 @enderror p-3 rounded border border-gray-600 outline-gray-700" required>
        <span class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer" onclick="togglePassword('password', this)">
          <i class="bi bi-eye-slash-fill" id="togglePassword"></i>
        </span>
        @error('password')
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
</div>

<script>
  function togglePassword(inputId, element) {
    const input = document.getElementById(inputId);
    const icon = element.querySelector('i');

    if (input.type === 'password') {
      input.type = 'text';
      icon.classList.remove('bi-eye-slash-fill');
      icon.classList.add('bi-eye-fill');
    } else {
      input.type = 'password';
      icon.classList.remove('bi-eye-fill');
      icon.classList.add('bi-eye-slash-fill');
    }
  }

  $(document).ready(function() {
    setTimeout(() => {
      $('.alert').fadeOut('slow');
    }, 5000);
  })
</script>

@endsection
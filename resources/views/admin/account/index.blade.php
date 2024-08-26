@extends('admin.partials.main')

@section('container')

@if (session('success'))
<div class="alert bg-green-200 m-3 p-3 text-center text-green-600 capitalize">
  {{ session('success') }}
</div>
@endif
@if (session('error'))
<div class="alert bg-red-200 m-3 p-3 text-center text-red-600 capitalize">
  {{ session('error') }}
</div>
@endif

<div class="flex flex-col justify-center items-center p-5 mb-5">
  <h1 class="text-[40px] text-gray-400 monserrat font-bold">UBAH AKUN ADMIN</h1>
</div>

<div class="p-16 flex justify-center">
  <div class="w-[80%]">
    <form action="{{ route('admin.account.update') }}" method="post" class="w-full">
      @csrf
      @method('PUT')

      <div class="mb-5">
        <label for="username" class="font-semibold mb-3">Username</label>
        <input type="text" name="username" id="username" class="w-full @error('username') border border-red-500 @enderror p-3 rounded border border-gray-600 outline-gray-700" value="{{ old('username', auth()->user()->username) }}">
        @error('username')
        <div class="text-xs text-red-500">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-5 relative">
        <label for="old_password" class="font-semibold mb-3">Password Lama</label>
        <input type="password" name="old_password" id="old_password" class="w-full @error('old_password') border border-red-500 @enderror p-3 rounded border border-gray-600 outline-gray-700" required>
        <span class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer" onclick="togglePassword('old_password', this)">
          <i class="bi bi-eye-slash-fill" id="toggleCurrentPassword"></i>
        </span>
        @error('old_password')
        <div class="text-xs text-red-500">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-5 relative">
        <label for="new_password" class="font-semibold mb-3">Password Baru</label>
        <input type="password" name="new_password" id="new_password" class="w-full @error('new_password') border border-red-500 @enderror p-3 rounded border border-gray-600 outline-gray-700" required>
        <span class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer" onclick="togglePassword('new_password', this)">
          <i class="bi bi-eye-slash-fill" id="toggleNewPassword"></i>
        </span>
        @error('new_password')
        <div class="text-xs text-red-500">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-5 relative">
        <label for="new_password_confirmation" class="font-semibold mb-3">Konfirmasi Password Baru</label>
        <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="w-full @error('new_password_confirmation') border border-red-500 @enderror p-3 rounded border border-gray-600 outline-gray-700" required>
        <span class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer" onclick="togglePassword('new_password_confirmation', this)">
          <i class="bi bi-eye-slash-fill" id="toggleConfirmPassword"></i>
        </span>
        @error('new_password_confirmation')
        <div class="text-xs text-red-500">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="text-end">
        <button type="submit" class="py-2 px-4 rounded-lg bg-sky-600 text-white hover:bg-sky-700">Simpan Perubahan</button>
      </div>
    </form>
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

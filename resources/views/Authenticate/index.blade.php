@extends('partials.main')

@section('container')
@if (session('error'))
<div class="alert fixed top-0 w-full bg-red-200 m-2 p-4 z-[9999] text-center text-red-600 capitalize">
  {{ session('error') }}
</div>
@endif
<div class="flex justify-center items-center h-screen bg-gray-100">
  <div class="w-full max-w-md">
    <div class="bg-white p-8 rounded-lg shadow-md">
      <h2 class="text-2xl font-bold text-center mb-6">Login</h2>

      <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="mb-4">
          <label for="username" class="block text-gray-700 font-semibold mb-2">Username</label>
          <input type="text" name="username" id="username" class="w-full p-3 border rounded @error('username') border-red-500 @enderror" value="{{ old('username') }}" required autofocus>
          @error('username')
          <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
          <input type="password" name="password" id="password" class="w-full p-3 border rounded @error('password') border-red-500 @enderror" required>
          @error('password')
          <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-4">
          <button type="submit" class="w-full bg-blue-500 text-white py-3 rounded hover:bg-blue-600 transition">Login</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    setTimeout(() => {
      $('.alert').fadeOut('slow');
    }, 5000);
  });
</script>
@endsection
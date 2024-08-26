@extends('admin.partials.main')

@section('container')
<div class="flex flex-col justify-center items-center p-5 mb-5">
  <h1 class="text-[40px] text-gray-400 monserrat font-bold">EDIT TYPE</h1>
</div>

<div class="px-16 flex justify-center">
  <div class="w-[80%]">
    <form action="{{ route('type.update', $typePotential->uuid) }}" method="post">
      @csrf
      @method('put')
      <div class="mb-4">
        <label for="type" class="block text-gray-700">Tipe Potensi</label>
        <input type="text" id="type" name="type" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-sky-600" value="{{ $typePotential->type }}">
      </div>
      <div class="flex justify-end">
        <button type="submit" class="bg-sky-600 text-white px-4 py-2 rounded hover:bg-sky-700">
          Submit
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
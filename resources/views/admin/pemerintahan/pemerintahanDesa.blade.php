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
<div class="flex justify-center items-center p-5 mb-5">
  <h1 class="text-[40px] text-gray-400 monserrat font-bold">PEMERINTAHAN DESA</h1>
</div>

<div class="px-16 flex flex-col items-center">
  <div class="w-[80%] pb-3 mb-3 border-b">
    <form action="{{ route('pemerintahan.store') }}" class="w-full flex gap-3" method="post" enctype="multipart/form-data">
      @csrf
      <div class="w-[250px] h-auto">
        <img class="img-preview w-[230px] h-[260px] border rounded-lg mb-3 object-cover">
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
      <div class="flex-1">
        <div class="mb-3">
          <label for="name">Nama Petugas</label>
          <input type="text" class="w-full p-3 border @error('name') border-red-400 @enderror" name="name" id="name" value="{{ old('name') }}" placeholder="Nama Petugas...">
          @error('name')
          <div class="text-xs text-red-400">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div>
          <select name="status" id="status" class="mb-3 w-full rounded-lg border p-3 @error('status') border-red-400 @enderror">
            <option selected disabled> - Select Jabatan - </option>
            <option value="Kepala Desa">Kepala Desa</option>
            <option value="Sekertaris Desa">Sekertaris Desa</option>
            <option value="Kasi Pemerintahan">Kasi Pemerintahan</option>
            <option value="Kasi Kesejahteraan">Kasi Kesejahteraan</option>
            <option value="Kaur Keuangan">Kaur Keuangan</option>
            <option value="Kaur Perencanaan">Kaur Perencanaan</option>
            <option value="Kaur Tata Usaha & Umum">Kaur Tata Usaha & Umum</option>
            <option value="Kepala Dusun Lowok">Kepala Dusun Lowok</option>
            <option value="Kepala Dusun Tunggul">Kepala Dusun Tunggul</option>
            <option value="Kepala Dusun Krajan Permanu">Kepala Dusun Krajan Permanu</option>
            <option value="Kepala Dusun Blau">Kepala Dusun Blau</option>
          </select>
          @error('status')
          <div class="text-xs text-red-400">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="text-end">
          <button type="submit" class="px-3 py-2 rounded-lg bg-sky-600 text-white hover:bg-sky-700">Submit</button>
        </div>
      </div>
    </form>
  </div>

  <div class="grid grid-cols-2 gap-3">
    @if ($kades)
    <a href="{{ route('pemerintahan.edit', $kades->uuid) }}">
      <div class="rounded border p-3 flex gap-3">
        <div class="w-[150px] h-[200px]">
          @if ($kades)
          @if ($kades->image)
          <img src="{{ asset('storage/' . $kades->image) }}" alt="" class="w-full h-full object-cover">
          @else
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
          @endif
          @else
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
          @endif
        </div>
        <div class="flex-1 flex items-center">
          @if ($kades)
          <div>
            <h3 class="font-semibold uppercase">{{ $kades->name }}</h3>
            <p class="">{{ $kades->status }}</p>
          </div>
          @else
          <div>
            <h3 class="font-semibold uppercase">-</h3>
            </h3>
            <p class="">Kepala Desa</p>
          </div>
          @endif
        </div>
      </div>
    </a>
    @else
    <div class="rounded border p-3 flex gap-3">
      <div class="w-[150px] h-[200px]">
        @if ($kades)
        @if ($kades->image)
        <img src="{{ asset('storage/' . $kades->image) }}" alt="" class="w-full h-full object-cover">
        @else
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
        @endif
        @else
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
        @endif
      </div>
      <div class="flex-1 flex items-center">
        @if ($kades)
        <div>
          <h3 class="font-semibold uppercase">{{ $kades->name }}</h3>
          <p class="">{{ $kades->status }}</p>
        </div>
        @else
        <div>
          <h3 class="font-semibold uppercase">-</h3>
          </h3>
          <p class="">Kepala Desa</p>
        </div>
        @endif
      </div>
    </div>
    @endif
    @if ($sekdes)
    <a href="{{ route('pemerintahan.edit', $sekdes->uuid) }}">
      <div class="rounded border p-3 flex gap-3">
        <div class="w-[150px] h-[200px]">
          @if ($sekdes)
          @if ($sekdes->image)
          <img src="{{ asset('storage/' . $sekdes->image) }}" alt="" class="w-full h-full object-cover">
          @else
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
          @endif
          @else
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
          @endif
        </div>
        <div class="flex-1 flex items-center">
          @if ($sekdes)
          <div>
            <h3 class="font-semibold uppercase">{{ $sekdes->name }}</h3>
            <p class="">{{ $sekdes->status }}</p>
          </div>
          @else
          <div>
            <h3 class="font-semibold uppercase">-</h3>
            </h3>
            <p class="">Sekertaris Desa</p>
          </div>
          @endif
        </div>
      </div>
    </a>
    @else
    <div class="rounded border p-3 flex gap-3">
      <div class="w-[150px] h-[200px]">
        @if ($sekdes)
        @if ($sekdes->image)
        <img src="{{ asset('storage/' . $sekdes->image) }}" alt="" class="w-full h-full object-cover">
        @else
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
        @endif
        @else
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
        @endif
      </div>
      <div class="flex-1 flex items-center">
        @if ($sekdes)
        <div>
          <h3 class="font-semibold uppercase">{{ $sekdes->name }}</h3>
          <p class="">{{ $sekdes->status }}</p>
        </div>
        @else
        <div>
          <h3 class="font-semibold uppercase">-</h3>
          </h3>
          <p class="">Sekertaris Desa</p>
        </div>
        @endif
      </div>
    </div>
    @endif
    @if ($kasiPemerintahan)
    <a href="{{ route('pemerintahan.edit', $kasiPemerintahan->uuid) }}">
      <div class="rounded border p-3 flex gap-3">
        <div class="w-[150px] h-[200px]">
          @if ($kasiPemerintahan)
          @if ($kasiPemerintahan->image)
          <img src="{{ asset('storage/' . $kasiPemerintahan->image) }}" alt="" class="w-full h-full object-cover">
          @else
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
          @endif
          @else
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
          @endif
        </div>
        <div class="flex-1 flex items-center">
          @if ($kasiPemerintahan)
          <div>
            <h3 class="font-semibold uppercase">{{ $kasiPemerintahan->name }}</h3>
            <p class="">{{ $kasiPemerintahan->status }}</p>
          </div>
          @else
          <div>
            <h3 class="font-semibold uppercase">-</h3>
            </h3>
            <p class="">Kasi Pemerintahan</p>
          </div>
          @endif
        </div>
      </div>
    </a>
    @else
    <div class="rounded border p-3 flex gap-3">
      <div class="w-[150px] h-[200px]">
        @if ($kasiPemerintahan)
        @if ($kasiPemerintahan->image)
        <img src="{{ asset('storage/' . $kasiPemerintahan->image) }}" alt="" class="w-full h-full object-cover">
        @else
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
        @endif
        @else
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
        @endif
      </div>
      <div class="flex-1 flex items-center">
        @if ($kasiPemerintahan)
        <div>
          <h3 class="font-semibold uppercase">{{ $kasiPemerintahan->name }}</h3>
          <p class="">{{ $kasiPemerintahan->status }}</p>
        </div>
        @else
        <div>
          <h3 class="font-semibold uppercase">-</h3>
          </h3>
          <p class="">Kasi Pemerintahan</p>
        </div>
        @endif
      </div>
    </div>
    @endif
    @if ($kasiPelayanan)
    <a href="{{ route('pemerintahan.edit', $kasiPelayanan->uuid) }}">
      <div class="rounded border p-3 flex gap-3">
        <div class="w-[150px] h-[200px]">
          @if ($kasiPelayanan)
          @if ($kasiPelayanan->image)
          <img src="{{ asset('storage/' . $kasiPelayanan->image) }}" alt="" class="w-full h-full object-cover">
          @else
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
          @endif
          @else
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
          @endif
        </div>
        <div class="flex-1 flex items-center">
          @if ($kasiPelayanan)
          <div>
            <h3 class="font-semibold uppercase">{{ $kasiPelayanan->name }}</h3>
            <p class="">{{ $kasiPelayanan->status }}</p>
          </div>
          @else
          <div>
            <h3 class="font-semibold uppercase">-</h3>
            </h3>
            <p class="">Kasi Pelayanan</p>
          </div>
          @endif
        </div>
      </div>
    </a>
    @else
    <div class="rounded border p-3 flex gap-3">
      <div class="w-[150px] h-[200px]">
        @if ($kasiPelayanan)
        @if ($kasiPelayanan->image)
        <img src="{{ asset('storage/' . $kasiPelayanan->image) }}" alt="" class="w-full h-full object-cover">
        @else
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
        @endif
        @else
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
        @endif
      </div>
      <div class="flex-1 flex items-center">
        @if ($kasiPelayanan)
        <div>
          <h3 class="font-semibold uppercase">{{ $kasiPelayanan->name }}</h3>
          <p class="">{{ $kasiPelayanan->status }}</p>
        </div>
        @else
        <div>
          <h3 class="font-semibold uppercase">-</h3>
          </h3>
          <p class="">Kasi Pelayanan</p>
        </div>
        @endif
      </div>
    </div>
    @endif

    @if ($kasiKesejahteraan)
    <a href="{{ route('pemerintahan.edit', $kasiKesejahteraan->uuid) }}">
      <div class="rounded border p-3 flex gap-3">
        <div class="w-[150px] h-[200px]">
          @if ($kasiKesejahteraan)
          @if ($kasiKesejahteraan->image)
          <img src="{{ asset('storage/' . $kasiKesejahteraan->image) }}" alt="" class="w-full h-full object-cover">
          @else
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
          @endif
          @else
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
          @endif
        </div>
        <div class="flex-1 flex items-center">
          @if ($kasiKesejahteraan)
          <div>
            <h3 class="font-semibold uppercase">{{ $kasiKesejahteraan->name }}</h3>
            <p class="">{{ $kasiKesejahteraan->status }}</p>
          </div>
          @else
          <div>
            <h3 class="font-semibold uppercase">-</h3>
            </h3>
            <p class="">Kasi Kesejahteraan</p>
          </div>
          @endif
        </div>
      </div>
    </a>
    @else
    <div class="rounded border p-3 flex gap-3">
      <div class="w-[150px] h-[200px]">
        @if ($kasiKesejahteraan)
        @if ($kasiKesejahteraan->image)
        <img src="{{ asset('storage/' . $kasiKesejahteraan->image) }}" alt="" class="w-full h-full object-cover">
        @else
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
        @endif
        @else
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
        @endif
      </div>
      <div class="flex-1 flex items-center">
        @if ($kasiKesejahteraan)
        <div>
          <h3 class="font-semibold uppercase">{{ $kasiKesejahteraan->name }}</h3>
          <p class="">{{ $kasiKesejahteraan->status }}</p>
        </div>
        @else
        <div>
          <h3 class="font-semibold uppercase">-</h3>
          </h3>
          <p class="">Kasi Kesejahteraan</p>
        </div>
        @endif
      </div>
    </div>
    @endif

    @if ($kaurKeuangan)
    <a href="{{ route('pemerintahan.edit', $kaurKeuangan->uuid) }}">
      <div class="rounded border p-3 flex gap-3">
        <div class="w-[150px] h-[200px]">
          @if ($kaurKeuangan)
          @if ($kaurKeuangan->image)
          <img src="{{ asset('storage/' . $kaurKeuangan->image) }}" alt="" class="w-full h-full object-cover">
          @else
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
          @endif
          @else
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
          @endif
        </div>
        <div class="flex-1 flex items-center">
          @if ($kaurKeuangan)
          <div>
            <h3 class="font-semibold uppercase">{{ $kaurKeuangan->name }}</h3>
            <p class="">{{ $kaurKeuangan->status }}</p>
          </div>
          @else
          <div>
            <h3 class="font-semibold uppercase">-</h3>
            </h3>
            <p class="">Kaur Keuangan</p>
          </div>
          @endif
        </div>
      </div>
    </a>
    @else
    <div class="rounded border p-3 flex gap-3">
      <div class="w-[150px] h-[200px]">
        @if ($kaurKeuangan)
        @if ($kaurKeuangan->image)
        <img src="{{ asset('storage/' . $kaurKeuangan->image) }}" alt="" class="w-full h-full object-cover">
        @else
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
        @endif
        @else
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
        @endif
      </div>
      <div class="flex-1 flex items-center">
        @if ($kaurKeuangan)
        <div>
          <h3 class="font-semibold uppercase">{{ $kaurKeuangan->name }}</h3>
          <p class="">{{ $kaurKeuangan->status }}</p>
        </div>
        @else
        <div>
          <h3 class="font-semibold uppercase">-</h3>
          </h3>
          <p class="">Kaur Keuangan</p>
        </div>
        @endif
      </div>
    </div>
    @endif

    @if ($kaurPerencanaan)
    <a href="{{ route('pemerintahan.edit', $kaurPerencanaan->uuid) }}">
      <div class="rounded border p-3 flex gap-3">
        <div class="w-[150px] h-[200px]">
          @if ($kaurPerencanaan)
          @if ($kaurPerencanaan->image)
          <img src="{{ asset('storage/' . $kaurPerencanaan->image) }}" alt="" class="w-full h-full object-cover">
          @else
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
          @endif
          @else
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
          @endif
        </div>
        <div class="flex-1 flex items-center">
          @if ($kaurPerencanaan)
          <div>
            <h3 class="font-semibold uppercase">{{ $kaurPerencanaan->name }}</h3>
            <p class="">{{ $kaurPerencanaan->status }}</p>
          </div>
          @else
          <div>
            <h3 class="font-semibold uppercase">-</h3>
            </h3>
            <p class="">Kaur Perencanaan</p>
          </div>
          @endif
        </div>
      </div>
    </a>
    @else
    <div class="rounded border p-3 flex gap-3">
      <div class="w-[150px] h-[200px]">
        @if ($kaurPerencanaan)
        @if ($kaurPerencanaan->image)
        <img src="{{ asset('storage/' . $kaurPerencanaan->image) }}" alt="" class="w-full h-full object-cover">
        @else
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
        @endif
        @else
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
        @endif
      </div>
      <div class="flex-1 flex items-center">
        @if ($kaurPerencanaan)
        <div>
          <h3 class="font-semibold uppercase">{{ $kaurPerencanaan->name }}</h3>
          <p class="">{{ $kaurPerencanaan->status }}</p>
        </div>
        @else
        <div>
          <h3 class="font-semibold uppercase">-</h3>
          </h3>
          <p class="">Kaur Perencanaan</p>
        </div>
        @endif
      </div>
    </div>
    @endif

    @if ($kaurTataUsaha)
    <a href="{{ route('pemerintahan.edit', $kaurTataUsaha->uuid) }}">
      <div class="rounded border p-3 flex gap-3">
        <div class="w-[150px] h-[200px]">
          @if ($kaurTataUsaha)
          @if ($kaurTataUsaha->image)
          <img src="{{ asset('storage/' . $kaurTataUsaha->image) }}" alt="" class="w-full h-full object-cover">
          @else
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
          @endif
          @else
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
          @endif
        </div>
        <div class="flex-1 flex items-center">
          @if ($kaurTataUsaha)
          <div>
            <h3 class="font-semibold uppercase">{{ $kaurTataUsaha->name }}</h3>
            <p class="">{{ $kaurTataUsaha->status }}</p>
          </div>
          @else
          <div>
            <h3 class="font-semibold uppercase">-</h3>
            </h3>
            <p class="">Kaur Tata Usaha & Umum</p>
          </div>
          @endif
        </div>
      </div>
    </a>
    @else
    <div class="rounded border p-3 flex gap-3">
      <div class="w-[150px] h-[200px]">
        @if ($kaurTataUsaha)
        @if ($kaurTataUsaha->image)
        <img src="{{ asset('storage/' . $kaurTataUsaha->image) }}" alt="" class="w-full h-full object-cover">
        @else
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
        @endif
        @else
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
        @endif
      </div>
      <div class="flex-1 flex items-center">
        @if ($kaurTataUsaha)
        <div>
          <h3 class="font-semibold uppercase">{{ $kaurTataUsaha->name }}</h3>
          <p class="">{{ $kaurTataUsaha->status }}</p>
        </div>
        @else
        <div>
          <h3 class="font-semibold uppercase">-</h3>
          </h3>
          <p class="">Kaur Tata Usaha & Umum</p>
        </div>
        @endif
      </div>
    </div>
    @endif

    @if ($kDsnLowok)
    <a href="{{ route('pemerintahan.edit', $kDsnLowok->uuid) }}">
      <div class="rounded border p-3 flex gap-3">
        <div class="w-[150px] h-[200px]">
          @if ($kDsnLowok)
          @if ($kDsnLowok->image)
          <img src="{{ asset('storage/' . $kDsnLowok->image) }}" alt="" class="w-full h-full object-cover">
          @else
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
          @endif
          @else
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
          @endif
        </div>
        <div class="flex-1 flex items-center">
          @if ($kDsnLowok)
          <div>
            <h3 class="font-semibold uppercase">{{ $kDsnLowok->name }}</h3>
            <p class="">{{ $kDsnLowok->status }}</p>
          </div>
          @else
          <div>
            <h3 class="font-semibold uppercase">-</h3>
            </h3>
            <p class="">Kepala Dusun Lowok</p>
          </div>
          @endif
        </div>
      </div>
    </a>
    @else
    <div class="rounded border p-3 flex gap-3">
      <div class="w-[150px] h-[200px]">
        @if ($kDsnLowok)
        @if ($kDsnLowok->image)
        <img src="{{ asset('storage/' . $kDsnLowok->image) }}" alt="" class="w-full h-full object-cover">
        @else
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
        @endif
        @else
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
        @endif
      </div>
      <div class="flex-1 flex items-center">
        @if ($kDsnLowok)
        <div>
          <h3 class="font-semibold uppercase">{{ $kDsnLowok->name }}</h3>
          <p class="">{{ $kDsnLowok->status }}</p>
        </div>
        @else
        <div>
          <h3 class="font-semibold uppercase">-</h3>
          </h3>
          <p class="">Kepala Dusun Lowok</p>
        </div>
        @endif
      </div>
    </div>
    @endif

    @if ($kDsnTunggul)
    <a href="{{ route('pemerintahan.edit', $kDsnTunggul->uuid) }}">
      <div class="rounded border p-3 flex gap-3">
        <div class="w-[150px] h-[200px]">
          @if ($kDsnTunggul)
          @if ($kDsnTunggul->image)
          <img src="{{ asset('storage/' . $kDsnTunggul->image) }}" alt="" class="w-full h-full object-cover">
          @else
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
          @endif
          @else
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
          @endif
        </div>

        <div class="flex-1 flex items-center">
          @if ($kDsnTunggul)
          <div>
            <h3 class="font-semibold uppercase">{{ $kDsnTunggul->name }}</h3>
            <p class="">{{ $kDsnTunggul->status }}</p>
          </div>
          @else
          <div>
            <h3 class="font-semibold uppercase">-</h3>
            </h3>
            <p class="">Kepala Dusun Tunggul</p>
          </div>
          @endif
        </div>
      </div>
    </a>
    @else
    <div class="rounded border p-3 flex gap-3">
      <div class="w-[150px] h-[200px]">
        @if ($kDsnTunggul)
        @if ($kDsnTunggul->image)
        <img src="{{ asset('storage/' . $kDsnTunggul->image) }}" alt="" class="w-full h-full object-cover">
        @else
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
        @endif
        @else
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
        @endif
      </div>

      <div class="flex-1 flex items-center">
        @if ($kDsnTunggul)
        <div>
          <h3 class="font-semibold uppercase">{{ $kDsnTunggul->name }}</h3>
          <p class="">{{ $kDsnTunggul->status }}</p>
        </div>
        @else
        <div>
          <h3 class="font-semibold uppercase">-</h3>
          </h3>
          <p class="">Kepala Dusun Tunggul</p>
        </div>
        @endif
      </div>
    </div>
    @endif

    @if ($kDsnKrajan)
    <a href="{{ route('pemerintahan.edit', $kDsnKrajan->uuid) }}">
      <div class="rounded border p-3 flex gap-3">
        <div class="w-[150px] h-[200px]">
          @if ($kDsnKrajan)
          @if ($kDsnKrajan->image)
          <img src="{{ asset('storage/' . $kDsnKrajan->image) }}" alt="" class="w-full h-full object-cover">
          @else
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
          @endif
          @else
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
          @endif
        </div>
        <div class="flex-1 flex items-center">
          @if ($kDsnKrajan)
          <div>
            <h3 class="font-semibold uppercase">{{ $kDsnKrajan->name }}</h3>
            <p class="">{{ $kDsnKrajan->status }}</p>
          </div>
          @else
          <div>
            <h3 class="font-semibold uppercase">-</h3>
            </h3>
            <p class="">Kepala Dusun Krajan Permanu</p>
          </div>
          @endif
        </div>
      </div>
    </a>
    @else
    <div class="rounded border p-3 flex gap-3">
      <div class="w-[150px] h-[200px]">
        @if ($kDsnKrajan)
        @if ($kDsnKrajan->image)
        <img src="{{ asset('storage/' . $kDsnKrajan->image) }}" alt="" class="w-full h-full object-cover">
        @else
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
        @endif
        @else
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
        @endif
      </div>
      <div class="flex-1 flex items-center">
        @if ($kDsnKrajan)
        <div>
          <h3 class="font-semibold uppercase">{{ $kDsnKrajan->name }}</h3>
          <p class="">{{ $kDsnKrajan->status }}</p>
        </div>
        @else
        <div>
          <h3 class="font-semibold uppercase">-</h3>
          </h3>
          <p class="">Kepala Dusun Krajan Permanu</p>
        </div>
        @endif
      </div>
    </div>
    @endif

    @if ($kDsnBlau)
    <a href="{{ route('pemerintahan.edit', $kDsnBlau->uuid) }}">
      <div class="rounded border p-3 flex gap-3">
        <div class="w-[150px] h-[200px]">
          @if ($kDsnBlau)
          @if ($kDsnBlau->image)
          <img src="{{ asset('storage/' . $kDsnBlau->image) }}" alt="" class="w-full h-full object-cover">
          @else
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
          @endif
          @else
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
          @endif
        </div>
        <div class="flex-1 flex items-center">
          @if ($kDsnBlau)
          <div>
            <h3 class="font-semibold uppercase">{{ $kDsnBlau->name }}</h3>
            <p class="">{{ $kDsnBlau->status }}</p>
          </div>
          @else
          <div>
            <h3 class="font-semibold uppercase">-</h3>
            </h3>
            <p class="">Kepala Dusun Blau</p>
          </div>
          @endif
        </div>
      </div>
    </a>
    @else
    <div class="rounded border p-3 flex gap-3">
      <div class="w-[150px] h-[200px]">
        @if ($kDsnBlau)
        @if ($kDsnBlau->image)
        <img src="{{ asset('storage/' . $kDsnBlau->image) }}" alt="" class="w-full h-full object-cover">
        @else
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
        @endif
        @else
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpd4mJRIUwqgE8D_Z2znANEbtiz4GhI4M8NQ&s" alt="" class="w-full h-full object-cover">
        @endif
      </div>
      <div class="flex-1 flex items-center">
        @if ($kDsnBlau)
        <div>
          <h3 class="font-semibold uppercase">{{ $kDsnBlau->name }}</h3>
          <p class="">{{ $kDsnBlau->status }}</p>
        </div>
        @else
        <div>
          <h3 class="font-semibold uppercase">-</h3>
          </h3>
          <p class="">Kepala Dusun Blau</p>
        </div>
        @endif
      </div>
    </div>
    @endif
  </div>
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

  $(document).ready(function() {
    setTimeout(() => {
      $('.alert').fadeOut('slow');
    }, 5000);
  });
</script>
@endsection
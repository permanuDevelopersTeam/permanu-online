@extends('partials.main')

@section('container')

<div class="flex justify-center items-center p-5 bg-gray-100 mb-5">
  <h1 class="text-[55px] text-gray-400 monserrat font-bold text-center">PEMERINTAHAN DESA</h1>
</div>
<div class="px-16">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
    @if ($kades)
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
@endsection
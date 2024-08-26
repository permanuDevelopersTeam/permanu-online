@extends('partials.main')

@section('container')

<div>
  <!-- Latest News -->
  <article class="flex md:flex-row flex-col items-center justify-center gap-10 md:px-16 py-10">
    <div class="md:p-5 md:w-[300px] flex flex-col gap-4">
      <h2 class="text-2xl font-bold">Berita Terbaru</h2>
      <p class="capitalize text-xs text-gray-600">bacalah berita-berita yang sedang terjadi di desa permanu.</p>
      <div class="text-start">
        <a href="{{ route('information.news') }}" class="border border-sky-600 rounded-xl py-2 px-2 text-xs duration-200 hover:bg-sky-600 hover:text-white">Semua Berita <i class="bi bi-arrow-right-short"></i></a>
      </div>
    </div>
    <div class="flex-1 lg:text-xs px-5">
      <div class="flex items-center justify-center w-full lg:flex-row flex-col gap-3">
        <!-- cards -->
        @if ($news->count())
        @foreach ($news as $item)
        <a href="{{ route('information.detail.news', $item->uuid) }}">
          <div class="lg:w-[14rem] w-[16rem] h-[230px] rounded border overflow-hidden">
            <div class="w-full h-full relative">
              <img src="{{ asset('storage/' . $item->images) }}" alt="images.jpg" class="w-full h-full object-cover">
              <div class="p-3 absolute inset-0 flex items-end bg-sky-900 bg-opacity-30">
                <div class="text-white capitalize">
                  <p class="mb-3">{{ $item->title }}</p>
                  <p class="lg:text-[10px] text-[14px]">{{ $item->created_at->diffForHumans() }} oleh <span class="font-bold uppercase">{{ $item->author }}</span></p>
                </div>
              </div>
            </div>
          </div>
        </a>
        @endforeach
        @else
        <div class="text-center text-xl text-gray-500">
          <p>Belum Ada Data Yang Bisa Ditampilkan</p>
        </div>
        @endif
      </div>
    </div>
  </article>

  <!-- informations -->
  <div class="relative h-full md:mb-28 md:mt-0 mt-36 mb-60 md:mb-56">
    <div class="h-[250px] w-full bg-gray-100 p-10"></div>
    <div class="flex flex-col justify-center items-center absolute inset-0 top-32">
      <div class="w-[80%] flex justify-center items-center bg-white p-5 shadow-md">
        <div class="grid md:grid-cols-3 grid-cols-1 gap-3">
          <!-- council -->
          <div class="min-w-[14rem] h-full mb-3 overflow-hidden p-2 capitalize">
            <h3 class="text-primary-red monserrat font-bold mb-3">PERANGKAT DESA</h3>
            <p class="text-xs text-gray-600 mb-3">Berikut adalah list kepengurusan desa.</p>
            <div class="flex flex-col gap-1 text-xs">
              <a href="{{ route('government') }}" class="py-2 text-sky-600 border-b">Kepala Desa</a>
              <a href="{{ route('government') }}" class="py-2 text-sky-600 border-b">Sekertaris Desa</a>
              <a href="{{ route('government') }}" class="py-2 text-sky-600 border-b">Kasi Pemerintahan</a>
              <a href="{{ route('government') }}" class="py-2 text-sky-600 border-b">Kasi Pelayanan</a>
            </div>
          </div>
          <!--  -->
          <div class="min-w-[14rem] h-full mb-3 overflow-hidden p-2 capitalize">
            <h3 class="text-primary-red monserrat font-bold mb-3">FITUR</h3>
            <p class="text-xs text-gray-600 mb-3">Beberapa Fitur Menarik Desa Permanu.</p>
            <div class="flex flex-col gap-1 text-xs">
              <a href="{{ route('information.announcements') }}" class="py-2 text-sky-600 border-b">Pengumuman</a>
              <a href="{{ route('information.events') }}" class="py-2 text-sky-600 border-b">Acara</a>
              <a href="{{ route('information.downloads') }}" class="py-2 text-sky-600 border-b">Dokumen</a>
            </div>
          </div>
          <!-- gallery -->
          <div class="min-w-[14rem] h-full mb-3 overflow-hidden p-2 capitalize">
            <h3 class="text-primary-red monserrat font-bold mb-3">Galeri Desa</h3>
            <p class="text-xs text-gray-600 mb-3">dokumentasi desa berupa gambar.</p>
            <div class="flex flex-col gap-1 text-xs">
              <a href="{{ route('information.gallery') }}" class="py-2 text-sky-600 border-b">Gambar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- events -->
  <div class="relative mb-16">
    <div class="text-center ">
      <h1 class="text-[60px] font-bold monserrat text-gray-400">EVENT</h1>
    </div>
    <div class="flex flex-col items-center justify-center">
      <div class="w-[80%] overflow-hidden mb-8">
        <div class="flex flex-col md:flex-row items-center gap-3 text-xs">
          <!-- cards -->
          @if ($events->count())
          @foreach ($events as $item)
          <a href="{{ route('information.detail.event', $item->uuid) }}">
            <div class="w-[14rem] h-[230px] rounded-lg border overflow-hidden">
              <div class="w-full h-full relative">
                <img src="{{ asset('storage/' . $item->image1) }}" alt="images.jpg" class="w-full h-full object-cover">
                <div class="p-3 absolute inset-0 flex flex-col justify-between bg-sky-900 bg-opacity-30">
                  <div class="flex justify-start gap-2 text-lg">
                    <div class="w-[40px] h-[40px] rounded bg-sky-600 text-white font-semibold flex justify-center items-center bg-opacity-70">
                      <p>{{ \Carbon\Carbon::parse($item->start_event)->format('d') }}</p>
                    </div>
                  </div>
                  <div class="text-white capitalize text-[14px]">
                    <p class="mb-3">{{ $item->title }}</p>
                    <p class="text-[10px]">{{ $item->created_at->diffForHumans() }} oleh <span class="font-bold">{{ $item->author }}</span></p>
                  </div>
                </div>
              </div>
            </div>
          </a>
          @endforeach
          @else
          <div class="text-center text-xl text-gray-500">
            <p>Belum Ada Data Yang Bisa Ditampilkan</p>
          </div>
          @endif
        </div>
      </div>
      <div class="text-center">
        <a href="{{ route('information.events') }}" class="py-2 px-3 rounded-xl border border-sky-600 duration-200 hover:bg-sky-600 hover:text-white">Semua Events <i class="bi bi-arrow-right-short"></i></a>
      </div>
    </div>
  </div>

  <!-- Lstest update -->
  <div class="bg-gray-100 p-10">
    <div class="flex gap-5 md:flex-row flex-col">
      <!-- latest Announcement -->
      <div class="flex-1 p-3">
        <h4 class="font-semibold text-lg">Pengumuman Terakhir</h4>
        <div class="w-[100px] h-[4px] rounded-xl bg-sky-600 my-3"></div>
        @if ($announcement->count())
        <div class="mb-3 text-gray-500 text-[14px]">
          @foreach ($announcement as $item)
          <div class="flex gap-5 px-2 border-b">
            <div class="w-[75px]">
              <img src="{{ asset('images/permanu-icon.png') }}" alt="logo-permanu.jpg" class="w-full h-full object-cover">
            </div>
            <div class="flex-1 py-4">
              <a href="{{ route('information.announcements.show', $item->uuid) }}" class=" text-sky-600 mb-3 hover:text-sky-800 hover:underline">{{ $item->title }}</a>
              <p class="">{{ \Carbon\Carbon::parse($item->date)->translatedFormat('l, j F Y') }}</p>
            </div>
          </div>
          @endforeach
        </div>
        <a href="#" class="border border-sky-600 rounded-xl py-2 px-2 text-xs duration-200 hover:bg-sky-600 hover:text-white">Selengkapnya <i class="bi bi-arrow-right-short"></i></a>
        @else
        <div class="text-center text-xl text-gray-500 my-3">
          <p>Belum Ada Data Yang Bisa Ditampilkan</p>
        </div>
        @endif
      </div>

      <!-- Latest gallery -->
      <div class="flex-1 p-3">
        <h4 class="font-semibold text-lg">Latest Gallery</h4>
        <div class="w-[100px] h-[4px] rounded-xl bg-sky-600 my-3"></div>
        @if ($gallery->count())
        <div class="mb-3 text-gray-500 text-[14px]">
          @foreach ($gallery as $item)
          <a href="{{ route('information.gallery.show', $item->uuid) }}">
            <div class="flex gap-3 border-b mb-2 p-1">
              <div class="h-[90px] w-[90px] overflow-hidden">
                <img src="{{ asset('storage/' . $item->image1) }}" alt="image-small.img" class="w-full h-full object-cover">
              </div>
              <div class="capitalize flex flex-col gap-1 flex-1">
                <h5 class="text-primary-red font-bold uppercase">{{ $item->title }}</h5>
                <p>{{ \Carbon\Carbon::parse($item->date)->translatedFormat('l, j F Y') }}</p>
              </div>
            </div>
          </a>
          @endforeach
          <a href="{{ route('information.gallery') }}" class="border border-sky-600 rounded-xl py-2 px-2 text-xs duration-200 hover:bg-sky-600 hover:text-white">Selengkapnya <i class="bi bi-arrow-right-short"></i></a>
        </div>
        @else
        <div class="text-center text-xl text-gray-500 my-3">
          <p>Belum Ada Data Yang Bisa Ditampilkan</p>
        </div>
        @endif
      </div>

      <!-- latest documents -->
      <div class="flex-1 p-3">
        <h4 class="font-semibold text-lg">Latest Documents</h4>
        <div class="w-[100px] h-[4px] rounded-xl bg-sky-600 my-3"></div>
        @if ($allFile->count())
        <div class="mb-3">
          @foreach ($allFile as $item)
          <div class="flex items-center gap-2 p-2 border-b">
            <div class="text-center text-3xl text-gray-500"><i class="bi bi-filetype-pdf"></i></div>
            <div class="flex-1 text-xs">
              <p class="text-sky-600 mb-2">
                <a href="{{ route('information.download.detail', $item->uuid) }}" class="hover:underline">{{ $item->name }}.pdf</a>
              </p>
              <p>{{ number_format($item->size / 1024) }} KB</p>
            </div>
          </div>
          @endforeach
        </div>
        <a href="{{ route('information.downloads') }}" class="border border-sky-600 rounded-xl py-2 px-2 text-xs duration-200 hover:bg-sky-600 hover:text-white">Selengkapnya <i class="bi bi-arrow-right-short"></i></a>
        @else
        <div class="text-center text-xl text-gray-500 my-3">
          <p>Belum Ada Data Yang Bisa Ditampilkan</p>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection
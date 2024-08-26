@extends('admin.partials.main')

@section('container')
<div class="p-8 bg-gray-100 min-h-screen">
  <h1 class="text-3xl font-bold text-gray-800 mb-6">Selamat Datang ADMIN</h1>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <!-- Menu Profil Desa -->
      <div class="bg-white p-6 rounded-lg shadow-lg hover:bg-gray-50 transition duration-300">
          <h2 class="text-xl font-semibold text-gray-700 mb-4">Profil Desa</h2>
          <ul class="list-disc pl-5 text-gray-600">
              <li><a href="{{ route('visiMisi') }}" class="text-blue-500 hover:text-blue-700">Visi & Misi</a></li>
              <li><a href="{{ route('villageHistory') }}" class="text-blue-500 hover:text-blue-700">Sejarah Desa</a></li>
              <li><a href="{{ route('demografi') }}" class="text-blue-500 hover:text-blue-700">Demografi</a></li>
          </ul>
      </div>

      <!-- Menu Pemerintahan -->
      <div class="bg-white p-6 rounded-lg shadow-lg hover:bg-gray-50 transition duration-300">
          <h2 class="text-xl font-semibold text-gray-700 mb-4">Pemerintahan</h2>
          <ul class="list-disc pl-5 text-gray-600">
              <li><a href="{{ route('pemerintahan') }}" class="text-blue-500 hover:text-blue-700">Pemerintahan Desa</a></li>
              <li><a href="{{ route('admin.sotk') }}" class="text-blue-500 hover:text-blue-700">SOTK</a></li>
          </ul>
      </div>

      <!-- Menu Potensi Desa -->
      <div class="bg-white p-6 rounded-lg shadow-lg hover:bg-gray-50 transition duration-300">
          <h2 class="text-xl font-semibold text-gray-700 mb-4">Potensi Desa</h2>
          <p class="text-gray-600">Data dan informasi mengenai potensi dan sumber daya yang dimiliki desa.</p>
          <a href="{{ route('admin.potential.index') }}" class="mt-4 inline-block text-blue-500 hover:text-blue-700">Lihat Potensi Desa</a>
      </div>

      <!-- Menu Informasi -->
      <div class="bg-white p-6 rounded-lg shadow-lg hover:bg-gray-50 transition duration-300">
          <h2 class="text-xl font-semibold text-gray-700 mb-4">Informasi</h2>
          <ul class="list-disc pl-5 text-gray-600">
              <li><a href="{{ route('admin.news.index') }}" class="text-blue-500 hover:text-blue-700">Berita</a></li>
              <li><a href="{{ route('admin.announcement.index') }}" class="text-blue-500 hover:text-blue-700">Pengumuman</a></li>
              <li><a href="{{ route('admin.event.index') }}" class="text-blue-500 hover:text-blue-700">Events</a></li>
              <li><a href="{{ route('admin.gallery.index') }}" class="text-blue-500 hover:text-blue-700">Galeri</a></li>
              <li><a href="{{ route('admin.download.index') }}" class="text-blue-500 hover:text-blue-700">Downloads</a></li>
          </ul>
      </div>
  </div>
</div>
@endsection
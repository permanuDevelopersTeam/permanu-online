<div class="sticky top-0 py-1">
  <div class="my-5 px-3">
    <h3 class="font-bold uppercase">Selamat Datang Admin</h3>
  </div>
  <div class="flex flex-col bg-sky-600 mb-10">
    <a href="{{ route('admin.index') }}" class="w-full py-4 duration-200 border-b px-5 hover:bg-sky-700">
      Beranda
    </a>
    <a class="dropdown-toggle flex items-center justify-between px-5 border-b py-4 hover:bg-sky-700">
      <span>Profil Desa</span>
      <i class="bi bi-caret-down-fill"></i>
    </a>
    <ul class="dropdown-menu hidden ps-5">
      <li><a href="{{ route('visiMisi') }}" class="block px-6 py-3 bg-sky-600 duration-200 hover:bg-sky-700">Visi & Misi</a></li>
      <li><a href="{{ route('villageHistory') }}" class="block px-6 py-3 bg-sky-600 duration-200 hover:bg-sky-700">Sejarah Desa</a></li>
      <li><a href="{{ route('demografi') }}" class="block px-6 py-3 bg-sky-600 duration-200 hover:bg-sky-700">Demografi</a></li>
    </ul>
    <a class="dropdown-toggle flex items-center justify-between px-5 border-b py-4 hover:bg-sky-700">
      <span>Pemerintahan</span>
      <i class="bi bi-caret-down-fill"></i>
    </a>
    <ul class="dropdown-menu hidden ps-5">
      <li><a href="{{ route('pemerintahan') }}" class="block px-6 py-3 bg-sky-600 duration-200 hover:bg-sky-700 rounded">Pemerintahan Desa</a></li>
      <li><a href="{{ route('admin.sotk') }}" class="block px-6 py-3 bg-sky-600 duration-200 hover:bg-sky-700 rounded">SOTK</a></li>
    </ul>
    <a href="{{ route('admin.potential.index') }}" class="w-full py-4 duration-200 border-b px-5 hover:bg-sky-700">
      Potensi Desa
    </a>
    <a class="dropdown-toggle flex items-center justify-between px-5 border-b py-4 hover:bg-sky-700">
      <span>Informasi</span>
      <i class="bi bi-caret-down-fill"></i>
    </a>
    <ul class="dropdown-menu hidden ps-5">
      <li><a href="{{ route('admin.news.index') }}" class="block px-6 py-3 bg-sky-600 duration-200 hover:bg-sky-700 rounded">Berita</a></li>
      <li><a href="{{ route('admin.announcement.index') }}" class="block px-6 py-3 bg-sky-600 duration-200 hover:bg-sky-700 rounded">Pengumuman</a></li>
      <li><a href="{{ route('admin.event.index') }}" class="block px-6 py-3 bg-sky-600 duration-200 hover:bg-sky-700 rounded">Events</a></li>
      <li><a href="{{ route('admin.gallery.index') }}" class="block px-6 py-3 bg-sky-600 duration-200 hover:bg-sky-700 rounded">Galeri</a></li>
      <li><a href="{{ route('admin.services.index') }}" class="block px-6 py-3 bg-sky-600 duration-200 hover:bg-sky-700 rounded">Pelayanan</a></li>
      <li><a href="{{ route('admin.download.index') }}" class="block px-6 py-3 bg-sky-600 duration-200 hover:bg-sky-700 rounded">Downloads</a></li>
    </ul>
    <a href="{{ route('admin.account.index') }}" class="w-full py-4 duration-200 border-b px-5 hover:bg-sky-700">
      Akses Akun Admin
    </a>
    <form action="{{ route('logout') }}" method="post">
      @csrf
      <button class="w-full py-4 duration-200 border-b text-start px-5 hover:bg-sky-700">
        Logout
      </button>
    </form>
  </div>
</div>


<script>
  $(document).ready(function() {
    $(".dropdown-toggle").click(function() {
      var $dropdown = $(this).next(".dropdown-menu");
      $dropdown.slideToggle(200);
      $(this).find("svg").toggleClass("rotate-180");
    });
  });
</script>
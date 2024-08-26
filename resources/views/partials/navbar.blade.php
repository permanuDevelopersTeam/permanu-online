<!-- dekstop -->
<nav class="sticky top-0 w-full bg-white opacity-90 flex justify-between items-center lg:px-28 py-2 text-[12px] border border-b z-[9999]">
  <ul class="flex justify-center items-center lg:gap-5 gap-1 font-bold uppercase">
    <li class="relative">
      <a href="{{ route('home.index') }}" class="text-sky-600 uppercase px-2 py-2 rounded">Beranda</a>
    </li>
    <li class="relative">
      <a href="{{ route('profile.index') }}" class="text-sky-600 uppercase px-2 py-2 rounded">Profil Desa</a>
    </li>
    <li class="relative">
      <button id="pemerintahan" class="text-sky-600 uppercase lg:px-2 py-2 rounded-t">Pemerintahan <i class="bi bi-caret-down-fill"></i></button>
      <div class="pemerintahan-list hidden absolute w-[200px] pt-1 bg-sky-600 rounded-b">
        <ul class="flex flex-col">
          <li class="px-4 font-normal bg-white hover:bg-gray-200">
            <a href="{{ route('government') }}" class="block py-2 w-full h-full">Pemerintahan Desa</a>
          </li>
          <li class="py-2 px-4 font-normal bg-white hover:bg-gray-200">
            <a href="{{ route('sotk') }}" class="block py-2 w-full h-full">SOTK</a>
          </li>
        </ul>
      </div>
    </li>
    <li><a href="{{ route('potential.index') }}" class="text-sky-600 mx-4">Potensi Desa</a></li>
    <li class="relative">
      <button id="informasi" class="text-sky-600 uppercase lg:px-2 py-2 rounded-t">Informasi <i class="bi bi-caret-down-fill"></i></button>
      <div class="informasi-list hidden absolute right-0 w-[200px] pt-1 bg-sky-600 rounded-b">
        <ul class="flex flex-col">
          <li class="px-4 font-normal bg-white hover:bg-gray-200">
            <a href="{{ route('information.news') }}" class="block py-2 w-full h-full">Berita</a>
          </li>
          <li class="px-4 font-normal bg-white hover:bg-gray-200">
            <a href="{{ route('information.announcements') }}" class="block py-2 w-full">Pengumuman</a>
          </li>
          <li class="px-4 font-normal bg-white hover:bg-gray-200">
            <a href="{{ route('information.events') }}" class="block py-2 w-full">Event</a>
          </li>
          <li class="px-4 font-normal bg-white hover:bg-gray-200">
            <a href="{{ route('information.gallery') }}" class="block py-2 w-full">Galeri</a>
          </li>
          <li class="px-4 font-normal bg-white hover:bg-gray-200">
            <a href="{{ route('information.services') }}" class="block py-2 w-full">Pelayanan</a>
          </li>
          <li class="px-4 font-normal bg-white hover:bg-gray-200">
            <a href="{{ route('information.downloads') }}" class="block py-2 w-full">Download</a>
          </li>
        </ul>
      </div>
    </li>
  </ul>
  <div class="md:block hidden">
    <a href="{{ route('login') }}" class="text-xl text-gray-600">
      <i class="bi bi-gear-fill"></i>
    </a>
  </div>
</nav>

<script>
  $(document).ready(function() {

    $('#hamburger-menu').click(function() {
      alert('oke')
    })

    function hideAllLists() {
      $('.pemerintahan-list, .informasi-list').addClass('hidden');
      $('#pemerintahan, #informasi').removeClass('bg-sky-600 text-white'); // Remove active class
    }

    // Pemerintahan
    $('#pemerintahan').click(function(event) {
      hideAllLists();
      $('.pemerintahan-list').toggleClass('hidden');
      $(this).toggleClass('bg-sky-600 text-white');
      event.stopPropagation();
    });

    // Informasi
    $('#informasi').click(function(event) {
      hideAllLists();
      $('.informasi-list').toggleClass('hidden');
      $(this).toggleClass('bg-sky-600 text-white');
      event.stopPropagation();
    });

    $(document).click(function(event) {
      if (!$(event.target).closest('.pemerintahan-list, #profile-desa, #pemerintahan, .informasi-list, #informasi').length) {
        hideAllLists();
      }
    });

    $('.profile-list, .pemerintahan-list').click(function(event) {
      event.stopPropagation();
    });
  });
</script>
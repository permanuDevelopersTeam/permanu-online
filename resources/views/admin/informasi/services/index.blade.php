@extends('admin.partials.main')

@section('container')

<style>
  [x-cloak] {
    display: none;
  }

  .accordion-content {
    transition: all 0.3s ease;
  }
</style>
@if (session('success'))
<div class="alert bg-green-200 m-3 p-3 text-center text-green-600 capitalize">
  {{ session('success') }}
</div>
@endif
<div class="flex flex-col justify-center items-center p-5 mb-5">
  <h1 class="text-[40px] text-gray-400 monserrat font-bold">PELAYANAN ADMINISTRASI</h1>
</div>

<div class="container px-16 my-10">
  <div class="space-y-2">
    <!-- KTP -->
    <div class="border border-sky-300 rounded">
      <button class="w-full bg-sky-200 p-3 text-left focus:outline-none" data-target="#accordion-1">
        Syarat Pembuatan KTP
      </button>
      <div id="accordion-1" class="accordion-content overflow-hidden max-h-0 transition-all duration-300 ease-out">
        <form class="p-4" method="post" action="{{ route('admin.services.store') }}">
          @csrf
          <div class="mb-3">
            <input id="editor-1" type="hidden" name="pembuatan_ktp" value="{{ $services->pembuatan_ktp ?? '' }}">
            <trix-editor input="editor-1"></trix-editor>
          </div>
          <div class="text-end">
            <button type="submit" class="px-3 py-1 rounded-lg text-white bg-sky-600 duration-200 hover:bg-sky-700">Submit</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Akta Kelahiran -->
    <div class="border border-sky-300 rounded">
      <button class="w-full bg-sky-200 p-3 text-left focus:outline-none" data-target="#accordion-2">
        Pembuatan Akta Kelahiran
      </button>
      <div id="accordion-2" class="accordion-content overflow-hidden max-h-0 transition-all duration-300 ease-out">
        <form class="p-4" method="post" action="{{ route('admin.services.store') }}">
          @csrf
          <div class="mb-3">
            <input id="editor-2" type="hidden" name="pembuatan_akta_kelahiran" value="{{ $services->pembuatan_akta_kelahiran ?? '' }}">
            <trix-editor input="editor-2"></trix-editor>
          </div>
          <div class="text-end">
            <button type="submit" class="px-3 py-1 rounded-lg text-white bg-sky-600 duration-200 hover:bg-sky-700">Submit</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Akta Kematian -->
    <div class="border border-sky-300 rounded">
      <button class="w-full bg-sky-200 p-3 text-left focus:outline-none" data-target="#accordion-3">
        Pembuatan Akta Kematian
      </button>
      <div id="accordion-3" class="accordion-content overflow-hidden max-h-0 transition-all duration-300 ease-out">
        <form class="p-4" method="post" action="{{ route('admin.services.store') }}">
          @csrf
          <div class="mb-3">
            <input id="editor-3" type="hidden" name="pembuatan_akta_kematian" value="{{ $services->pembuatan_akta_kematian ?? '' }}">
            <trix-editor input="editor-3"></trix-editor>
          </div>
          <div class="text-end">
            <button type="submit" class="px-3 py-1 rounded-lg text-white bg-sky-600 duration-200 hover:bg-sky-700">Submit</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Surat Ket Usaha -->
    <div class="border border-sky-300 rounded">
      <button class="w-full bg-sky-200 p-3 text-left focus:outline-none" data-target="#accordion-4">
        Pembuatan Surat Keterangan Usaha
      </button>
      <div id="accordion-4" class="accordion-content overflow-hidden max-h-0 transition-all duration-300 ease-out">
        <form class="p-4" method="post" action="{{ route('admin.services.store') }}">
          @csrf
          <div class="mb-3">
            <input id="editor-4" type="hidden" name="pembuatan_surat_ket_usaha" value="{{ $services->pembuatan_surat_ket_usaha ?? '' }}">
            <trix-editor input="editor-4"></trix-editor>
          </div>
          <div class="text-end">
            <button type="submit" class="px-3 py-1 rounded-lg text-white bg-sky-600 duration-200 hover:bg-sky-700">Submit</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Surat Ket Nikah -->
    <div class="border border-sky-300 rounded">
      <button class="w-full bg-sky-200 p-3 text-left focus:outline-none" data-target="#accordion-5">
        Pembuatan Surat Keterangan Nikah
      </button>
      <div id="accordion-5" class="accordion-content overflow-hidden max-h-0 transition-all duration-300 ease-out">
        <form class="p-4" method="post" action="{{ route('admin.services.store') }}">
          @csrf
          <div class="mb-3">
            <input id="editor-5" type="hidden" name="pembuatan_surat_ket_nikah" value="{{ $services->pembuatan_surat_ket_nikah ?? '' }}">
            <trix-editor input="editor-5"></trix-editor>
          </div>
          <div class="text-end">
            <button type="submit" class="px-3 py-1 rounded-lg text-white bg-sky-600 duration-200 hover:bg-sky-700">Submit</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Surat Ket Tidak Mampu -->
    <div class="border border-sky-300 rounded">
      <button class="w-full bg-sky-200 p-3 text-left focus:outline-none" data-target="#accordion-6">
        Pembuatan Surat Keterangan Tidak Mampu
      </button>
      <div id="accordion-6" class="accordion-content overflow-hidden max-h-0 transition-all duration-300 ease-out">
        <form class="p-4" method="post" action="{{ route('admin.services.store') }}">
          @csrf
          <div class="mb-3">
            <input id="editor-6" type="hidden" name="pembuatan_surat_ket_tidak_mampu" value="{{ $services->pembuatan_surat_ket_tidak_mampu ?? '' }}">
            <trix-editor input="editor-6"></trix-editor>
          </div>
          <div class="text-end">
            <button type="submit" class="px-3 py-1 rounded-lg text-white bg-sky-600 duration-200 hover:bg-sky-700">Submit</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Surat Ahli Waris -->
    <div class="border border-sky-300 rounded">
      <button class="w-full bg-sky-200 p-3 text-left focus:outline-none" data-target="#accordion-7">
        Pembuatan Surat Alih Waris
      </button>
      <div id="accordion-7" class="accordion-content overflow-hidden max-h-0 transition-all duration-300 ease-out">
        <form class="p-4" method="post" action="{{ route('admin.services.store') }}">
          @csrf
          <div class="mb-3">
            <input id="editor-7" type="hidden" name="pembuatan_surat_alih_waris" value="{{ $services->pembuatan_surat_alih_waris ?? '' }}">
            <trix-editor input="editor-7"></trix-editor>
          </div>
          <div class="text-end">
            <button type="submit" class="px-3 py-1 rounded-lg text-white bg-sky-600 duration-200 hover:bg-sky-700">Submit</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Surat Ket Berpenghasilan -->
    <div class="border border-sky-300 rounded">
      <button class="w-full bg-sky-200 p-3 text-left focus:outline-none" data-target="#accordion-8">
        Pembuatan Surat Keterangan Penghasilan
      </button>
      <div id="accordion-8" class="accordion-content overflow-hidden max-h-0 transition-all duration-300 ease-out">
        <form class="p-4" method="post" action="{{ route('admin.services.store') }}">
          @csrf
          <div class="mb-3">
            <input id="editor-8" type="hidden" name="pembuatan_surat_keterangan_penghasilan" value="{{ $services->pembuatan_surat_keterangan_penghasilan ?? '' }}">
            <trix-editor input="editor-8"></trix-editor>
          </div>
          <div class="text-end">
            <button type="submit" class="px-3 py-1 rounded-lg text-white bg-sky-600 duration-200 hover:bg-sky-700">Submit</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Surat Pindah Penduduk -->
    <div class="border border-sky-300 rounded">
      <button class="w-full bg-sky-200 p-3 text-left focus:outline-none" data-target="#accordion-9">
        Pembuatan Surat Pindah Penduduk
      </button>
      <div id="accordion-9" class="accordion-content overflow-hidden max-h-0 transition-all duration-300 ease-out">
        <form class="p-4" method="post" action="{{ route('admin.services.store') }}">
          @csrf
          <div class="mb-3">
            <input id="editor-9" type="hidden" name="pembuatan_surat_kepindahan_penduduk" value="{{ $services->pembuatan_surat_kepindahan_penduduk ?? '' }}">
            <trix-editor input="editor-9"></trix-editor>
          </div>
          <div class="text-end">
            <button type="submit" class="px-3 py-1 rounded-lg text-white bg-sky-600 duration-200 hover:bg-sky-700">Submit</button>
          </div>
        </form>
      </div>
    </div>
    <!-- Surat Pindah Penduduk -->
    <div class="border border-sky-300 rounded">
      <button class="w-full bg-sky-200 p-3 text-left focus:outline-none" data-target="#accordion-10">
        Pembuatan Kartu Keluarga
      </button>
      <div id="accordion-10" class="accordion-content overflow-hidden max-h-0 transition-all duration-300 ease-out">
        <form class="p-4" method="post" action="{{ route('admin.services.store') }}">
          @csrf
          <div class="mb-3">
            <input id="editor-10" type="hidden" name="pembuatan_kartu_keluarga" value="{{ $services->pembuatan_kartu_keluarga ?? '' }}">
            <trix-editor input="editor-10"></trix-editor>
          </div>
          <div class="text-end">
            <button type="submit" class="px-3 py-1 rounded-lg text-white bg-sky-600 duration-200 hover:bg-sky-700">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function () {
  // Toggle accordion open/close
  $('[data-target]').on('click', function () {
    const target = $(this).data('target');
    const accordion = $(target);

    if (accordion.hasClass('max-h-0')) {
      const height = accordion[0].scrollHeight;
      accordion.removeClass('max-h-0').css('max-height', height + 'px');
    } else {
      accordion.addClass('max-h-0').css('max-height', '0px');
    }
  });

  $('trix-editor').on('trix-change', function () {
    const accordion = $(this).closest('.accordion-content');
    const height = accordion[0].scrollHeight;
    accordion.css('max-height', height + 'px');
  });
  setTimeout(() => {
      $('.alert').fadeOut('slow');
    }, 5000);
});

</script>
@endsection
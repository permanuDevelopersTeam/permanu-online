@extends('partials.main')

@section('container')

<div class="flex justify-center items-center p-5 bg-gray-100 mb-5">
  <h1 class="text-[60px] text-gray-400 monserrat font-bold">PELAYANAN</h1>
</div>
<div class="px-16">

  <!-- Alur Pelayanan -->
  <section class="py-10">
    <div class="container mx-auto">
      <h2 class="text-2xl font-semibold mb-4 uppercase">Alur Pelayanan</h2>
      <div class="flex justify-center py-8 rounded-lg" style="background-color: #b7d3e9">
        <div class="bg-gray-200 w-[60%] flex items-center justify-center">
          <img src="{{ asset('images/Buku Saku  Pelayanan Administrasi Desa_page-0028.jpg') }}" alt="Image" class="h-full w-full object-cover">
        </div>
      </div>
    </div>
  </section>

    <!-- Information Section -->
    <section class="py-10">
      <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <h3 class="font-semibold uppercase">Jam Operasional Pelayanan</h3>
            <div class="w-[100px] h-[4px] rounded-full bg-gray-600 my-3"></div>
            <p class="text-[14px] mb-2"><span class="font-semibold">Senin - Kamis : </span> 08.00 - 14.00 WIB</p>
            <p class="text-[14px] mb-2"><span class="font-semibold">Istirahat : </span> 12.00 - 12.30 WIB</p>
            <p class="text-[14px] mb-2"><span class="font-semibold">Jumat : </span> 08.00 - 11.30 WIB</p>
            <p class="text-[14px] mb-2"><span class="font-semibold">Sabtu & Minggu : </span> LIBUR</p>
          </div>
          <div>
            <h3 class="font-semibold uppercase">Biaya Pelayanan</h3>
            <div class="w-[100px] h-[4px] rounded-full bg-gray-600 my-3"></div>
            <p class="text-[14px]">Gratis/Tidak Dikenakan Biaya</p>
          </div>
        </div>
      </div>
    </section>

  <!-- Keterangan Layanan Accordion -->
  <section class="py-10">
    <div class="container mx-auto">
      <h2 class="text-xl font-semibold mb-6 uppercase">Keterangan Jenis-Jenis Pelayanan</h2>
      <div class="space-y-4">
        <!-- Accordion Items -->
        <div class="bg-white rounded-md mb-2 shadow-md border border-sky-200">
          <button class="w-full border text-left p-4 text-gray-800 font-semibold focus:outline-none"
            onclick="toggleAccordion(0)">
            Pembuatan Akta Kelahiran
          </button>
          <div class="p-4 hidden" id="content-0">
            <h3 class="font-semibold text-gray-800 mb-2">Dokumen-Dokumen Dan Juga Persyaratan Untuk Pembuatan Akta Kelahiran</h3>
            <div class="w-[100px] h-[4px] rounded-full bg-gray-600 my-3"></div>
            <p class="text-gray-600">
               {!! $services->pembuatan_akta_kelahiran ?? 'Tidak ada data untuk Pembuatan Akta Kelahiran.'  !!}
            </p>
          </div>
        </div>
        <div class="bg-white rounded-md mb-2 shadow-md border border-sky-200">
          <button class="w-full border text-left p-4 text-gray-800 font-semibold focus:outline-none"
            onclick="toggleAccordion(1)">
            Pembuatan Akta Kematian
          </button>
          <div class="p-4 hidden" id="content-1">
            <h3 class="font-semibold text-gray-800 mb-2">Dokumen-Dokumen Dan Juga Persyaratan Untuk Pembuatan Akta Kematian</h3>
            <div class="w-[100px] h-[4px] rounded-full bg-gray-600 my-3"></div>
            <p class="text-gray-600">
              {!! $services->pembuatan_akta_kematian ?? 'Tidak ada data untuk Pembuatan Akta Kematian.' !!}
            </p>
          </div>
        </div>
        <div class="bg-white rounded-md mb-2 shadow-md border border-sky-200">
          <button class="w-full border text-left p-4 text-gray-800 font-semibold focus:outline-none"
            onclick="toggleAccordion(2)">
            Pembuatan Surat Keterangan Tidak Mampu
          </button>
          <div class="p-4 hidden" id="content-2">
            <h3 class="font-semibold text-gray-800 mb-2">Dokumen-Dokumen Dan Juga Persyaratan Untuk Pembuatan Surat Keterangan Tidak Mampu</h3>
            <div class="w-[100px] h-[4px] rounded-full bg-gray-600 my-3"></div>
            <p class="text-gray-600">
             {!! $services->pembuatan_surat_ket_tidak_mampu ?? 'Tidak ada data untuk Pembuatan Surat Keterangan Tidak Mampu.' !!}
            </p>
          </div>
        </div>
        <div class="bg-white rounded-md mb-2 shadow-md border border-sky-200">
          <button class="w-full border text-left p-4 text-gray-800 font-semibold focus:outline-none"
            onclick="toggleAccordion(3)">
            Pembuatan Surat Keterangan Nikah
          </button>
          <div class="p-4 hidden" id="content-3">
            <h3 class="font-semibold text-gray-800 mb-2">Dokumen-Dokumen Dan Juga Persyaratan Untuk Pembuatan Surat Keterangan Nikah</h3>
            <div class="w-[100px] h-[4px] rounded-full bg-gray-600 my-3"></div>
            <p class="text-gray-600">
              {!! $services->pembuatan_surat_ket_nikah ?? 'Tidak ada data untuk Pembuatan Surat Keterangan Nikah.' !!}
            </p>
          </div>
        </div>
        <div class="bg-white rounded-md mb-2 shadow-md border border-sky-200">
          <button class="w-full border text-left p-4 text-gray-800 font-semibold focus:outline-none"
            onclick="toggleAccordion(4)">
            Pembuatan Surat Ahli Waris
          </button>
          <div class="p-4 hidden" id="content-4">
            <h3 class="font-semibold text-gray-800 mb-2">Dokumen-Dokumen Dan Juga Persyaratan Untuk Pembuatan Surat Ahli Waris</h3>
            <div class="w-[100px] h-[4px] rounded-full bg-gray-600 my-3"></div>
            <p class="text-gray-600">
              {!! $services->pembuatan_surat_alih_waris ?? 'Tidak ada data untuk Pembuatan Surat Ahli Waris.' !!}
            </p>
          </div>
        </div>
        <div class="bg-white rounded-md mb-2 shadow-md border border-sky-200">
          <button class="w-full border text-left p-4 text-gray-800 font-semibold focus:outline-none"
            onclick="toggleAccordion(5)">
            Pembuatan Surat Izin Usaha
          </button>
          <div class="p-4 hidden" id="content-5">
            <h3 class="font-semibold text-gray-800 mb-2">Dokumen-Dokumen Dan Juga Persyaratan Untuk Pembuatan Surat Izin Usaha</h3>
            <div class="w-[100px] h-[4px] rounded-full bg-gray-600 my-3"></div>
            <p class="text-gray-600">
              {!! $services->pembuatan_surat_ket_usaha ?? 'Tidak ada data untuk Pembuatan Surat Izin Usaha.' !!}
            </p>
          </div>
        </div>
        <div class="bg-white rounded-md mb-2 shadow-md border border-sky-200">
          <button class="w-full border text-left p-4 text-gray-800 font-semibold focus:outline-none"
            onclick="toggleAccordion(6)">
            Pembuatan Surat Keterangan Penghasilan
          </button>
          <div class="p-4 hidden" id="content-6">
            <h3 class="font-semibold text-gray-800 mb-2">Dokumen-Dokumen Dan Juga Persyaratan Untuk Pembuatan Surat Keterangan Penghasilan</h3>
            <div class="w-[100px] h-[4px] rounded-full bg-gray-600 my-3"></div>
            <p class="text-gray-600">
              {!! $services->pembuatan_surat_keterangan_penghasilan ?? 'Tidak ada data untuk Pembuatan Surat Keterangan Penghasilan.' !!}
            </p>
          </div>
        </div>
        <div class="bg-white rounded-md mb-2 shadow-md border border-sky-200">
          <button class="w-full border text-left p-4 text-gray-800 font-semibold focus:outline-none"
            onclick="toggleAccordion(7)">
            Pembuatan Kartu Tanda Penduduk
          </button>
          <div class="p-4 hidden" id="content-7">
            <h3 class="font-semibold text-gray-800 mb-2">Dokumen-Dokumen Dan Juga Persyaratan Untuk Pembuatan Kartu Tanda Penduduk</h3>
            <div class="w-[100px] h-[4px] rounded-full bg-gray-600 my-3"></div>
            <p class="text-gray-600">
              {!! $services->pembuatan_ktp ?? 'Tidak ada data untuk Pembuatan Kartu Tanda Penduduk.' !!}
            </p>
          </div>
        </div>
        <div class="bg-white rounded-md mb-2 shadow-md border border-sky-200">
          <button class="w-full border text-left p-4 text-gray-800 font-semibold focus:outline-none"
            onclick="toggleAccordion(8)">
            Pembuatan Surat Kepindahan Penduduk
          </button>
          <div class="p-4 hidden" id="content-8">
            <h3 class="font-semibold text-gray-800 mb-2">Dokumen-Dokumen Dan Juga Persyaratan Untuk Pembuatan Surat Kepindahan Penduduk</h3>
            <div class="w-[100px] h-[4px] rounded-full bg-gray-600 my-3"></div>
            <p class="text-gray-600">
              {!! $services->pembuatan_surat_kepindahan_penduduk ?? 'Tidak ada data untuk Pembuatan Surat Kepindahan Penduduk.' !!}
            </p>
          </div>
        </div>
        <div class="bg-white rounded-md mb-2 shadow-md border border-sky-200">
          <button class="w-full border text-left p-4 text-gray-800 font-semibold focus:outline-none"
            onclick="toggleAccordion(9)">
            Pembuatan Kartu Keluarga
          </button>
          <div class="p-4 hidden" id="content-9">
            <h3 class="font-semibold text-gray-800 mb-2">Dokumen-Dokumen Dan Juga Persyaratan Untuk Pembuatan Kartu Keluarga</h3>
            <div class="w-[100px] h-[4px] rounded-full bg-gray-600 my-3"></div>
            <p class="text-gray-600">
              {!! $services->pembuatan_kartu_keluarga ?? 'Tidak ada data untuk Pembuatan Kartu Keluarga.' !!}
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>

<script>
  function toggleAccordion(index) {
    const content = document.getElementById(`content-${index}`);
    if (content.classList.contains('hidden')) {
      content.classList.remove('hidden');
    } else {
      content.classList.add('hidden');
    }
  }
</script>

@endsection
@extends('partials.main')

@section('container')
<div class="flex flex-col">
  <!-- about permanu -->
  <section>
    <div class="bg-gray-100 p-5 flex items-center justify-center text-center h-[200px]">
      <h1 class="text-[60px] font-bold monserrat text-gray-400 uppercase">Profil Desa</h1>
    </div>
    <div class="flex items-center flex-col-reverse md:flex-row gap-14 py-5 px-10">
      <div class="flex-1 text-[14px]">
        <h3 class="text-lg font-semibold mb-2">Tentang Kami</h3>
        <p class="text-gray-400 mb-2">Desa Permanu</p>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto inventore quis suscipit atque tenetur! Id magni sit non rem, similique tenetur at commodi pariatur eligendi quod error necessitatibus aspernatur provident fuga obcaecati mollitia reiciendis sunt iusto. Ea laboriosam cum odit illo? Explicabo dignissimos, quis saepe recusandae at tenetur doloremque accusamus ipsum, id, pariatur fugit mollitia quo? Officiis aliquam ratione ad temporibus laborum similique ea beatae reprehenderit, voluptatibus ab quos error sit architecto nobis ut necessitatibus omnis qui corrupti harum sint? Est delectus esse nesciunt consequuntur unde labore animi dolorem ex saepe ratione vitae sapiente quo ullam a praesentium.</p>
      </div>
      <div class="flex-1">
        <div class="w-full h-[350px] overflow-hidden p-5">
          <img src="{{ asset('images/jumbotron.jpg') }}" alt="image-profile" class="w-full h-full object-cover">
        </div>
      </div>
    </div>
  </section>

  <!-- visi & misi -->
  <section class="p-10 flex justify-center bg-gray-100">
    <div class="w-[75%] px-10">
      <div class="mb-5 text-center">
        <h3 class="text-3xl font-semibold mb-2">VISI</h3>
        @if ($visiMisi)
        <p class="text-[14px]">{!! $visiMisi->visi !!}</p>
        @else
        <p class="text-[14px]">"Lorem ipsum dolor, sit amet consectetur adipisicing elit. Animi, reprehenderit ut ducimus voluptates velit quibusdam accusamus modi porro corporis voluptate? Officiis, illum! Facere repudiandae unde amet."</p>
        @endif
      </div>
      <div class="">
        <h3 class="text-3xl font-semibold mb-2 text-center">MISI</h3>
        @if ($visiMisi)
        <p class="text-[14px]">{!! $visiMisi->misi !!}</p>
        @else
        <p class="text-[14px]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate minus quod magni cumque odio modi quis enim, aut impedit nihil explicabo ea maxime nobis rem blanditiis molestias sequi labore, sunt officiis tempora eos! Voluptates atque nostrum aliquam vitae quasi labore alias cupiditate amet numquam? Ex obcaecati quas soluta distinctio consectetur dolore ducimus quae odit rerum harum doloremque perferendis dicta, possimus id quasi odio. Corporis maxime, earum harum sapiente magnam incidunt facilis voluptas expedita aliquid? Iste soluta, aliquid sequi est nostrum repudiandae aspernatur aperiam, voluptatem libero, natus hic? Harum, deleniti tempore inventore nemo culpa explicabo veritatis architecto libero sit, repellendus magnam.</p>
        @endif
      </div>
    </div>
  </section>

  <!-- permanu history -->
  <section>
    <div class="flex items-center flex-col md:flex-row gap-14 py-5 px-10">
      <div class="flex-1">
        <div class="w-full h-[350px] overflow-hidden p-5">
          @if ($villageHistory)
          <img src="{{ asset('storage/' . $villageHistory->image) }}" alt="image-profile" class="w-full h-full object-cover">
          @else
          <img src="{{ asset('images/jumbotron.jpg') }}" alt="image-profile" class="w-full h-full object-cover">
          @endif
        </div>
      </div>
      <div class="flex-1 text-[14px]">
        <h3 class="text-lg font-semibold mb-2">Sejarah Desa</h3>
        <p class="text-gray-400 mb-2">Desa Permanu</p>
        @if ($villageHistory)
        <p class="mb-2">{!! $villageHistory->excerpt !!}</p>
        <div class="text-end my-5">
          <a href="{{ route('profile.sejarah') }}" class="border border-sky-600 rounded-xl py-2 px-2 text-xs duration-200 hover:bg-sky-600 hover:text-white">Baca Selengkapnya <i class="bi bi-arrow-right-short"></i></a>
        </div>
        @else
        <p class="mb-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto inventore quis suscipit atque tenetur! Id magni sit non rem, similique tenetur at commodi pariatur eligendi quod error necessitatibus aspernatur provident fuga obcaecati mollitia reiciendis sunt iusto. Ea laboriosam cum odit illo? Explicabo dignissimos, quis saepe recusandae at tenetur doloremque accusamus ipsum, id, pariatur fugit mollitia quo? Officiis aliquam ratione ad temporibus laborum similique ea beatae reprehenderit, voluptatibus ab quos error sit architecto nobis ut necessitatibus omnis qui corrupti harum sint? Est delectus esse nesciunt consequuntur unde labore animi dolorem ex saepe ratione vitae sapiente quo ullam a praesentium.</p>
        @endif
      </div>
    </div>
  </section>

  <!-- geografi -->
  <section class="text-[14px] my-10">
    <div class="flex justify-center bg-gray-100 p-8">
      <div class="text-[60px] text-gray-400 monserrat">
        GEOGRAFI
      </div>
    </div>
    <div class="w-full h-[400px] shadow overflow-hidden mb-8">
      <img src="{{ asset('images/blank-img.png') }}" alt="geografi-image.jpg" class="w-full h-full object-cover">
    </div>
    <div class="flex gap-8 flex-col md:flex-row mb-5 px-10">
      <div class="mb-5 flex-1">
        <h1 class="text-3xl mb-2">GEOGRAFIS DESA PERMANU</h1>
        <p class="capitalize mb-5">Detail lokasi dari desa permanu yang berada di kecamatan pakisaji kabupaten malang provinsi jawa timur yaitu;</p>
        <ul class="capitalize flex flex-col gap-3">
          <li>Koordinat : - </li>
          <li>Luas Wilayah : 45,7516 km²</li>
          <li>Topografi : - </li>
          <li>Ketinggian : -</li>
          <li>Jarak dari ibukota provinsi ke desa permanu adalah: 115km</li>
          <li>Jarak dari kabupaten Malang ke desa permanu adalah: 46,5km</li>
          <li>Jarak dari kota Malang ke desa permanu adalah: 18,4km</li>
        </ul>
      </div>
      <div class="mb-5 flex-1">
        <h1 class="text-3xl mb-2">BATAS DESA</h1>
        <p class="capitalize mb-5">Batas wilayah desa permanu.</p>
        <ul class="flex flex-col gap-3">
          <li>Batas Sebelah Utara : Desa Babadan, Desa Jatisari</li>
          <li>Batas Sebelah Selatan : Desa Kranggan</li>
          <li>Batas Sebelah Barat : Desa Kesamben</li>
          <li>Batas Sebelah Timur : Desa Karangpandan</li>
        </ul>
      </div>
    </div>
    <div class=" flex justify-center">
      <div class="w-[85%]">
        <h3 class="uppercase font-bold my-3">Orbitasi, waktu tempuh dan jarak</h3>
        <table class="w-full border">
          <thead class="border bg-gray-200">
            <tr>
              <th class="text-start p-3 border">NO</th>
              <th class="text-start p-3 border">ORBITASI DAN JARAK TEMPUH</th>
              <th class="text-start p-3 border">JARAK / WAKTU</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border">
              <th class="text-start p-3 border">1</th>
              <td class="p-3 border">Jarak Ke Ibu Kota Kecamatan</td>
              <td class="p-3 border">6,1 KM</td>
            </tr>
            <tr class="border  bg-gray-100">
              <th class="text-start p-3 border">2</th>
              <td class="p-3 border">Jarak Ke Ibu Kota Kabupaten</td>
              <td class="p-3 border">46,5 KM</td>
            </tr>
            <tr class="border">
              <th class="text-start p-3 border">3</th>
              <td class="p-3 border">Jarak Ke Ibu Kota Provinsi</td>
              <td class="p-3 border">115 KM</td>
            </tr>
            <tr class="border  bg-gray-100">
              <th class="text-start p-3 border">4</th>
              <td class="p-3 border">waktu tempuh Ke Ibu Kota Kecamatan</td>
              <td class="p-3 border">12 menit</td>
            </tr>
            <tr class="border">
              <th class="text-start p-3 border">5</th>
              <td class="p-3 border">waktu tempuh Ke Ibu Kota Kabupaten</td>
              <td class="p-3 border">1 jam 25 menit</td>
            </tr>
            <tr class="border bg-gray-100">
              <th class="text-start p-3 border">6</th>
              <td class="p-3 border">waktu tempuh Ke Ibu Kota Provinsi</td>
              <td class="p-3 border">2 jam 13 menit</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <section class="text-[14px] my-10">
    <div class="flex justify-center bg-gray-100 p-8">
      <div class="text-[60px] text-gray-400 monserrat">
        DEMOGRAFI
      </div>
    </div>
    <div class="w-full h-[400px] shadow overflow-hidden mb-8">
      <img src="{{ asset('images/blank-img.png') }}" alt="geografi-image.jpg" class="w-full h-full object-cover">
    </div>

    <div class="px-10">
      <h1 class="text-3xl mb-2">DEMOGRAFI DESA PERMANU</h1>
      <p class="mb-2"> Desa Permanu terletak di Kecamatan Pakisaji, Kabupaten Malang, Provinsi Jawa Timur. Desa ini terdiri dari empat dusun, yaitu Dusun Krajan Permanu, Dusun Lowok, Dusun Tunggul, dan Dusun Blau.
        Desa Permanu diapit oleh dua sungai, yaitu Sungai Mbabar dan Sungai Gesang. Infrastruktur jalan di desa ini sudah beraspal. Penduduk Desa Permanu memanfaatkan air bersih dari PDAM dan sumber air swadaya untuk keperluan memasak dan minum.</p>
      <h3 class="uppercase font-bold my-3">Berikut adalah data jumlah penduduk berdasarkan usia</h3>
      <table class="w-full border">
        <thead class="border bg-gray-200">
          <tr>
            <th class="text-start p-3 border">NO</th>
            <th class="text-start p-3 border">GOLONGAN USIA</th>
            <th class="text-start p-3 border">JUMLAH PENDUDUK</th>
          </tr>
        </thead>
        @if ($demografi)
        <tbody>
          <tr class="border">
            <th class="text-start p-3 border">1</th>
            <td class="p-3 border">0 - 12 Bulan</td>
            <td class="p-3 border">{{ $demografi->j0_12b }}</td>
          </tr>
          <tr class="border  bg-gray-100">
            <th class="text-start p-3 border">2</th>
            <td class="p-3 border">1 - 5 Tahun</td>
            <td class="p-3 border">{{ $demografi->j1_5t }}</td>
          </tr>
          <tr class="border">
            <th class="text-start p-3 border">3</th>
            <td class="p-3 border">6 - 14 Tahun</td>
            <td class="p-3 border">{{ $demografi->j6_14t }}</td>
          </tr>
          <tr class="border  bg-gray-100">
            <th class="text-start p-3 border">4</th>
            <td class="p-3 border">15 - 25 Tahun</td>
            <td class="p-3 border">{{ $demografi->j15_25t }}</td>
          </tr>
          <tr class="border">
            <th class="text-start p-3 border">5</th>
            <td class="p-3 border">26 - 55</td>
            <td class="p-3 border">{{ $demografi->j26_55t }}</td>
          </tr>
          <tr class="border bg-gray-100">
            <th class="text-start p-3 border">6</th>
            <td class="p-3 border">> 55 Tahun</td>
            <td class="p-3 border">{{ $demografi->jp55t }}</td>
          </tr>
          <tr class="border bg-gray-100 font-bold">
            <th class="text-start p-3 border">7</th>
            <td class="p-3 border">TOTAL</td>
            <td class="p-3 border">{{ $demografi->total }}</td>
          </tr>
        </tbody>
        @else
        <tbody>
          <tr class="border">
            <th class="text-start p-3 border">1</th>
            <td class="p-3 border">0 - 12 Bulan</td>
            <td class="p-3 border">-</td>
          </tr>
          <tr class="border  bg-gray-100">
            <th class="text-start p-3 border">2</th>
            <td class="p-3 border">1 - 5 Tahun</td>
            <td class="p-3 border">-</td>
          </tr>
          <tr class="border">
            <th class="text-start p-3 border">3</th>
            <td class="p-3 border">6 - 14 Tahun</td>
            <td class="p-3 border">-</td>
          </tr>
          <tr class="border  bg-gray-100">
            <th class="text-start p-3 border">4</th>
            <td class="p-3 border">15 - 25 Tahun</td>
            <td class="p-3 border">-</td>
          </tr>
          <tr class="border">
            <th class="text-start p-3 border">5</th>
            <td class="p-3 border">26 - 55</td>
            <td class="p-3 border">-</td>
          </tr>
          <tr class="border bg-gray-100">
            <th class="text-start p-3 border">6</th>
            <td class="p-3 border">> 55 Tahun</td>
            <td class="p-3 border">-</td>
          </tr>
        </tbody>

        @endif
      </table>
    </div>
  </section>
</div>
@endsection
@extends('admin.partials.main')

@section('container')

@if (session('success'))
<div class="alert bg-green-200 m-3 p-3 text-center text-green-600 capitalize">
  {{ session('success') }}
</div>
@endif
<div class="flex justify-center items-center p-5 mb-5">
  <h1 class="text-[40px] text-gray-400 monserrat font-bold">DEMOGRAFI</h1>
</div>
<div class="px-16 my-10 text-[14px]">
  @if ($totalPopulation)
  <form action="{{ route('demografi.update') }}" method="post" class="w-full">
    @method('put')
    @else
    <form action="{{ route('demografi.store') }}" method="post" class="w-full">
      @endif
      @csrf
      <table class="w-full">
        <thead>
          <tr class="border bg-gray-300">
            <th class="text-center p-3 border">NO</th>
            <th class="text-center p-3 border">JENIS USIA</th>
            <th class="text-center p-3 border">JUMLAH PENDUDUK</th>
          </tr>
        </thead>
        <tbody>
          @if ($totalPopulation)
          <tr class="border">
            <th class="text-center border p-3">1</th>
            <td class="text-center border p-3">0 - 12 Bulan</td>
            <td class="text-center border p-3">
              <input type="number" name="j0_12b" id="j0_12b" class="rounded-lg outline-0 border border-black p-1" value="{{ old('j0_12b', $totalPopulation->j0_12b) }}">
            </td>
          </tr>
          <tr class="border bg-gray-100">
            <th class="text-center border p-3">2</th>
            <td class="text-center border p-3">1 - 5 Tahun</td>
            <td class="text-center border p-3">
              <input type="number" name="j1_5t" id="j1_5t" class="rounded-lg outline-0 border border-black p-1" value="{{ old('j1_5t', $totalPopulation->j1_5t) }}">
            </td>
          </tr>
          <tr class="border">
            <th class="text-center border p-3">3</th>
            <td class="text-center border p-3">6 - 14 Tahun</td>
            <td class="text-center border p-3">
              <input type="number" name="j6_14t" id="j6_14t" class="rounded-lg outline-0 border border-black p-1" value="{{ old('j6_14t', $totalPopulation->j6_14t) }}">
            </td>
          </tr>
          <tr class="border bg-gray-100">
            <th class="text-center border p-3">4</th>
            <td class="text-center border p-3">15 - 25 Tahun</td>
            <td class="text-center border p-3">
              <input type="number" name="j15_25t" id="j15_25t" class="rounded-lg outline-0 border border-black p-1" value="{{ old('j15_25t', $totalPopulation->j15_25t) }}">
            </td>
          </tr>
          <tr class="border">
            <th class="text-center border p-3">5</th>
            <td class="text-center border p-3">26 - 55 Tahun</td>
            <td class="text-center border p-3">
              <input type="number" name="j26_55t" id="j26_55t" class="rounded-lg outline-0 border border-black p-1" value="{{ old('j26_55t', $totalPopulation->j26_55t) }}">
            </td>
          </tr>
          <tr class="border bg-gray-100">
            <th class="text-center border p-3">6</th>
            <td class="text-center border p-3"> >55 Tahun</td>
            <td class="text-center border p-3">
              <input type="number" name="jp55t" id="jp55t" class="rounded-lg outline-0 border border-black p-1" value="{{ old('jp55t', $totalPopulation->jp55t) }}">
            </td>
          </tr>
          <tr class="border bg-gray-100 font-bold">
            <th class="text-center border p-3">7</th>
            <td class="text-center border p-3">Total Penduduk</td>
            <td class="text-center border p-3">
              {{ $totalPopulation->total }}
            </td>
          </tr>
          @else
          <tr class="border">
            <th class="text-center border p-3">1</th>
            <td class="text-center border p-3">0 - 12 Bulan</td>
            <td class="text-center border p-3">
              <input type="number" name="j0_12b" id="j0_12b" class="rounded-lg outline-0 border border-black p-1" value="{{ old('j0_12b') }}">
            </td>
          </tr>
          <tr class="border bg-gray-100">
            <th class="text-center border p-3">2</th>
            <td class="text-center border p-3">1 - 5 Tahun</td>
            <td class="text-center border p-3">
              <input type="number" name="j1_5t" id="j1_5t" class="rounded-lg outline-0 border border-black p-1" value="{{ old('j1_5t') }}">
            </td>
          </tr>
          <tr class="border">
            <th class="text-center border p-3">3</th>
            <td class="text-center border p-3">6 - 14 Tahun</td>
            <td class="text-center border p-3">
              <input type="number" name="j6_14t" id="j6_14t" class="rounded-lg outline-0 border border-black p-1" value="{{ old('j6_14t') }}">
            </td>
          </tr>
          <tr class="border bg-gray-100">
            <th class="text-center border p-3">4</th>
            <td class="text-center border p-3">15 - 25 Tahun</td>
            <td class="text-center border p-3">
              <input type="number" name="j15_25t" id="j15_25t" class="rounded-lg outline-0 border border-black p-1" value="{{ old('j15_25t') }}">
            </td>
          </tr>
          <tr class="border">
            <th class="text-center border p-3">5</th>
            <td class="text-center border p-3">26 - 55 Tahun</td>
            <td class="text-center border p-3">
              <input type="number" name="j26_55t" id="j26_55t" class="rounded-lg outline-0 border border-black p-1" value="{{ old('j26_55t') }}">
            </td>
          </tr>
          <tr class="border bg-gray-100">
            <th class="text-center border p-3">6</th>
            <td class="text-center border p-3"> >55 Tahun</td>
            <td class="text-center border p-3">
              <input type="number" name="jp55t" id="jp55t" class="rounded-lg outline-0 border border-black p-1" value="{{ old('jp55t') }}">
            </td>
          </tr>
          <tr class="border bg-gray-100 font-bold">
            <th class="text-center border p-3">7</th>
            <td class="text-center border p-3">Total Penduduk</td>
            <td class="text-center border p-3">
              -
            </td>
          </tr>

          @endif
        </tbody>
      </table>
      <div class="text-end my-5">
        <button type="submit" class="px-4 py-1 rounded border border-sky-600 text-sky-600 duration-200 hover:bg-sky-600 hover:text-white">Submit</button>
      </div>
    </form>
</div>

<script>
  $(document).ready(function() {
    setTimeout(() => {
      $('.alert').fadeOut('slow');
    }, 5000);
  });
</script>
@endsection
@extends('partials.main')

@section('container')
<div>
  <div class="flex justify-center items-center p-5 bg-gray-100 mb-5">
    <h1 class="text-[60px] text-gray-400 monserrat font-bold">BERITA</h1>
  </div>
  @if ($news->count())
  <div class="flex justify-start flex-wrap gap-4 px-8">
    @foreach ($news as $item)
    <a href="{{ route('information.detail.news', $item->uuid) }}" class="w-[15rem] h-[230px]">
      <div class="border overflow-hidden rounded-lg w-full h-full ">
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
    <div class="text-end">
      <div class="mt-4">
        {{ $news->links() }}
      </div>
    </div>
  </div>
  @else
  <div class="text-center text-xl text-gray-500">
    <p>Belum Ada Data Yang Bisa Ditampilkan</p>
  </div>
  @endif

</div>
@endsection
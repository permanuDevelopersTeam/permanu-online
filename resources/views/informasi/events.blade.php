@extends('partials.main')

@section('container')
<div>
  <div class="flex justify-center items-center p-5 bg-gray-100 mb-5">
    <h1 class="text-[60px] text-gray-400 monserrat font-bold">EVENTS</h1>
  </div>
  @if ($events->count())
  <div class="flex justify-start flex-wrap gap-4 px-16">
    @foreach ($events as $item)
    <a href="{{ route('information.detail.event', $item->uuid) }}" class="w-[15rem] h-[230px]">
      <div class="border w-full h-full rounded-lg overflow-hidden">
        <div class="w-full h-full relative">
          <img src="{{ asset('storage/' . $item->image1) }}" alt="images.jpg" class="w-full h-full object-cover">
          <div class="p-3 absolute inset-0 flex flex-col justify-between bg-sky-900 bg-opacity-30">
            <div class="flex justify-start gap-2 text-lg">
              <div class="w-[40px] h-[40px] rounded bg-sky-600 text-white font-semibold flex justify-center items-center bg-opacity-70">
                <p>{{ \Carbon\Carbon::parse($item->start_event)->format('d') }}</p>
              </div>
            </div>
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
        {{ $events->links() }}
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
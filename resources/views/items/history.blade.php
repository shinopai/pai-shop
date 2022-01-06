@extends('layouts.app')

@section('content')
<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <h1 class="ml-36 mb-10">{{ Auth::user()->name }}&nbsp;さんの購入履歴</h1>
    @foreach($items as $key => $item)
    <div class="flex items-center lg:w-3/5 mx-auto border-b pb-10 mb-10 border-gray-200 sm:flex-row flex-col">
      <div class="sm:w-32 sm:h-32 h-20 w-20 sm:mr-10 inline-flex items-center justify-center">
        <img src="{{ asset('images/'. $item->item_image) }}" alt="{{ $item->item_name }}">
      </div>
      <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
        <h2 class="text-gray-900 text-lg title-font font-medium mb-2">{{ $item->item_name }}</h2>
        <span class="leading-relaxed text-base">{{ $item->created_at->format('Y年m月d日') }}に購入</span><br>
        <span class="leading-relaxed text-base">￥{{ number_format($item->price) }} &times; {{ $item->orders[0]->orders }}個</span><br>
        <span class="leading-relaxed text-base">合計:&nbsp;{{ number_format($item->orders[0]->sum_total) }}円<br>
        <a href="{{ route('items.show', $item->id) }}" class="mt-3 text-indigo-500 inline-flex items-center">商品詳細を見る
        </a>
      </div>
    </div>
    @endforeach
    <button class="flex mx-auto mt-20 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"><a href="{{ route('items.index') }}">トップに戻る</a></button>
  </div>
</section>
@endsection

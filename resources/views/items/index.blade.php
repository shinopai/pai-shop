@extends('layouts.app')

@section('content')
    <main class="my-8">
        <div class="container mx-auto px-6">
            @auth
            <span class="material-icons mb-5">
                shopping_cart
            </span>
            @if ($cart_orders > 0)
            <a href="{{ url('/carts') }}" class="text-indigo-500 hover:underline">
                    現在、{{ $cart_orders }}件のオーダーがあります。
            </a>
            @else
            <span>まだカートの中身はありません。</span>
            @endif
            @endauth
            <h3 class="text-gray-700 text-2xl font-medium">All</h3>
            <span class="mt-3 text-sm text-gray-500">100+ Items</span>
            <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 mt-6">
              @foreach($items as $item)
              <a href="{{ route('items.show', ['item' => $item->id]) }}">
                <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                    <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('images/{{ $item->item_image }}')">

                    </div>
                    <div class="px-5 py-3">
                        <h3 class="text-gray-700 uppercase">{{ $item->item_name }}</h3>
                        <span class="text-gray-500 mt-2">{{ $item->category->category_name }}</span><br>
                        <span class="text-gray-500 mt-2">￥{{ number_format($item->price) }}</span>
                    </div>
                </div>
            </a>
                @endforeach
            </div>
            {{ $items->links('vendor.pagination.default') }}
        </div>
    </main>
@endsection

@extends('layouts.app')

@section('content')
@if (session('flash'))
    <p class="bg-green-300 text-white p-2 text-center">{{ session('flash') }}</p>
@endif
      <div class="w-screen max-w-md mx-auto">
        <div class="my-10 h-full flex flex-col bg-white shadow-xl overflow-y-scroll">
          <div class="flex-1 py-6 overflow-y-auto px-4 sm:px-6">
            <div class="flex items-start justify-between">
              <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">
                Your cart
              </h2>
              <div class="ml-3 h-7 flex items-center">
                <button type="button" class="-m-2 p-2 text-gray-400 hover:text-gray-500">
                  <span class="sr-only">Close panel</span>
                  <!-- Heroicon name: outline/x -->
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </div>
            </div>

            <div class="mt-8">
              <div class="flow-root">
                <ul role="list" class="-my-6 divide-y divide-gray-200">
                  @forelse($cart_items as $item)
                  <li class="py-6 flex">
                    <div class="flex-shrink-0 w-24 h-24 border border-gray-200 rounded-md overflow-hidden">
                      <img src="{{ asset('images/'.$item->item->item_image) }}" alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt." class="w-full h-full object-center object-cover">
                    </div>

                    <div class="ml-4 flex-1 flex flex-col">
                      <div>
                        <div class="flex justify-between text-base font-medium text-gray-900">
                          <h3>
                            <a href="{{ route('items.show', ['item' => $item->item->id]) }}">
                              {{ $item->item->item_name }}
                            </a>
                          </h3>
                          <p class="ml-4">
                            ￥{{ number_format($item->item->price * $item->orders) }}
                          </p>
                        </div>
                        <p class="mt-1 text-sm text-gray-500">
                          {{ $item->orders }} orders
                        </p>
                      </div>
                      <div class="flex-1 flex items-end justify-end text-sm">
                        <div class="flex">
                          <form action="{{ route('items.removeitem', ['item' => $item->item_id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                            <input type="hidden" name="orders" value="{{ $item->orders }}">
                            <button type="submit" class="font-medium text-indigo-600 hover:text-indigo-500" onclick="return confirm('Are you sure?');">Remove</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </li>
                  @empty
                  <p>まだカートに商品はありません</p>
                  @endforelse
                </ul>
              </div>
            </div>
          </div>
          @if($cart_items->isEmpty())
          <button type="button" class="text-indigo-600 font-medium hover:text-indigo-500 py-5"><a href="{{ route('items.index') }}" class="hover:underline">Continue Shopping</a><span aria-hidden="true"> &rarr;</span></button>
          @else
          <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
            <div class="flex justify-between text-base font-medium text-gray-900">
              <p>Total</p>
              <p>￥{{ number_format($sum_total) }}</p>
            </div>
            <div class="mt-6">
              <form action="{{ route('orders.buyitem') }}" method="post">
                @csrf
                @foreach ($cart_items as $item)
                <input type="hidden" name="user_ids[]" value="{{ $item->user_id }}">
                <input type="hidden" name="item_ids[]" value="{{ $item->item_id }}">
                <input type="hidden" name="orders[]" value="{{ $item->orders }}">
                <input type="hidden" name="prices[]" value="{{ $item->item->price }}">
                @endforeach
                <button type="submit" class="w-full flex justify-center items-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">Buy</button>
              </form>
            </div>
            <div class="mt-6 flex justify-center text-sm text-center text-gray-500">
              <p>
                or <button type="button" class="text-indigo-600 font-medium hover:text-indigo-500"><a href="{{ route('items.index') }}" class="hover:underline">Continue Shopping</a><span aria-hidden="true"> &rarr;</span></button>
              </p>
            </div>
          </div>
          @endif
        </div>
      </div>
@endsection

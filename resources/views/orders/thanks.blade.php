@extends('layouts.app')

@section('content')
<section class="">
  <div class="bg-[url('https://i.imgur.com/jAXaawT.jpg')] h-screen bg-cover bg-center flex justify-items-center items-center">
    <div class="px-10 lg:px-32 xl:px-40">
      <h1 class="text-6xl font-semibold font-serif mb-6">
        <spian class="text-red-500">We are welcome to you</spian> <br />
        <span>On Everything!!</span>
      </h1>
      <p class="text-lg max-w-md">またのご利用をお待ちしております!!</p>
      <button class="inline-block mt-10 px-10 py-3 bg-red-500 text-lg text-white font-semibold"><a href="{{ route('items.index') }}">買い物をする</a></button>
    </div>
  </div>
</section>
@endsection

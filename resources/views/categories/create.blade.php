@extends('layouts.app')

@section('content')
@if (session('flash'))
    <p class="bg-green-500 text-white p-2 text-center">{{ session('flash') }}</p>
@endif
<div class=" relative w-1/3 mx-auto mt-10">
  <form action="{{ route('categories.store') }}" method="post">
    @csrf
    <label for="category-name" class="text-gray-700">
        Category
    </label>
    <input type="text" name="category_name" id="category-name" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" />
    <button type="submit" class="py-2 px-4 bg-red-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 opacity-70 cursor-pointer rounded-lg mt-5">
      Add
    </button>
  </form>
</div>
@endsection

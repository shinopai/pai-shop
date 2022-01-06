@extends('layouts.app')

@section('content')
<main class="grid place-items-center lg:h-screen">
  <section class="flex flex-col md:flex-row gap-11 py-10 px-5 bg-white rounded-md shadow-lg w-3/4 md:max-w-2xl my-10 lg:my-0">
    <div class="text-indigo-500 flex flex-col justify-between lg:w-2/5">
      <img src="{{ asset('images/'.$item->item_image) }}" alt="{{ $item->item_name }}" />
    </div>
    <div class="text-indigo-500">
      <small class="uppercase">{{ $item->category->category_name }}</small>
      <h3 class="uppercase text-black text-2xl font-medium">{{ $item->item_name }}</h3>
      <h3 class="text-2xl font-semibold mb-7">￥{{ number_format($item->price) }}</h3>
      <small class="text-black text-lg">{{ $item->body }}</small>
      @auth
      <div class="flex gap-0.5 mt-4">
        <form action="{{ route('items.addcart', ['item' => $item->id]) }}" method="post">
          @csrf
          <label for="orders">Orders</label><br>
          <select name="orders" id="orders" class="p-2 w-20 border">
            @for ($i = 1; $i <= $item->stock->quantity; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
          </select>
          <input type="hidden" name="user_id" value="{{ Auth::id() }}">
          <button type="submit" id="addToCartButton" class="mt-5 lg:ml-5 bg-indigo-600 hover:bg-indigo-500 focus:outline-none transition text-white uppercase px-8 py-3 md:text-sm md:px-2">add to cart</button>
        </form>
      </div>
      @else
      <p class="mt-5 text-black">商品を買うにはログインをしてください。<a href="{{ route('login') }}" class="text-indigo-500 hover:underline">Login</a></p>
      @endauth
    </div>
  </section>
</main>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    const likeButton = document.querySelector("#likeButton");
    const addToCartButton = document.querySelector("#addToCartButton");
    likeButton.addEventListener("click", ()=>{
        likeButton.classList.toggle("text-red-400")
    })
    addToCartButton.addEventListener("click", ()=>{
      const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'Added to cart'
})
    })

</script>
@endsection

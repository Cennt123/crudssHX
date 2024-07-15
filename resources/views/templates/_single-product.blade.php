

<div class='p-4 rounded bg-blue-200 w-[23rem] flex  fade-me-out' id="product{{$prod->id}}">
    @include('templates._conform-delete-product', ['prod' => $prod])

    <div class='w-1/4 pr-4'>
        <img src='{{ $prod->image }}' alt='{{ $prod->name }}' class='rounded w-full'>
    </div>
    <div class='w-3/4'>
        <h2 class='text-xl font-bold'>{{ $prod->name }}</h2>
        <p>{{ $prod->description }}</p>
        <p class='text-gray-700'>Quantity: {{ $prod->quantity }}</p>
        <div class="flex justify-between">
            <p class='text-green-500 font-semibold'>${{ $prod->price }}</p>
            <button class="py-2 px-4 bg-red-300 border border-red-400 text-red-600 rounded"
                onclick="document.getElementById('deleteProduct{{$prod->id}}').classList.remove('hidden')"
            >Delete</button>

        </div>
    </div>
</div>
</div>

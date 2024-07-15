@foreach ($products as $prod)

    @include('templates._single-product', ['prod'=>$prod])
@endforeach

<div hx-swap-oob='true' id="addProductMessage">
    <div class="bg-green-200 text-green-800 p-2 rounded">
        The product has been added successfully!!!
    </div>
</div>

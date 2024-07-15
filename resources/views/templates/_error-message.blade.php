<!-- resources/views/templates/_error-message.blade.php -->

@if ($errors->any())
    @if($errors->has('name'))
        <div hx-swap-oob="true" id="name_message" class="bg-red-200 text-center m-2 rounded">{{ $errors->first('name') }}</div>
    @else
        <div hx-swap-oob="true" id="name_message" class="bg-red-200 text-center m-2 rounded"></div>
    @endif

    @if($errors->has('description'))
        <div hx-swap-oob="true" id="description_message" class="bg-red-200 text-center m-2 rounded">{{ $errors->first('description') }}</div>
    @else
        <div hx-swap-oob="true" id="description_message" class="bg-red-200 text-center m-2 rounded"></div>
    @endif

    @if($errors->has('price'))
        <div hx-swap-oob="true" id="price_message" class="bg-red-200 text-center m-2 rounded">{{ $errors->first('price') }}</div>
    @else
        <div hx-swap-oob="true" id="price_message" class="bg-red-200 text-center m-2 rounded"></div>
    @endif

    @if($errors->has('quantity'))
        <div hx-swap-oob="true" id="quantity_message" class="bg-red-200 text-center m-2 rounded">{{ $errors->first('quantity') }}</div>
    @else
        <div hx-swap-oob="true" id="quantity_message" class="bg-red-200 text-center m-2 rounded"></div>
    @endif

    @if($errors->has('image'))
        <div hx-swap-oob="true" id="image_message" class="bg-red-200 text-center m-2 rounded">{{ $errors->first('image') }}</div>
    @else
        <div hx-swap-oob="true" id="image_message" class="bg-red-200 text-center m-2 rounded"></div>
    @endif

    @if(isset($general_error))
        <div hx-swap-oob="true" id="general-error-message" class="bg-red-200 text-center m-2 rounded">{{ $general_error }}</div>
    @endif
@endif

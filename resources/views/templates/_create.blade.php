<!-- resources/views/templates/create.blade.php -->

<div class="modal-header flex justify-between items-center border-b pb-2">
    <h4 class="text-lg">Create Product</h4>
</div>
<div class="modal-body my-4">
    <form id="modalForm" enctype="multipart/form-data" hx-post="api/create-product" hx-trigger="submit" hx-target="#products-list" hx-swap="innerHTML swap:0.5s">
        <div class="form-group mb-4">
            <label for="name" class="block mb-2">Name:</label>
            <input type="text" id="name" class="w-full p-2 border border-gray-300 rounded" placeholder="Enter product name" name="name">
            <div id="name_message"></div>
        </div>

        <div class="form-group mb-4">
            <label for="description" class="block mb-2">Description:</label>
            <input type="text" id="description" class="w-full p-2 border border-gray-300 rounded" placeholder="Enter product description" name="description">
            <div id="description_message"></div>
        </div>

        <div class="form-group mb-4">
            <label for="price" class="block mb-2">Price:</label>
            <input type="number" id="price" class="w-full p-2 border border-gray-300 rounded" placeholder="Enter product price" name="price">
            <div id="price_message"></div>
        </div>

        <div class="form-group mb-4">
            <label for="quantity" class="block mb-2">Quantity:</label>
            <input type="number" id="quantity" class="w-full p-2 border border-gray-300 rounded" placeholder="Enter product quantity" name="quantity">
            <div id="quantity_message"></div>
        </div>

        <div class="form-group mb-4">
            <label for="image" class="block mb-2">Image:</label>
            <input type="file" id="image" class="w-full p-2 border border-gray-300 rounded" name="image">
            <div id="image_message"></div>
        </div>

        <div id="addProductMessage"></div>
        <div class="flex justify-between items-center">
            <button type="submit" id="modalSubmitButton" class="btn bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">Submit</button>
        </div>
    </form>
    <div class="float-right my-0">
        <button id="modalSubmitButton" onclick="closeModal()" class="btn bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 transition duration-300">Close</button>
    </div>
</div>

@include('templates._error-message')

<script>
    function closeModal() {
        document.getElementById('addProductMessage').classList.add('hidden');
    }

    document.addEventListener('htmx:afterSwap', (event) => {
        if (event.detail.target.id === 'products-list') {
            const newProduct = event.detail.target.firstElementChild;
            newProduct.classList.add('fade-in');

            // Trigger reflow to enable transition
            void newProduct.offsetWidth;

            // Add active class to start the transition
            newProduct.classList.add('fade-in-active');
        }
    });
</script>

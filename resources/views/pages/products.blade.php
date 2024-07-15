@extends('templates.base')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex items-center">
        <h1 class="text-4xl pr-60">Products</h1>
        <form hx-get="/api/products"
              hx-target="#products-list"
              hx-trigger="submit">
            <input type="text"
                   name="filter"
                   class="p-2 border border-gray-300 ml-5 mr-2 rounded"
                   placeholder="Search Products">
        </form>

        <button onclick="openModal()" id="openModalButton" class="btn bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">Add Product</button>
    </div>
    <hr class="my-4">
    <div id="products-list" class="grid grid-cols-3 gap-2" hx-get="/api/products"  hx-trigger="load delay:0ms" hx-swap="innerHTML"></div>

    <div id="myModal" class="modal fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="modal-content bg-white p-6 rounded-lg shadow-lg w-full max-w-md" hx-get="/open"  hx-trigger="load delay:0ms" hx-swap="innerHTML">
        </div>
    </div>
    <div id="product" class="mb-3 mt-3"></div>

    <div class="alert alert-warning htmx-indicator" id="loader">Loading........</div>
</div>

<script>
function openModal() {
    const myModal = document.getElementById('myModal');
    myModal.classList.remove('hidden');
}

function closeModal() {
    const myModal = document.getElementById('myModal');
    myModal.classList.add('hidden');
    const inputs = document.querySelectorAll('#modalForm input');
    inputs.forEach(function(input) {
        input.value = '';
    });

    const messages = ['message', 'name_message', 'description_message', 'price_message', 'quantity_message'];
    messages.forEach(function(id) {
        const messageElement = document.getElementById(id);
        if (messageElement) {
            messageElement.style.display = 'none';
        }
    });
}

function confirmDeleteModal() {
    const confirmationModal = document.getElementById('confirmationModal');
    confirmationModal.classList.remove('hidden');
}

function cancelDelete() {
    const confirmationModal = document.getElementById('confirmationModal');
    confirmationModal.classList.add('hidden');
}

function closeUpdateModal() {
    const updateModal = document.getElementById('updateModal');
    updateModal.classList.add('hidden');
}

function openUpdateModal() {
    const updateModal = document.getElementById('updateModal');
    updateModal.classList.remove('hidden');
}

document.getElementById('openModalButton').addEventListener('click', openModal);
</script>
@endsection

<?php

require_once __DIR__ . '/../inc/nav.php';
 

 

?> 

    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900 text-center uppercase">registrar</h1>
        </div>
    </header>



    <div class="max-w-lg mx-auto mt-10 px-4 py-8 bg-white shadow-lg rounded-lg">
    <h2 class="text-2xl font-semibold text-center text-gray-800">Ingresar Producto</h2>
    <form class="mt-8 space-y-6" action="/miapp/register-producto" method="POST">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nombre del producto</label>
            <input type="text" id="name" name="name" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Ingrese el nombre del producto">
        </div>
        <div>
            <label for="amount" class="block text-sm font-medium text-gray-700">Cantidad</label>
            <input type="number" id="amount" name="amount" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="0" min="1">
        </div>
        <div>
            <label for="price" class="block text-sm font-medium text-gray-700">Precio</label>
            <input type="text" id="price" name="price" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="$0.00">
        </div>
        <div>
            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Agregar Producto
            </button>
        </div>
    </form>
</div>
 


</div>
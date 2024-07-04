<?php 
    require './app/views/inc/validarUsuario.php';    
?>




<div class="max-w-lg mx-auto mt-10 px-4 py-8 bg-white shadow-lg rounded-lg">
    <h2 class="text-2xl font-semibold text-center text-gray-800">Ingresar Producto</h2>
    <form class="mt-8 space-y-6" action="#" method="POST">
        <div>
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del producto</label>
            <input type="text" id="nombre" name="nombre" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                   placeholder="Ingrese el nombre del producto">
        </div>
        
        <div>
            <label for="cantidad" class="block text-sm font-medium text-gray-700">Cantidad</label>
            <input type="number" id="cantidad" name="cantidad" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                   placeholder="0">
        </div>
        
        <div>
            <label for="precio" class="block text-sm font-medium text-gray-700">Precio</label>
            <input type="text" id="precio" name="precio" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                   placeholder="$0.00">
        </div>
        
        <div>
            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Agregar Producto
            </button>
        </div>
    </form>
</div>
    
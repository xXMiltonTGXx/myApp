
<?php

require_once __DIR__ . '/../inc/nav.php'; 

 

?>





    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900 text-center uppercase">Mostrar</h1>
        </div>
    </header>
 
    <div class="container mx-auto px-4">
    <h1 class="text-xl font-bold my-4">Lista de Productos</h1>
    <?php if (!empty($products)): ?>
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">Nombre del Producto</th>
                    <th scope="col" class="px-6 py-3">Cantidad</th>
                    <th scope="col" class="px-6 py-3">Precio</th>
                    <th scope="col" class="px-6 py-3">Editar</th>
                    <th scope="col" class="px-6 py-3">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4"><?= htmlspecialchars($product['name']) ?></td>
                        <td class="px-6 py-4"><?= htmlspecialchars($product['amount']) ?></td>
                        <td class="px-6 py-4"><?= htmlspecialchars($product['price']) ?></td>
                        <td class="px-6 py-4"><a href="edit-product?id=<?= $product['id'] ?>" class="text-blue-600 hover:underline">Editar</a></td>
                        <td class="px-6 py-4">
                        <form action="/miapp/delete-product" method="POST">
                            <input type="hidden" name="id" value="<?= $product['id'] ?>">
                            <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                        </form>

                        </td> 

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No hay productos disponibles.</p>
    <?php endif; ?>
</div>








 </div>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="py-12">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="table-responsive-sm table-responsive-md">

                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="table-responsive-sm table-responsive-md">
                    <h2 class="text-3xl font-semibold mb-6">Información sobre Productos</h2> <!-- Título agregado -->
                        <a type="button" href="{{ route('products.create') }}" style="float: right;" class="bg-indigo-600 px-12 py-2 rounded text-gray-200 font-semibold hover:bg-indigo-800 transition duration-200 each-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M7.5 1a6.5 6.5 0 1 0 0 13 6.5 6.5 0 0 0 0-13zM8 7V4h1v3h3v1H9v3H8V8H5V7h3z" />
                            </svg>
                        </a>

                        <a type="button" href="{{ route('sales.create') }}" style="float: right; margin-right: 10px;" class="bg-green-500 px-12 py-2 rounded text-gray-200 font-semibold hover:bg-green-600 transition duration-200 each-in-out">
                            <svg class="h-5 w-5 text-lime-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </a>


                        </a>

                        <table class="table table-dark table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Referencia</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Peso</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Fecha De Creacion</th>
                                    <th scope="col">Aciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td scope="row">{{$product->name}}</td>
                                    <td scope="row">{{$product->reference}}</td>
                                    <td scope="row">{{$product->price}}</td>
                                    <td scope="row">{{$product->weight}}</td>
                                    <td scope="row">{{$product->category}}</td>
                                    <td scope="row">{{$product->stock}}</td>
                                    <td scope="row">{{$product->created_at}}</td>
                                    <td scope="row">
                                        <div class="flex">
                                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary mr-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg>
                                            </a>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="formEliminar">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="background-color:red;" class="btn btn-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Agregar tarjeta para mostrar información -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div class="bg-gray-800 text-white border border-gray-600 p-4 rounded-md">
        @if($productMaxStock)
            <h3 class="text-lg font-semibold mb-2">Producto con más stock</h3>
            <p class="mb-1"><span class="font-semibold">Nombre:</span> {{ $productMaxStock->name }}</p>
            <p><span class="font-semibold">Stock:</span> {{ $productMaxStock->stock }}</p>
        @else
            <p class="text-lg font-semibold">No hay información disponible sobre el producto con más stock.</p>
        @endif
    </div>
    <div class="bg-gray-800 text-white border border-gray-600 p-4 rounded-md">
        @if($productMaxSold)
            <h3 class="text-lg font-semibold mb-2">Producto más vendido</h3>
            <p class="mb-1"><span class="font-semibold">Nombre:</span> {{ $productMaxSold->product->name }}</p>
            <p><span class="font-semibold">Total de ventas:</span> {{ $productMaxSold->total_sales }}</p>
        @else
            <p class="text-lg font-semibold">No hay información disponible sobre el producto más vendido.</p>
        @endif
    </div>
</div>

                        {!! $products->links() !!}
                    </div>
                </div>
            </div>
</body>

</html>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    (function() {
        'use strict'
        var forms = document.querySelectorAll('.formEliminar')
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    event.preventDefault()
                    event.stopPropagation()
                    Swal.fire({
                        title: '¿Confirma la eliminación del registro?',
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#20c997',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Confirmar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.submit();
                            Swal.fire('¡Eliminado!', 'El registro ha sido eliminado exitosamente.', 'success');
                        }
                    })
                }, false)
            })
    })()
</script>
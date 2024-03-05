<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="bg-gray-100">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="table-responsive-sm table-responsive-md">
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                <form action="{{ route('sales.store') }}" method="POST" class="p-5 bg-white rounded-lg shadow-lg" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="producto" class="form-label">Selecciona el producto:</label>
                        <select class="form-select" id="producto" name="product_id">
                            <option value="" disabled selected>Selecciona un producto</option>
                            @foreach ($products as $product)
                            <option value="{{ $product->id }}" data-quantity="{{ $product->stock }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3" id="quantity" style="display: none;">
                        <label for="cantidadInput" class="form-label">Cantidad en stock:</label>
                        <input type="text" class="form-control" id="cantidadInput" placeholder="Cantidad en stock" readonly>
                    </div>
                    <div class="mb-3" id="cantidadVenta" style="display: none;">
                        <label for="cantidadVentaInput" class="form-label">Cantidad a vender:</label>
                        <input type="number" class="form-control" id="cantidadVentaInput" name="quantity" placeholder="Cantidad a vender">
                        @if ($errors->has('quantity'))
                                <p class="text-red-500 text-xs italic mt-1">{{ $errors->first('quantity') }}</p>
                        @endif
                    </div>
                    <div id="errorStock" class="alert alert-danger" style="display: none;">
                        No hay suficiente stock disponible para esta venta.
                    </div>
                    <button type="submit" class="btn btn-primary" id="btnVender" style="display: none;">Vender</button>
                </form>
            </div>
        </div>
    </div>
</body>

<script>
    // Función para mostrar el campo de quantity y quantity a vender cuando se selecciona un producto
    document.getElementById('producto').addEventListener('change', function() {
        var quantity = this.options[this.selectedIndex].getAttribute('data-quantity');
        if (quantity > 0) {
            document.getElementById('cantidadInput').value = quantity;
            document.getElementById('quantity').style.display = 'block';
            document.getElementById('cantidadVenta').style.display = 'block';
            document.getElementById('btnVender').style.display = 'block';
            document.getElementById('errorStock').style.display = 'none';
        } else {
            document.getElementById('quantity').style.display = 'none';
            document.getElementById('cantidadVenta').style.display = 'none';
            document.getElementById('btnVender').style.display = 'none';
            document.getElementById('errorStock').style.display = 'block';
        }
    });
    
</script>

</html>

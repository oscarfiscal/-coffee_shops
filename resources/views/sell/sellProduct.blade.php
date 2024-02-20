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
                <form action="" method="POST" class="p-5 bg-white rounded-lg shadow-lg">
                    @csrf
                    <div class="mb-3">
                        <label for="producto" class="form-label">Selecciona el producto:</label>
                        <select class="form-select" id="producto" name="producto_id">
                            <option value="" disabled selected>Selecciona un producto</option>
                            @foreach ($products as $product)
                            <option value="{{ $product->id }}" data-cantidad="{{ $product->stock }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3" id="cantidad" style="display: none;">
                        <label for="cantidadInput" class="form-label">Cantidad en stock:</label>
                        <input type="text" class="form-control" id="cantidadInput" placeholder="Cantidad en stock" readonly>
                    </div>
                    <div class="mb-3" id="cantidadVenta" style="display: none;">
                        <label for="cantidadVentaInput" class="form-label">Cantidad a vender:</label>
                        <input type="number" class="form-control" id="cantidadVentaInput" name="cantidad" placeholder="Cantidad a vender" min="1" required>
                    </div>
                    <button type="submit" class="btn btn-primary" id="btnVender" style="display: none;">Vender</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>



<script>
    // Función para mostrar el campo de cantidad y cantidad a vender cuando se selecciona un producto
    document.getElementById('producto').addEventListener('change', function() {
        var cantidad = this.options[this.selectedIndex].getAttribute('data-cantidad');
        if (cantidad) {
            document.getElementById('cantidadInput').value = cantidad;
            document.getElementById('cantidad').style.display = 'block';
            document.getElementById('cantidadVenta').style.display = 'block';
            document.getElementById('btnVender').style.display = 'block';
        } else {
            document.getElementById('cantidad').style.display = 'none';
            document.getElementById('cantidadVenta').style.display = 'none';
            document.getElementById('btnVender').style.display = 'none';
        }
    });
</script>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container border border-dark" style="width: 60%; background-color: #E9EEF2">
        <span style="float: right"><b>Celular: +57 (3) 23 301 15 56</b></span>
        <h2><strong>Tortas Julian S.A.S</strong></h2>
        <hr>

        <h1 class="text-center"><strong>INFORMACIÓN DEL USUARIO</strong></h1>

        <table class="table table-striped text-center">
            <tr>
                <td>Referencia</td>
                <td>{{$invoice->id}}</td>
            </tr>
            <tr>
                <td>Nombre Títular</td>
                <td>{{$invoice->usuarios->name}}</td>
            </tr>
            <tr>
                <td>Correo Títular</td>
                <td>{{$invoice->usuarios->email}}</td>
            </tr>
            <tr>
                <td>Dirección Envío</td>
                <td>{{$invoice->address}}</td>
            </tr>
            <tr>
                <td>Teléfono Contacto</td>
                <td>{{$invoice->phone}}</td>
            </tr>
        </table>

        <h2 class="text-center my-4"><strong>INFORMACIÓN DE LOS PRODUCTOS</strong></h2>

        <hr>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr class="text-center">
                    <td>{{$product->products->name}}</td>
                    <td>$ {{number_format($product->price)}}</td>
                    <td>{{$product->amount}}</td>
                    <td>$ {{number_format($product->price * $product->amount)}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <p class="text-center" style="font-size: 1.5rem">
            <strong>TOTAL: $ {{number_format($invoice->total)}}</strong>
        </p>

    </div>

</body>
</html>
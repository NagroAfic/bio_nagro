<!-- resources/views/emails/purchase.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>CONTACTANOS</title>
</head>
<body>
    <h1>INFORMACIÓN DE CONTACTO</h1>
    <ul>
        <li><strong>NOMBRE COMPLETO:</strong> {{ $data["fullname"] }}</li>
        <li><strong>DNI O RUC:</strong> {{ $data["idruc"] }}</li>
        <li><strong>TELEFONO:</strong> {{ $data["phone"] }}</li>
        <li><strong>CORREO ELECTRONICO:</strong> {{ $data["email"] }}</li>
        <li><strong>PRODUCTO CONSULTADO:</strong> {{ $data["product_selected"] }}</li>
        <li><strong>UNIDADES:</strong> {{ $data["unit"] }}</li>
        <li><strong>TIPO DE ADQUISICIÓN:</strong> {{ $data["sales"] }}</li>
    </ul>
</body>
</html>

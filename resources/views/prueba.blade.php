<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prueba</title>
</head>
<body>
    <form action="/car" method="post">

        <label for="brand">Marca: </label>
        <input type="text" name="brand" id="brand">
        
        <label for="model">Model: </label>
        <input type="text" name="model" id="model">
        
        <label for="plate">Placa: </label>
        <input type="text" name="plate" id="plate">
        
        <label for="color">Color: </label>
        <input type="text" name="color" id="color">

        <label for="cartype_id">Tipo: </label>
        <select id="cartype_id" name="cartype_id">
            <option value=1 >SUV</option>
        </select>

        <label for="state">Estado: </label>
        <select id="state" name="state">
            <option value="active" >Activo</option>
        </select>
        
        <label for="photo1">Foto: </label>
        <input type="text" name="photo1" id="photo1">
        
        <label for="photo2">Foto: </label>
        <input type="text" name="photo2" id="photo2">
        
        <label for="photo3">Foto: </label>
        <input type="text" name="photo3" id="photo3">
        
        <label for="photo4">Foto: </label>
        <input type="text" name="photo4" id="photo4">

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
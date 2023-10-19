<?php
// Clase base para representar un hotel (abstrcta)
abstract class Hotel {
    public function imprimirFormulario() {
       
    }
}

// Clase para un Hostal
class Hostal extends Hotel {
    public function imprimirFormulario() {
        echo '<h2>Hostal</h2>';
        echo '<img src="https://media-cdn.tripadvisor.com/media/photo-s/13/c2/87/2c/el-hostal-bed-and-breakfast.jpg" alt="Hostal">';
        //fORMULARIO
        echo '<form action="procesar_reserva.php" method="post">';
        echo '<label for="numero_personas">Número de personas: </label>';
        echo '<input type="number" name="numero_personas" id="numero_personas" required><br>';
        echo '<label for="numero_dias">Número de días de estadía: </label>';
        echo '<input type="number" name="numero_dias" id="numero_dias" required><br>';
        echo '<input type="submit" value="Reservar">';
        echo '</form>';
    }
}

// Clase para  una Posada
class Posada extends Hotel {
    public function imprimirFormulario() {
        echo '<h2>Posada</h2>';
        echo '<img src="https://cdn.atrapalo.com/hoteles/picture/l/741/7/8/417027348.jpg" alt="Posada">';
        //fORMULARIO
        echo '<form action="procesar_reserva.php" method="post">';
        echo '<label for="numero_personas">Número de personas: </label>';
        echo '<input type="number" name="numero_personas" id="numero_personas" required><br>';
        echo '<label for="numero_dias">Número de días de estadía: </label>';
        echo '<input type="number" name="numero_dias" id="numero_dias" required><br>';
        echo '<label for="incluye_desayuno">¿Incluir desayuno? </label>';
        echo '<input type="checkbox" name="incluye_desayuno" id="incluye_desayuno" value="Sí">';
        echo '<br>';
        echo '<input type="submit" value="Reservar">';
        echo '</form>';
    }
}

// Clase para  un Resort
class Resort extends Hotel {
    public function imprimirFormulario() {
        Echo '<h2>Resort</h2>';
        echo '<img src="https://media-cdn.tripadvisor.com/media/photo-s/1b/b6/eb/8b/grand-palladium-costa.jpg" alt="Resort">';
     //fORMULARIO       
        echo '<form action="procesar_reserva.php" method="post">';
        echo '<label for="numero_personas">Número de personas: </label>';
        echo '<input type="number" name="numero_personas" id="numero_personas" required><br>';
        echo '<label for="numero_dias">Número de días de estadía: </label>';
        echo '<input type="number" name="numero_dias" id="numero_dias" required><br>';
        echo '<label for="todo_incluido">¿Plan todo incluido? </label>';
        echo '<input type="checkbox" name="todo_incluido" id="todo_incluido" value="Sí">';echo '<br>';
        echo '<br>';
        echo '<input type="submit" value="Reservar">';
        echo '</form>';
    }
}




// Función Factory Method para crear el objeto Hotel
function crearHotel($precio) {
    if ($precio >= 40000 && $precio <= 70000) {
        return new Hostal();
    } elseif ($precio > 70000 && $precio <= 150000) {
        return new Posada();
    } else {
        return new Resort();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cotización de Hospedaje en Hilton</title>
    
    <style>
        /* Estilo para el encabezado y el fondo de los formularios  y los inputs*/
      body {
            background-image: url("https://gcdnb.pbrd.co/images/GrK0x9pe9bzs.jpg?o=1");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: Arial, sans-serif; /* Fuente */
              text-align: center;
        }

        
        h1{
            background-color: rgba(97, 92, 242, 0.8); /* Color principal */
            color: #fff; /* Texto en blanco */
            padding: 40px; /* Espaciado interno */
            border-radius: 10px; /* Bordes redondeados */
        }

        form {
            background-color: rgba(97, 92, 242, 0.8); /* Color principal */
            color: #fff; /* Texto en blanco */
            padding: 20px; /* Espaciado interno */
            border-radius: 10px; /* Bordes redondeados */
            text-align: left;
            
        }

        label {
    display: block;
    font-weight: bold;
    margin-top: 10px;
}

       
        input[type="submit"] {
            background-color: #5955D9; 
            color: #fff; /* fff  blanco */
            padding: 10px 20px; 
            border: 2px solid #6360BF; /* Borde con color principal */
            border-radius: 5px; 
            cursor: pointer;/* manito la pasar*/
            
        }

     
        form input[type="text"]{
            width: 70%; 
            padding: 10px; 
            margin-bottom: 10px; 
    

        }
        form input[type="number"]{
            width: 70%; 
            padding: 10px; 
            margin-bottom: 10px; 
           

        }
        form input[type="checkbox"] {
            width: 10%; 
         
        }


        img.logo {
            float: left;
            margin-right: 20px; 
            margin-top: -30px;
        }

        h2 {
   
            color: #fff; /* fff  blanco */
            padding: 5px; 
            border-radius: 5px; 
            background-color: rgba(97, 92, 242, 0.8); 
            
    
           
        }
    </style>
</head>
<body>
    
    <h1>
    <img class="logo" src="https://i.postimg.cc/nrBtYG9k/image-removebg-preview-5.png" alt="Logo del Hlton" width="100">
        Cotización de Hospedaje en Hilton 
    </h1>
    <form method="post" action="">
        <label for="precio">Precio por noche: </label>
        <input type="number" name="precio" id="precio" required>
        <input type="submit" value="Buscar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["precio"])) {
        $precio = $_POST["precio"];
        $hotel = crearHotel($precio);
        $hotel->imprimirFormulario();
    }
    ?>

</body>


</html>







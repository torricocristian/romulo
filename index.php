<?php 
// error_reporting(E_ALL);
// ini_set("display_errors", 1);

// $enlace = mysqli_connect("localhost", "root", "root", "arceri");

// New Connection
$db = new mysqli("localhost", "root", "root", "arceri");

// Check for errors
if(mysqli_connect_errno()){
echo mysqli_connect_error();
}

// 1st Query
$result = $db->query("SELECT * FROM cliente");
if($result){
    $result->close();
    $db->next_result();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h1>Buscador</h1>
   
   <form action="" id="searchproduct">
       <input type="text" placeholder="Ingrese producto" name="producto" id="producto">
       <input type="submit" id="enviar">


       <div class="respuesta">

       </div>
   </form>


     
   <form action="" id="searchClient">
       <input type="text" placeholder="Ingrese nombre del cliente" name="cliente" id="cliente">
       <input type="submit" id="enviar_cliente">


       <div class="respuesta_cliente">
       </div>
   </form>



   <div class="box__addUser" style="display: none; margin-top: 40px;">

      <h2>Ingrese cliente</h2>
      <form action="">
        <input type="text" name="add_dni" id="add_dni" placeholder="Añadir dni">
        <input type="text" name="add_nombre" id="add_nombre" placeholder="Añadir nombre">

        <a href="#" id="insertar_registro">Insertar</a>
      </form>
   </div>




   <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>

   <script>

       $('#enviar').click(function(event){
           event.preventDefault();

            // - Obtener lo que escribe la persona
            // - mandar ese string en una consulta 
            // - obtener el valor mostrar , listado 

            var producto = $('#producto').val();
            
            $.ajax({
              url : 'getProducto.php', 
              data : {
                'producto' : producto,
              },
              type : 'POST',
              success : function( data ){
                //Ok , la info que me devolviste, si es que tiene, agregamela en html
                let result = JSON.parse(data);

                $('.respuesta').html('');

                if(result){
                  // tenemos que appendear la info al nodo .resultado
                  for (p in result) {
                    $('.respuesta').append('<input type="checkbox" data-price="'+ result[p].precio+'" name="productos" id="prod_'+ result[p].id +'  "><label for="prod_'+ result[p].id+'" >'+ result[p].nombre+' ($' + result[p].precio + ')  </label> <br>')
                  }

                  $('.respuesta').append('<br><br><a href="#" id="enviar_orden">Enviar orden</a>');

                }else{
                  $('.respuesta').html('No hay resultados')
                }



                $('#enviar_orden').click(function(e){
                  e.preventDefault();

                  var todoloschequeados = $('[name=productos]:checked');

                  var price = 0;

                  // es mostrar que diga cuanto plata tiene en el carrito.
                  todoloschequeados.each(function( index ) {
                    var elemento = $(this);
                    price += elemento.data('price');
                  });


                  alert('La suma total del carro es: $' + price);
                })
              }
            });

       })



       //acciones del modulo cliente

       $('#enviar_cliente').click(function(event){
           event.preventDefault();

            var cliente = $('#cliente').val();


            if(cliente == '') return false;
            
            $.ajax({
              url : 'getCliente.php', 
              data : {
                'cliente' : cliente,
              },
              type : 'POST',
              success : function( data ){
                //Ok , la info que me devolviste, si es que tiene, agregamela en html
                let result = JSON.parse(data);


                if(!result){
                  $('.box__addUser').show();
                }


                $('.respuesta_cliente').html('');

                if(result){
                  // tenemos que appendear la info al nodo .resultado
                  for (p in result) {
                    $('.respuesta_cliente').append('<input type="checkbox" data-dni="'+ result[p].dni+'" name="cliente_checkbox" id="prod_'+ result[p].id +'  "><label for="prod_'+ result[p].dni+'" >'+ result[p].nombre+' (DNI: ' + result[p].dni + ')  </label> <br>')
                  }

                  $('.respuesta_cliente').append('<br><br><a href="#" id="enviar_orden">Enviar orden</a>');

                }else{
                  $('.respuesta_cliente').html('No hay resultados')
                }



                $('#enviar_orden').click(function(e){
                  e.preventDefault();

                  var todoloschequeados = $('[name=productos]:checked');

                  var price = 0;

                  // es mostrar que diga cuanto plata tiene en el carrito.
                  todoloschequeados.each(function( index ) {
                    var elemento = $(this);
                    price += elemento.data('price');
                  });


                  alert('La suma total del carro es: $' + price);
                })
              }
            });

       })



       //insertar registro
       $('#insertar_registro').click(function(event){
           event.preventDefault();

            var dni = $('#add_dni').val();
            var nombre = $('#add_nombre').val();
            
            $.ajax({
              url : 'insertCliente.php', 
              data : {
                'dni' : dni,
                'nombre' : nombre
              },
              type : 'POST',
              success : function( data ){
                //Ok , la info que me devolviste, si es que tiene, agregamela en html
                let result = JSON.parse(data);
                $('.box__addUser').append('<p>Registro agregado!</p>');
              }
            });

       })

   </script>
</body>
</html>

<!-- $('[name=productos]:checked') -->
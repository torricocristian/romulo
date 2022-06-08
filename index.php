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
   
   <form action="">
       <input type="text" placeholder="Ingrese producto" name="producto" id="producto">
       <input type="submit" id="enviar">


       <div class="respuesta">

       </div>
   </form>




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


   </script>
</body>
</html>

<!-- $('[name=productos]:checked') -->
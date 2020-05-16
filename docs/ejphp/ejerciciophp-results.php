<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/forms.css">
    <link rel="stylesheet" href="../../styles/style.css">
    <title>TodoPago</title>
</head>


    <body class="form1">
        <div class="form-container">
            
                <fieldset>
                   

        <h1>Tu pago</h1>
        <hr class="separator">
       
        <?php
   if (isset($_POST['enviar']))
   {
      print ("<h2>Resultados de su formulario de pago</h2>\n");

      $name = $_POST['p-name'];
      $surname = $_POST['p-surname'];
      $idtype = $_POST['p-idtype'];
      $cardnumber = $_POST['p-cardnumber'];
      $card = $_POST['p-card'];
      $entity = $_POST['p-entity'];
      $amount = $_POST['p-amount'];
      $day;
      $dow = date("N");

      function normalCoutas() {
          print ("<p>Accederá al plan normal de pagos, esto es 1,5% las primeras 8 cuoutas, 3,5%, 6,5%, 2% y 7,5% respectivamente las siguientes</p>");
      }
      function ahoraDoce() {
          print ("<p>Accederá al plan Ahora12</p>");
      }
      function aplicaVeinte(){
          print ("<p>Posee 20% de descuento,en cualquier cantidad de coutas elegidas. /n</p>");
      }
      function aplicaQuince(){
        print ("<p>Posee 15% de descuento, hasta 3 coutas. /n</p>");
    }
    function ahoraDieciocho() {
        print ("<p>Accederá también al plan Ahora18</p>");
    }


     
   

      print ("<p>Estos son los datos introducidos:</p>\n");
      print ("<ul>\n");
      print ("   <li>Nombre: $name  $surname\n");
      print ("   <li>Tarjeta: $card\n");
      print ("   <li>Banco: $entity\n");
      print ("   <li>Paga: $amount\n");
      print ("   <li>Beneficio: \n");
      switch ($dow) {
        case 1: normalCoutas(); break;
        case 2:  normalCoutas(); break;
        case 3:
          if ($entity == 'Bco Frances') {
              ahoraDoce();
              aplicaVeinte();
          } else {
              normalCoutas();
          }
      break;
        case 4:
          AplicaQuince();
       break;
        case 5: break;
        case 6: break;
        case 7: ;
    }

    if ($dow >= 4)
    {
        ahoraDoce();
    }

    if ($card == 'Visa'){
        if ($entity == 'Bco Nacion' || 'Bco Provincia')
        {
            ahoraDoce();
            ahoraDieciocho();
        }
    }
      print ("</ul>\n");
  
      print ("<p>[ <a href='ejerciciophp.html'>Modificar</a> ]<p>\n");
   }
   else
   {
       print("No se ha encontrado tu información");
   }
?>
     
            </fieldset>
           
        </div>
    
</body>
</html>

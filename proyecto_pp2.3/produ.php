<?php include ("header.php") ?>
<?php include("conexion.php") ?>


  <!-- Body-->
  <meta name="viewport" content="width=device-width">
    
    <link href="css/style.css" rel="stylesheet" type="text/css" />
  </head>
  


    
  <form action="produ.php" method="post">
    <div class="mb-3">
      <label for="" class="form-label">Codigo de bolsa</label>
      <input type="text" name="Codigo_scan" id="" class="form-control" placeholder="" aria-describedby="helpId">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </form>
    <?php
    if(isset($_POST['submit'])){ 
      $bolsa=$_POST["Codigo_scan"];
      $objconexion = new conexion();
      $resultado=$objconexion->consultar(
          "SELECT bolsa_id, bolsas.peso, bolsas.lote_id, materiales.codigo_sap, materiales.nombre, bolsas.estatus FROM `bolsas` 
          JOIN lotes ON lotes.lote_id=bolsas.lote_id 
          JOIN materiales ON lotes.cod_sap=materiales.codigo_sap 
          WHERE bolsas.bolsa_id=$bolsa;");
          $bolsa=$resultado[0];
      echo "<table>
      <tr>
        <td>ID de bolsa</td><td>$bolsa[0]</td>
      </tr>
      <tr>
        <td>ID de lote</td><td>$bolsa[2]</td>
      </tr>
      <tr>
        <td>Material</td><td>$bolsa[3] - $bolsa[4]</td>
      </tr>
      <tr>
        <td>Peso</td><td>$bolsa[1]</td>
      </tr>
      <tr>
        <td>Estatus</td><td>$bolsa[5]</td>
      </tr>
    </table>";
    }
    ?>
   


  <?php include ("footer.php") ?>
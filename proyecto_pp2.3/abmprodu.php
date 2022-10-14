   
    <?php include("conexion.php") ?>
    <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel ="stylesheet" href="css/bootstrap.min.css"/>
    
  <!-- Bootstrap -->


  </head>





  

   
   <?php include ("header.php") ?>

</nav>

    <?php 
    $mensaje =" ";
    if(isset($_POST['enviar'])){
        if($_POST['cantidad']>0 && $_POST['peso']>0){
            $objconexion = new conexion();
            $cantBols=$_POST['cantidad'];
            $cod_sap=$_POST['material'];
            $peso=$_POST['peso'];

            $insertar="INSERT INTO `lotes` (`lote_id`, `cantidad_bolsones`, `cod_sap`, `fecha`) VALUES (NULL, '$cantBols', '$cod_sap', current_timestamp())";
            $objconexion->ejecutar($insertar);

            $resultado = $objconexion->consultar("SELECT * FROM `lotes` ORDER BY `lotes`.`lote_id` ASC");
            $ultimoLote = end($resultado)['0'];
            $insertar = "INSERT INTO `bolsas` (`bolsa_id`, `peso`, `lote_id`, `estatus`) VALUES (NULL, '$peso', '$ultimoLote', 'Deposito')";
            for ($i=0; $i<$cantBols ;$i++){
            $objconexion->ejecutar($insertar);
            $mensaje="<div class='alert alert-success d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success':><use xlink:href=#check-circle-fill'/></svg>
            <div>
              Envio Exitoso.
            </div>
          </div>";
            }
        }else{
            $mensaje ="<div class='alert alert-danger d-flex align-items-center' role='alert'>
            <div>
              Hubo un error en los datos enviados.
            </div>
          </div>";
        }
    }
    

    ?>

<!-- Formulario-->

		<h1>INGRESO DE MATERIA PRIMA</h1>

        <div class="container px-5 my-5">
    <form id="contactForm" data-sb-form-api-token="API_TOKEN" action="abmprodu.php" method="post">
        
        
        <div class="form-floating mb-3">
            <input class="form-control" id="cantidad" type="number" placeholder="Cantidad" data-sb-validations="required" name="cantidad"/>
            <label for="cantidad">Cantidad de bolsas</label>
            <div class="invalid-feedback" data-sb-feedback="cantidad:required">Cantidad is required.</div>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select" id="material" aria-label="Material" name="material">
                
                <?php
                $objconexion = new conexion();
                $resultado=$objconexion->consultar("SELECT * FROM `materiales`");
                foreach($resultado as $mate){
                    ?> <option value="<?php echo $mate['codigo_sap']?>"> 
                    <?php echo $mate['codigo_sap']." - ".$mate['nombre'] ?></option><?php
                }
                ?>

            </select>
            <label for="material">Material</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="peso" type="number" placeholder="Peso" data-sb-validations="required" name="peso"/>
            <label for="peso">Peso /kg</label>
            <div class="invalid-feedback" data-sb-feedback="peso:required">Peso is required.</div>
        </div>
        <div class="d-none" id="submitSuccessMessage">
            <div class="text-center mb-3">
                <div class="fw-bolder">Form submission successful!</div>
                <p>To activate this form, sign up at</p>
                <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
            </div>
        </div>
        <div class="d-none" id="">
            <div class="text-center text-danger mb-3">Error sending message!</div>
        </div>
        <div class="d-grid">
            <button class="btn btn-primary btn-lg" id="submit" type="submit" value="Submit" name="enviar">GUARDAR</button>
        </div>
    </form>
</div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
<?php   echo ($mensaje);
        $mensaje="";
        ?>
<!-- Footer acomodor logo falta -->

  </body>
</html>
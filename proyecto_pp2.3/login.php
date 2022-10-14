<!DOCTYPE html>
<html>
<head>
   
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta charset="utf-8"/>

<!-- Bootstrap -->
<link rel ="stylesheet" href="css/bootstrap.min.css"/>
<!-- Estilos en css -->
<link rel="stylesheet"  href="css/style.css"/>
</head>

<body class="m=0 row justify-content-center text-center">      
                <!--Formulario login-->
                
            <div class="container " >
            <div class="centrado">  
                            <h1>Ingreso a Speed data System</h1>       
                    <div class="row">
                                 
     <form > 
     
            <div class="form-floating mb-3">
                
                <input type="text" class="form-control-lg" id="usuario" placeholder="Usuario" data-sb-validations="required"   autofocus>
                <div class="invalid-feedback" data-sb-feedback="usuario:required">Usuario is required.</div>
                
            </div>
    
            <div class="form-floating mb-3">
                <input type="password" class="form-control-lg" id="password" placeholder="Password" data-sb-validations="required">
                <div class="invalid-feedback" data-sb-feedback="password:required">Password is required.</div>
            </div>
            
            <div class="btn-group-vertical">                                  <!-- Color borde|tipo de boton| --> 
        <a href="index.php " button type="button"  class=" btn btn-secondary border-dark btn-lg">Ingresar</a>
          </div> 
     
     </form>
            </div>
                </div>
                    </div>

                    <?php include ("footer.php") ?>

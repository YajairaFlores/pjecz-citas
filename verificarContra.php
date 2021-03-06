<?php
include ("funciones.php");
$link = conectarse();
$error="";

    if(isset($_GET['correo']) && !empty($_GET['correo']) AND isset($_GET['usuarioId']) && !empty($_GET['usuarioId']))
    {
        $email = $_GET['correo'];
        $usuarioId = $_GET['usuarioId'];  
        //$hash = $_GET['hash']; 

        $sqlUsuario =  "select email, activo from usuario where email = '$email' and id = '$usuarioId' and activo = 1";
       
        $resultUsuario = mysqli_query($link,$sqlUsuario);
        $TotalUsu = mysqli_num_rows($resultUsuario);

        if($TotalUsu > 0)
        {
             $error = 'Cuenta activa, ingresar nueva contraseña';

             if(isset($_POST['btnContra']))
              {      
                $contra=$_POST['txtContra'];
                $newContra=$_POST['txtNewContra'];
                  
                  if($contra!=$newContra)
                  {   
                    $error = "Las contraseñas no coindiden";    
                  }
                  else
                  {
                    $sqlNewContra = "UPDATE usuario set password='$contra' where email = '$email' and id = '$usuarioId' and activo = 1";  
                    $resultNewContra = mysqli_query($link,$sqlNewContra);

                    $error = "Contraseña actualizada correctamente";    
                  }        
              }
        }
        else
        {
            $error = 'No se encontro el correo o la cuenta fue desactivada';
        }    
    }
    else
    {
      $error = 'URL invalida';
    }
             
?>

<!DOCTYPE html>
<html>
<head>
<title>Sistema de Citas</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
    function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="resources/js/ajax.js"></script>
<!-- //for-mobile-apps -->
<link href="resources/css/fonts.css" rel="stylesheet" type="text/css" media="all" />
<link href="resources/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="resources/css/style.css" rel="stylesheet" type="text/css" media="all" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="resources/js/funciones_js.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="resources/css/steps.css">
<script src="resources/js/steps.js"></script>
<link href="resources/imgs/calendario.ico" rel="shortcut icon" type="image/x-icon" />
<body>
    
<br>
<div class="container" id="grad1">
    <div class="card" style="border:1px solid #555">

    <div class="card-header">

        <div class="bannerx" >
          <div class="container">
            <div class="row">
              <div class="col-md-3" style="padding:0px 50px;">
                <img src='resources/imgs/logo_pjecz.png' width="220"> 
              </div>
              <div class="col-md-9 text-right" style="padding: 0px 50px;"><br>
                <span style="font-size: 2em">:: Sistema de Citas ::</span>  
                <br>
                <a href="index.php" class="btn btn-secondary">Iniciar sesión</a> 
              </div>
            </div>
          </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row justify-content-center mt-0" >
            <div class="col-11 col-sm-9 col-md-7 col-lg-10 text-center p-10 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-10 mt-3 mb-3">
                    <h2><strong>Bienvenido(a) al Sistema de Citas</strong></h2>
                    <div class="row">
                      <div class="container text-center">
                        <fieldset>
                          <div class="modal-dialog text-center">
                            <div class="col-md-12 main-section">
                              <div class="modal-content" style="background: transparent; border:#45543D 3px solid;">
                                <br>
                                <div class="col-12 user-img">
                                  <h5><strong>Recuperar contraseña</strong></h5>
                                </div> 
                                <br>
                            <form class="col-12" method="post">
                              <div class="form-group">
                                <input type="password" class="form-control" placeholder="Contraseña" id="txtContra" name="txtContra" required>
                              </div>
                              <div class="form-group">
                                <input type="password" class="form-control" placeholder="Confirmar Contraseña" id="txtNewContra" name="txtNewContra" required>
                              </div>
                              <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-danger" name="btnContra" id="btnContra">
                                <i class="fas fa-sign-in-alt"></i>Cambiar contraseña</button>
                                <br> <br>
                              </div>
                              <div class="col-sm-12 text-center">
                                <a style="border-top: 1px solid#888; border-bottom: 1px solid#888; padding-top: 12px; padding-bottom: 12px;font-weight: bold; font-size:1.2em; color:#250A77; margin-top:10px" href="registroPJ.php">=> Registrarme , aun no tengo cuenta !!</a> <br>
                                <br>
                              </div>
                              <div class="col-sm-12 text-center">
                                <span style="font-weight: bold; font-size:15px; color:red; margin-top:10px"><?php echo $error;?>
                                </span>
                                <br><br>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </fieldset>
                  </div>
                </div>
            </div>
        </div>
    </div> <!-- termina CARD Body -->
<div class="card-footer"> </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
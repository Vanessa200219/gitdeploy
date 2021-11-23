<?php  


session_start();


if (!isset($_SESSION['NumerodeDocumento'])) {

	header('Location: iniciarsesion.php');

}elseif(isset($_SESSION['NumerodeDocumento'])){
	include '../Conexion/Conexion.php';
		$id = $_GET['id'];

		$sentencia = $bd->prepare("SELECT * FROM persona WHERE NumerodeDocumento = ?;");
		$sentencia->execute([$id]);
		$persona1 = $sentencia->fetch(PDO::FETCH_OBJ);
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSSCuenta/index.css">
    <link rel="stylesheet" href="../CSSCuenta/perfil.css">
    <link rel="stylesheet" href="../CSSCuenta/informacion.css">
    <title>Modificacion Contraseña</title>
</head>
<body>
    
  <!-- MENU -->
  
  <section id="header">
    <div class="header">
      
        <div class="brand">
          <a href="inicio.php">
            <img src="../../imgindex/logo.png" alt="">
          </a>
        </div>
      <div class="nav-bar">
        
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
            <li><a href="inicio.php" data-after="Inicio">Inicio</a></li>
            <li><a href="Ayuda.php" data-after="Ayuda">Ayuda</a></li>
            <li><a href="" data-after="Productos">Productos</a></li>
          </ul>
        </div>

            <div class="dropdown">
            
              <input  type="buttom" onclick="myFunction()" class="dropbtn" style="background-image:url('https://img.icons8.com/ios-filled/50/000000/cat-profile.png')">
              <span class="caret"></span>
              <div id="myDropdown" class="dropdown-content">
                <form action="../Vista/Listar.php" method="POST"><input class="perfil" type="submit" value="Perfil" name="btn2"></form>
                <a href="">Mis Compras</a>
                <a href="">Favoritos</a>
                <a href="">Privacidad</a>
                <a href="" class="historial">Notificaciones</a>
                <a class="" href="inicio.php #contact">Contactos</a>
                <a class="salir" href="../Controlador/CerrarSesion.php">Salir</a>
              </div>
            </div>

      </div>
    </div>
  </section>

  <!-- FIN DE MENU -->   


  <!-- Cambiar Contraseña -->
<section class="modulo_editar">

    <div class="texto">
      <h6>Cambiar Contraseña</h6>
    </div>

    <form class="form" method="POST" action="../Controlador/ProcesoContraseña.php">

      <table class="form__items">

			  <tr>
				  <td class="contraseña_items">Contraseña Actual:</td>
				  <td id="password_items"><input type="password" name="AntiguaContrasena" placeholder="Antigua Contraseña" value="" minlength="5" maxlength="7" required></td>
			  </tr>

		    <tr>
			    <td class="contraseña_items">Nueva Contraseña: </td>
				  <td id="password_items"><input type="password" name="NuevaContrasena" placeholder="Nueva Contraseña" value="" minlength="5" maxlength="7" required></td>
			  </tr>

			  <tr>
				  <td class="contraseña_items">Confirme Contraseña: </td>
				  <td id="password_items"><input type="password" name="ConfirmeContrasena" placeholder="Confirme Contraseña" value="" minlength="5" maxlength="7" required></td>
			  </tr>

      



			  <tr>
           <input type="hidden" name="oculto">
					  <input type="hidden" name="id3" value="<?php echo $persona1->NumerodeDocumento ;?>">
					  <td colspan="2"><input id="submit1" type="submit" value="Aceptar"></td>
			  </tr>

		  </table>
	  </form>
</section>



  <script src="../../indexJava/app.js"></script>
  <script src="../java/index.js"></script>
</body>
</html>

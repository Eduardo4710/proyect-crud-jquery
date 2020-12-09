<html>
<head>
  <?php require('baseAdmin/meta.php');?>
  <link rel="stylesheet" href="css/imgPreviaYBtnFile.css">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <!-- Main Header -->
    <?php require('baseAdmin/header.php')?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php require('baseAdmin/menu-la.php');?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Catalogo
          <small>Trabajador</small>
        </h1>

        <input type="text" name="q" id="Caja_Busquera" class=" Buscador" placeholder="Search...">
      </section>
      <!-- Main content -->
      <section class="content" id="information">     
       <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Información de Trabajador</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <div style="padding-bottom: 7px">
             	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Nuevo</button>
             </div>
             <div class="table table-responsibe">
             <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                 <th>ID</th>
                 <th>Foto</th>
                 <th>Nombre</th>
                 <th>Sexo</th>  
                 <th>Fecha</th>               
               </tr>
             </thead>
             <tbody id="resul_select">






                <!-- <tr>
                   <td>ID</td>
                   <td><img src="img/" width="50" height="50"></td>
                   <td>Nombre</td>
                   <td>Sexo</td>
                   <td>Fecha</td>
                   <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#editM" data-whatever="@mdo">Editar</button></td>
                  <td> <button type="button" class="btn btn-danger">Eliminar</button></td>
                </tr>-->


             </tbody>               
            </table>

           
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!--modal nuevo -->     
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="exampleModalLabel">Agregar usuario</h4>
        </div>
        <div class="modal-body">

         <form id="datos" enctype="multipart/form-data">
          <div class="row">
          <div class="form-group col-md-6 col-sm-6">
            <label for="recipient-name" class="control-label">Nombre completo:</label>
            <input type="text"  class="form-control" id="nombre" name="nombre" maxlength="25" onKeyPress="return soloLetras(event)">
          </div>
          <div class="form-group col-md-6 col-sm-6">
            <label for="recipient-name" class="control-label">Sexo: </label>
          <select class="form-control" id="sexo" name="sexo">
          <option value="" disabled selected>Elegir</option>    
          <option value="Masculino">Masculino</option>
          <option value="Femenino">Femenino</option> 
          </select>
          </div>
          <div class="form-group col-md-8 col-sm-8">
            <label for="recipient-name" class="control-label">Cargar Img:</label>
            
            <input type="file" id="archivoImg"  name="file_to_upload"><br>
            <br>
            <input type="button" value="Imagen" class='btn btn-danger' onclick=" document.getElementById('archivoImg').click()">
            <br><br>
            <div id="imgprevia"></div>
          </div>        
        </div>
      </form>

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary" id="save">Guardar</button>
    </div>

  </div>
</div>
</div>
<!--termina-->
<!--modal ediatr -->     
<div class="modal fade" id="editM" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Editar usuario</h4>
      </div>
      <div class="modal-body">
        <form id="datosEditar" enctype="multipart/form-data">
          <div class="row">
          <div class="form-group col-md-6 col-sm-6">
            <label for="recipient-name" class="control-label">Nombre completo:</label>
            <input type="text"  class="form-control" id="enombre" name="enombre" maxlength="25" onKeyPress="return soloLetras(event)">
          </div>
          <div class="form-group col-md-6 col-sm-6">
            <label for="recipient-name" class="control-label">Sexo:</label>
          <select id="esexo" class="form-control"  name="esexo">
          <option value="" disabled selected>Elegir</option>    
          <option value="Masculino">Masculino</option>
          <option value="Femenino">Femenino</option> 
          </select>
          </div>
          <div class="form-group col-md-8 col-sm-8">
            <label for="recipient-name" class="control-label">Cargar Img:</label>
           

            <input type="file" id="earchivoImg"  name="file_to_upload"><br>
           <!-- <br>
            <input type="button" value="Imagen" class='btn btn-danger' onclick=" document.getElementById('archivoImg').click()">
            <br><br>
            <div id="imgpreviaEditar"></div>-->
          </div>        
        </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="update">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!--termina-->  
</section>
<!-- /.content -->
</div>
<!-- Main Footer -->
<?php require('baseAdmin/fother.php');?>
<div class="control-sidebar-bg"></div>
</div>
<?php require('baseAdmin/script.php');?>
<script src="controlador/controlador_user.js"></script>
</body>
</html>

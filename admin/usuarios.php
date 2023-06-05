<?php
    include '../includes/header.php';
    include '../config/Mysql.php';
    
?>


    <div class="row">
        <div class="col-sm-6">
            <h3>Lista de Usuarios</h3>
        </div>     
    </div>
    <div class="row mt-2 caja">
        <div class="col-sm-12">
            <table id="tblUsuarios" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Fecha de Creación</th>                       
                        <th>Acciones</th>
                    </tr>
                </thead>
                    <tbody>
                        <tr>
                            <td>4</td>
                            <td>juan</td>
                            <td>juan@sda</td>
                            <td>registrado</td>
                            <td>2023-10-01</td>
                            <td>
                                <a href="editar_usuario.php" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></a>                                            
                            </td>
                        </tr>                   
                    </tbody>       
                </table>
            </div>
        </div>

<?php include("../includes/footer.php") ?>

<script>
    $(document).ready( function () {
        $('#tblUsuarios').DataTable();
    });
</script>
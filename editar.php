<?php
    session_start();
    if(empty($_POST) or (empty($_POST['recado']) or (empty($_POST['data'])))){
        echo"<script> location.href='portal.php;' </script>"; 
    }
    include("config.php");
    $recado = $_POST['recado'];
    $data = $_POST['data'];
    $sql = "select * from tbusuario where
    recado = '$recado' and data = '$data'";
    $res = $conn->query($sql) or die($conn->error);
    $row = $res->fetch_object();
    $qtd = $res->num_rows;
    if($qtd > 0 ){
        $_SESSION["id"] = $row->id;
        $_SESSION["recado"] = $recado;
        $_SESSION["data"] = $row->data;
     
        echo"<script> location.href='portal.php' </script>"; 
    }else{
        echo"<script> alert('Não foi possível editar o recado'); </script>"; 
        echo"<script> location.href='portal.php'; </script>"; 
    }

 ?>
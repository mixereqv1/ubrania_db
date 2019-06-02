<?php

    $id_to_del = $_POST['id_to_del'];
    $conn = mysqli_connect('127.0.0.1','root','','ubrania');
    $sql = "DELETE FROM koszyk WHERE id_koszyk=$id_to_del";
    mysqli_query($conn,$sql);
    header('location:index.php');

?>
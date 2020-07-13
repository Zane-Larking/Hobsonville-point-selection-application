<?php
    session_start();
    echo json_encode(['year_level' => $_SESSION['year_level'], 'name' => $_SESSION['name'], 'id' => $_SESSION['id']]);
?>
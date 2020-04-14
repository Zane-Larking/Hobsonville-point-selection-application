<?php
    session_start();
    echo "THIS IS A TEST PAGE";
    echo "<br><br><br>";
    echo json_encode(['year_level' => $_SESSION['year_level'] ? $_SESSION['year_level'] : 11, 'name' => $_SESSION['name'], 'id' => $_SESSION['id']]);

?>
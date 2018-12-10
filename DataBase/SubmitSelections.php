<?php
    
    session_start();
    /*
    example of expected output:
    '\'SCAMANDR\', \'FILMIT\', \'QSPA1112\', \'DEEPBLUE\', \'MONOPOLY\', \'HUARERE\', \'MUD\', \'STALKER\', \'SURVIVE\', \'GREATWAR\', \'STAYWARM\', \'MARAE2\''
    */
    $query = "UPDATE `students` SET SELECTIONS_".$_GET['classType']." = " . $_GET['selections'] . " WHERE `students`.`ID` = " . $_SESSION['id'];
    print_r($query);
    $_SESSION
?>
hi
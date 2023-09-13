<?php
/**
 * @date : 13/09/2023
 * @author   : Franck GRIMONPONT
 * @copyright: UGA
 */


if (isset($_GET['action']) && !empty($_GET['action'])) {
    define('ACTION', $_GET['action']);
} elseif (isset($_POST['action']) && !empty($_POST['action'])) {
    define('ACTION', $_POST['action']);
}


if (ACTION == 'saveSondage') {
    mail('fkgrim@gmail.com', 'SONDAGE MASTER', $_POST['orders']);
}

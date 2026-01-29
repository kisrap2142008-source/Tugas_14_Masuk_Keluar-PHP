<?php
session_start();
require_once 'config/database.php';
require_once 'models/SuratModel.php';
require_once 'controllers/SuratController.php';

$con = new SuratController($conn);

if (isset($_GET['logout'])) { session_destroy(); header("Location: index.php"); exit; }
if (isset($_POST['do_login'])) { $con->auth($_POST['u'], $_POST['p']); }
if (isset($_POST['do_save'])) { $con->add($_POST['no'], $_POST['jen'], $_POST['per']); }
if (isset($_POST['do_edit'])) { $con->edit($_POST['id'], $_POST['no'], $_POST['jen'], $_POST['per']); }
if (isset($_GET['del'])) { $con->remove($_GET['del']); }

$dataSurat = $con->showAll();
include 'views/app.php';
?>
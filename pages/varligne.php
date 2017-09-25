<?php

session_start();
require "scripts/manipBd.php";
//require "variables.php";

$idGriTarifaire = $_SESSION['idLastGrid'];
$support = $_SESSION['support'];
$format;
$emplacement;
$montant_ind;
$day;

  if (isset($_POST['support'])) {
    $Support = $_POST['support'];
    echo($Support);
  }

  echo($idGriTarifaire);
  echo($support);

  if (isset($_POST['format'])) {
    $format = $_POST['format'];
    echo($format);
  }

  if (isset($_POST['emplacement'])) {
    $emplacement = $_POST['emplacement'];
    echo($emplacement);
  }
/*
  if (isset($_POST['day'])) {
    $day = $_POST['day'];
    echo($day);
  }*/
  if (isset($_POST['montant_ind'])) {
    $montant_ind = $_POST['montant_ind'];
    echo($montant_ind);
  }
  $base = new database();
  $base->insertionLignGri($idGriTarifaire,$format,$emplacement,$montant_ind);
  //$base->insertionLignGri($idGriTarifaire,$format,$emplacement,$montant_ind,$day);
  header("Location: pagelignegrille.php");

  

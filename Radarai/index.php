<?php
session_start();
$dateErr=$numberErr=$timeErr=$distanceErr=$speedErr='';
$date=$number=$time=$distance=$speed="";
$id = null;
$modalWindow = '';
$message = '';
$searchParameters = [];
$searchIntervalParameters = [];
require_once "include/get.php";
require_once "include/functions.php";
$offsetLink = offsetLink ();
require_once "include/dataCheckFunctions.php";
require_once "include/connection.php";
require_once "include/html.php";
require_once "include/databaseFunctions.php";

head();
scripts();
frontPanel($limit);

require_once "include/databaseMain.php";
require_once "include/modalWindows.php";

displayModal($modalWindow);
selection();
pagesList(selectSQL(connection(), $offset, $limit, $searchParameters, $searchIntervalParameters), $limit, $offset, $offsetLink, $searchParameters, $searchIntervalParameters);
table(selectSQL(connection(), $offset, $limit, $searchParameters, $searchIntervalParameters),$offset, $limit);
selection();
pagesList(selectSQL(connection(), $offset, $limit, $searchParameters, $searchIntervalParameters), $limit, $offset, $offsetLink, $searchParameters, $searchIntervalParameters);
foot();

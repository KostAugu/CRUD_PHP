<?php

function dateCheck($date) {
    $error = [true, ""];
    if (empty($date)) {
        $error[1] = "Įveskite datą!";
        return $error;
    } else if (!preg_match("/\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}/",$date)) {
        $error[1] = "Data turi atitikti formatą YYYY-MM-dd hh:mm:ss";
        return $error;
    } else {
        $error[0] = false;
        return $error;
    }
}

function numberCheck($number) {
    $error = [true, ""];
    if (empty($number)) {
        $error[1] = "Įveskite automobilio numerį!";
        return $error;
    } else if (!preg_match("/^(?=[A-Z]*\d)[A-Z|\d]{1,6}/",$number)) {
        $error[1] = "Neteisingas numerio formatas";
        return $error;
    } else {
        $error[0] = false;
        return $error;
    }
}

function timeCheck($time) {
    $error = [true, ""];
    if (empty($time)) {
        $error[1] = "Įveskite laiką!";
        return $error;
    } else if (!preg_match("/\d+(\.|,)?(\d+)?/",$time)) {
        $error[1] = "Įveskite skaičių!";
        return $error;
    } else {
        $error[0] = false;
        return $error;
    }
}

function distanceCheck($distance) {
    $error = [true, ""];
    if (empty($distance)) {
        $error[1] = "Įveskite atstumą!";
        return $error;
    } else if (!preg_match("/\d+(\.|,)?(\d+)?/",$distance)) {
        $error[1] = "Įveskite skaičių!";
        return $error;
    } else {
        $error[0] = false;
        return $error;
    }
}

function speedCheck($speed) {
    $error = [true, ""];
    if (empty($speed)) {
        $error[1] = "Įveskite greitį!";
        return $error;
    } else if (!preg_match("/\d+(\.|,)?(\d+)?/",$speed)) {
        $error[1] = "Įveskite skaičių!";
        return $error;
    } else {
        $error[0] = false;
        return $error;
    }
}
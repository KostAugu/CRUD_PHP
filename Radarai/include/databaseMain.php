<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['dataEntry'])) {
        if(!isset($_SESSION['post_id']) || ($_SESSION['post_id'] != $_POST['post_id']) ){
            $_SESSION['post_id'] = $_POST['post_id'];
            if(dateCheck($_POST["date"])[0]) {
                $dateErr = dateCheck($_POST["date"])[1];               
            } else {
                $dateErr = '';
            }
            if(numberCheck($_POST["number"])[0]) {
                $numberErr = numberCheck($_POST["number"])[1];                
            } else {
                $numberErr = '';
            }
            if(timeCheck($_POST["time"])[0]) {
                $timeErr = timeCheck($_POST["time"])[1];
            } else {
                $timeErr = '';
            }
            if(distanceCheck($_POST["distance"])[0]) {
                $distanceErr = distanceCheck($_POST["distance"])[1];
            } else {
                $distanceErr = '';
            }
            $date = $_POST["date"];
            $number = $_POST["number"];
            $time = str_replace(",", ".", $_POST["time"]);
            $distance = str_replace(",", ".", $_POST["distance"]);
            $id = $_POST['id'];
            if ($time != '' && $distance != '') {
                $speed = $distance/$time*3.6;                
            }
            if ($id == NULL && $dateErr == '' && $numberErr == '' && $timeErr == '' && $distanceErr == '') {
                $message = insertData($date, $number, $distance, $time, $speed, connection());
            } else if ($id != NULL && $dateErr == '' && $numberErr == '' && $timeErr == '' && $distanceErr == '' && $speedErr == '') {
                $message = updateData($id, $date, $number, $distance, $time, $speed, connection());
            }
        }
        $modalWindow = 'main';      
    } else if (isset($_POST['edit'])) {        
        $result = selectDataRow(connection(), $_POST['edit'])->fetch_assoc();
        $id = $result['id'];
        $date = $result['date'];
        $number = $result['number'];
        $time = $result['time'];
        $distance = $result['distance'];
        $speed = $result['speed'];
        $modalWindow = 'main'; 
    } else if (isset($_POST['add'])) {        
        $dateErr=$numberErr=$timeErr=$distanceErr=$speedErr='';
        $date=$number=$time=$distance=$speed='';
        $id = null;
        $modalWindow = 'main'; 
    } else if (isset($_POST['delete'])) {
        $id = $_POST['delete'];
        $modalWindow = 'delete'; 
    } else if (isset($_POST['deleteEntry'])) {
        if(!isset($_SESSION['post_id']) || ($_SESSION['post_id'] != $_POST['post_id']) ){
            $_SESSION['post_id'] = $_POST['post_id'];
            $message = deleteData($_POST['id'], connection());
            $modalWindow = 'delete'; 
        }
    }
}
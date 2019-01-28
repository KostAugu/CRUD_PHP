<?php
if (isset($_GET['offset']) && is_numeric($_GET['offset'])) {
    $offset = $_GET['offset'];
} else {
    $offset = 0;
}

if (isset($_GET['limit']) && is_numeric($_GET['limit'])) {
    $limit = $_GET['limit'];
} else {
    $limit = 10;
}


if(isset($_GET['search'])) {
    if(isset($_GET['date']) && !empty($_GET['date'])) {
        $searchParameters['date'] = $_GET['date'];
    }
    if(isset($_GET['number']) && !empty($_GET['number'])) {
        $searchParameters['number'] = $_GET['number'];
    }
    if(isset($_GET['time']) && !empty($_GET['time'])) {
        $searchParameters['time'] = $_GET['time'];
    }
    if(isset($_GET['distance']) && !empty($_GET['distance'])) {
        $searchParameters['distance'] = $_GET['distance'];
    }
    if(isset($_GET['speed']) && !empty($_GET['speed'])) {
        $searchParameters['speed'] = $_GET['speed'];
    }
    
    if(isset($_GET['dateInterval']) && count(array_filter($_GET['dateInterval']))>0) {
        $searchIntervalParameters['dateInterval'] = $_GET['dateInterval'];
    }
    if(isset($_GET['timeInterval']) && count(array_filter($_GET['timeInterval']))>0) {
        $searchIntervalParameters['timeInterval'] = $_GET['timeInterval'];
    }
    if(isset($_GET['distanceInterval']) && count(array_filter($_GET['distanceInterval']))>0) {
        $searchIntervalParameters['distanceInterval'] = $_GET['distanceInterval'];
    }
    if(isset($_GET['speedInterval']) && count(array_filter($_GET['speedInterval']))>0) {
        $searchIntervalParameters['speedInterval'] = $_GET['speedInterval'];
    }
}
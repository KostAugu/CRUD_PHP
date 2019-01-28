<?php
function selectSQL($conn, $offset, $limit, $searchParameters, $searchIntervalParameters) {
    $limit++;
    $sql = "SELECT * FROM auto.radars"; 
    

    if(!empty($searchParameters) || !empty($searchIntervalParameters)) {
        $sql .= " WHERE ";
        if(!empty($searchParameters) && !empty($searchIntervalParameters)) {            
            $sql .= searchParam($searchParameters);
            $sql .= " AND ";
            $sql .= searchIntervals($searchIntervalParameters);
        } else if (!empty($searchParameters)) {
            $sql .= searchParam($searchParameters);
        } else if (!empty($searchIntervalParameters)) {
            $sql .= searchIntervals($searchIntervalParameters);
        }
    }

    $sql .= " ORDER BY speed DESC LIMIT $limit OFFSET $offset";    
    $result = $conn->query($sql);    

    if ($result->num_rows > 0) {
        return $result; 
    } else {
        return [];
    }
}


function searchIntervals($searchIntervalParameters) {
    $sql = '';
    $count = count($searchIntervalParameters);
    foreach($searchIntervalParameters as $key => $value) {
        $key = str_replace("Interval","", $key);
        if (empty($value[0])) {
            $sql .= "$key <= $value[1] ";
        } else if (empty($value[1])) {
            $sql .= "$key >= $value[0] ";
        } else {
            $sql .= "$key BETWEEN $value[0] AND $value[1] ";
        }
        $count--;
        if ($count != 0) {
            $sql .= " AND "; 
        }
    }
    return $sql;
}

function searchParam($searchParameters) {
    $sql = '';
    $count = count($searchParameters);
    foreach($searchParameters as $key => $value) {
        $sql .= "$key LIKE '%$value%' ";
        $count--;
        if ($count != 0) {
            $sql .= " AND "; 
        }
    }
    return $sql;
}



function totalRows($conn, $searchParameters = null, $searchIntervalParameters = null) {
    $sql = "SELECT count(*) as total FROM auto.radars";   
    if(!empty($searchParameters) || !empty($searchIntervalParameters)) {
        $sql .= " WHERE ";
        if(!empty($searchParameters) && !empty($searchIntervalParameters)) {            
            $sql .= searchParam($searchParameters);
            $sql .= " AND ";
            $sql .= searchIntervals($searchIntervalParameters);
        } else if (!empty($searchParameters)) {
            $sql .= searchParam($searchParameters);
        } else if (!empty($searchIntervalParameters)) {
            $sql .= searchIntervals($searchIntervalParameters);
        }
    }
    
    $result = $conn->query($sql);   
    $row = $result->fetch_assoc(); 
    return $row['total'];
}


function selectDataRow($conn, $id) {
    $sql = "SELECT * FROM auto.radars WHERE id=$id";       
    $result = $conn->query($sql);    
    if ($result->num_rows > 0) {
        return $result; 
    } else {
        return [];
    }
}

function insertData($date, $number, $distance, $time, $speed, $conn){
    $insert = "INSERT INTO auto.radars(date, number, distance, time, speed) VALUES (?, ?, ?, ?, ?)";
    if (!($stmt = $conn->prepare($insert))) {
        die("Error: " . $conn->error);
    }                
    if (!$stmt->bind_param("ssddd", $date, $number, $distance, $time, $speed)) { 
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }
    if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;    
    } else {
        return "Įrašas įvestas sėkmingai.";
    }
}

function updateData($id, $date, $number, $distance, $time, $speed, $conn){
    $update = "UPDATE auto.radars SET date=?, number=?, distance=?, time=?, speed=? WHERE id=?";
    if (!($stmt = $conn->prepare($update))) {
        die("Error: " . $conn->error);
    }                
    if (!$stmt->bind_param("ssdddi", $date, $number, $distance, $time, $speed, $id)) { 
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }
    if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;    
    } else {
        return "Įrašas pakoreguotas sėkmingai.";
    }
}

function deleteData($id, $conn) {
    $delete = "DELETE FROM auto.radars WHERE id=?";
    if (!($stmt = $conn->prepare($delete))) {
        die("Error: " . $conn->error);
    }                
    if (!$stmt->bind_param("i", $id)) { 
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }
    if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;    
    } else {
        return "Įrašas ištrintas.";
    }
}





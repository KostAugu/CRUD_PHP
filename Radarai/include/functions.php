<?php

function createPassword($length)
{
    $chars = "abcdefghijkmnopqrstuvwxyz023456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '' ;    
    while ($i <= ($length - 1)) {
        $num = rand() % 33;
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
    }    
    return $pass;
}

function scripts() {
    ?>
            <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
            <script src="script/script.js"></script>
    <?php

}

function displayModal($modalWindow) {
    if ($modalWindow == 'delete') {
        echo "<script>$('#deleteForm').modal({backdrop: 'static', keyboard: false}, 'show');</script>";
    } else if ($modalWindow == 'main') {        
        echo "<script>$('#mainForm').modal({backdrop: 'static', keyboard: false}, 'show');</script>";        
    }
}

function offsetLink () {
    $params = [];
    foreach ($_GET as $key => $value) {
        if($key !='offset') {
            $params[$key] = $value;
        }
    }
    $new_query_string = http_build_query( $params );
    return $new_query_string;
}


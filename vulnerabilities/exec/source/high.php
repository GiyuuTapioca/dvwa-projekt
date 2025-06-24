<?php
if( isset( $_POST[ 'Submit' ] ) ) {
    $target = $_POST[ 'ip' ];

    if (filter_var($target, FILTER_VALIDATE_IP)) {
        $cmd = shell_exec( "ping -c 4 " . escapeshellarg($target) );
        echo "<pre>{$cmd}</pre>";
    } else {
        echo "<pre>Invalid IP address</pre>";
    }
}
?>

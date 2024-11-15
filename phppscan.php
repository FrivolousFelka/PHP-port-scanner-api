<?php
if(!empty($_GET['host'])) {  
    //list of port numbers to scan
    $ports = array(21, 22, 23, 25, 53, 80, 443, 110, 1433, 3306, 8080);
    
    $results = array();
    foreach($ports as $port) {
        if($pf = @fsockopen($_GET['host'], $port, $err, $err_string, 1)) {
            $results[$port] = true;
            fclose($pf);
        } else {
            $results[$port] = false;
        }
    }
    
    echo "Port Scan on $_GET[host]";
    echo "\n"; 
    foreach($results as $port=>$val) {
        $prot = getservbyport($port,"tcp");  
                echo "\n";                                                
                echo "$port ";
                
        if($val) {
            echo " Open ";
        }
        else {
            echo " Closed ";
        }
    }
}
?>

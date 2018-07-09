<?php
//include database configuration file
include 'dbconfig.php';
date_default_timezone_set('Africa/Lagos');

//get records from database
$sql=$conn->prepare("SELECT * FROM newsletter ORDER BY id DESC");
$sql->execute();
if($sql){
    $delimiter = ",";
    $filename = "members_" . date('Y-m-d') . ".csv";
    
    //create a file pointer
    $f = fopen('php://memory', 'w');
    
    //set column headers
    $fields = array('ID', 'Name', 'Email');
    fputcsv($f, $fields, $delimiter);
    
    //output each row of the data, format line as csv and write to file pointer
    while($row = $sql->fetch()){
        $lineData = array($row['id'], $row['name'], $row['email']);
        fputcsv($f, $lineData, $delimiter);
    }
    
    //move back to beginning of file
    fseek($f, 0);
    
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    
    //output all remaining data on a file pointer
    fpassthru($f);
}
exit;

?>
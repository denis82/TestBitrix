<?php 
$dbh = new PDO('mysql:host=localhost;dbname=telegind_db', 'telegind', 'FvGsvxAN');

foreach($dbh->query('SELECT table_name FROM INFORMATION_SCHEMA.TABLES') as $row) {
        if($row[table_name]{0} === b ) {
        
        $dbh->query('drop table '.$row[table_name]);
        }
        print_r( $row[table_name]);print_r( '<br>');
    }
?>
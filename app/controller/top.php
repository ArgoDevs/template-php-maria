<?php


// SQL query
$sql = "SELECT @@version;";  // Change to your table name and query


if (isset($page)) {

    #database connection 
    #require("../app/config.php");
    #$result = $connection->query($sql);

    switch ($page) {
        case "index.php":

            break;

    }
    

} else {
    // Handla il caso in cui ti scordi od ometti $page=
}
?>



<?php
$title = "title";
$description = "a long description";
$page =  basename($_SERVER['PHP_SELF']);

# loads the required queries from top controller
# using $page
require('../app/controller/top.php');
# HTML START --------

require('layout/intestazione.php');
require('layout/header.php');
?>

<!-- content -->
<div class="wrapper">

    <h1>Welcome to my PHP page!</h1>
    <p>This is a simple PHP page.</p>

</div >  



<?php
require('layout/footer.php');
?>

<!-- end html-->
<?php # not closing this is common in php
require('../app/controller/bottom.php');



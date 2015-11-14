<?php



if(isset ($_GET['callback']))
{
    header("Content-Type: application/json");

    
    echo $_GET['callback']. '(' . json_encode($_GET['devicetoken']) . ');';

}
?>

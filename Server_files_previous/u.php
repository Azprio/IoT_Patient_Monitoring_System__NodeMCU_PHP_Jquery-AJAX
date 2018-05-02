<?php
$myfile = fopen("pulse.txt", "w") or die("Unable to open file!");
$txt = $_GET["p"];
fwrite($myfile, $txt);
fclose($myfile);


$myfile1 = fopen("temp.txt", "w") or die("Unable to open file!");
$txt1 = $_GET["t"];
fwrite($myfile1, $txt1);
fclose($myfile1);


$myfile2 = fopen("system.txt", "w") or die("Unable to open file!");
$txt2 = $_GET["s"];
fwrite($myfile2, $txt2);
fclose($myfile2);


$myfile3 = fopen("oxygen.txt", "w") or die("Unable to open file!");
$txt3 = $_GET["o"];
fwrite($myfile3, $txt3);
fclose($myfile3);
?>
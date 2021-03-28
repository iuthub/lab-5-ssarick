<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Buy Your Way to a Better Education!</title>
    <link href="http://www.cs.washington.edu/education/courses/cse190m/09sp/labs/4-buyagrade/buyagrade.css"
          type="text/css" rel="stylesheet"/>
</head>
<?php if ($_SERVER["REQUEST_METHOD"] != 'POST') { ?>
    <h2>Not a post method</h2>
    

<?php }elseif
(isset($_POST['StudentName']) and (isset($_POST["sections"])) and (isset($_POST['credit_card'])) and (
isset($_POST['Visa']))) {
if (($_POST['StudentName'] != "") and ($_POST['StudentName'] != " ") and ($_POST["sections"] != "") and
($_POST["sections"] != " ") and ($_POST['credit_card'] != "") and ($_POST['credit_card'] != " ") and
($_POST['Visa'] != "")){
$filename = 'suckers.txt';
$contents = file($filename);
$a = $_POST['StudentName'];
$b = $_POST['sections'];
$e = $_POST['credit_card'];
$d = $_POST['Visa'];
$g = TRUE;
foreach ($contents as $line) {
    if ((str_contains($line, $a) == TRUE) and (str_contains($line, $d) == TRUE) and
        (str_contains($line, $b) == TRUE) and (str_contains($line, $e) == TRUE)) {
        $g = FALSE;
    }
}
if ($g == TRUE){


$data = $_POST['StudentName'] . ";" . $_POST["sections"] . ";" . $_POST['credit_card'] . ";" . $_POST['Visa'] . "\n";
$fp = fopen('suckers.txt', 'a');
fwrite($fp, $data);
fclose($fp);
?>
<body>
<h1>Thanks, sucker!</h1>

<p>Your information has been recorded.</p>

<dl>
    <dt>Name</dt>
    <dd><?= $_REQUEST["StudentName"] ?></dd>

    <dt>Section</dt>
    <dd><?= $_REQUEST["sections"] ?></dd>

    <dt>Credit Card</dt>
    <dd><?= $_REQUEST["credit_card"] ?><?php if (($_REQUEST["Visa"] == "Visa")) {
            print "(visa)";
        } elseif (($_REQUEST["Visa"] == "Master")) {
            print "(master card)";
        } ?></dd>
</dl>
<pre>
<h2>Here are all suckers:</h2>
<?= file_get_contents("suckers.txt"); ?>
</pre>
<?php } else {
    ?>
    <h1>Sorry</h1>
    <h3>There is already same data. <a href="buyagrade.php">Please try again</a></h3>
<?php }
} else { ?>

    <h1>Sorry</h1>
    <h3>Not all info were completed. <a href="buyagrade.php">Please try again</a></h3>
    <?php
}
} else { ?>
    <h1>Sorry</h1>
    <h3>Not all info were completed. <a href="buyagrade.php">Please try again</a></h3>
    <?php

} ?>

</body>

</html>  
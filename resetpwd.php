<?php
require_once "./utils/session_start.php";



if (!isset($_SESSION["role"])) $_SESSION["role"] = "unknown";


$method = $_SERVER["REQUEST_METHOD"];

echo $method;
$viewmodel = getResetPasswordViewModel(); 

$content = <<<FORM
<div><input type="text" name="oldpassword" value=$viewmodel.x1/></div>
<div><input type="text" name="newpassword" value=$viewmodel.newpassword/></div>
<div><input type="text" name="repeatnewpwd" value=$viewmodel.repeatnewpwd/></div>
FORM;

include_once("./layout/public.php");
?>
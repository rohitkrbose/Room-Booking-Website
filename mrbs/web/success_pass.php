<?php

require "defaultincludes.inc";
require_once "version.inc";

print_header($day, $month, $year, $area, isset($room) ? $room : "");
?>

<form class="form_general" id="logon" style= "width: 380px; margin: 0 auto; margin-top: 200px;" method="post">
  <fieldset>
  <legend><?php echo "Your password has been sent to your e-mail." ?></legend>
  </fieldset>
</form>

<meta http-equiv="refresh" content="4;url=index.php" />

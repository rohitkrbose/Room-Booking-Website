<?php

// $Id$

require "defaultincludes.inc";
require_once "version.inc";

print_header($day, $month, $year, $area, isset($room) ? $room : "");

?>

<form class="form_general" id="logon" method="post" style= "width: 300px; margin: 0 auto; margin-top: 150px;" action="forgot_handler.php">
  <fieldset>
  <legend style = "margin-left: 74px;"><?php echo "Recover password" ?></legend>
    <div>
      <label for="NewUserName"><?php echo "E-mail" ?>:</label>
      <input type="text" id="NewUserName" name="usermail">
    </div>
    <div style = "margin-left: 62px;" id="recover_pass">
      <input class="submit" type="submit" value=" <?php echo "Go" ?> ">
    </div>
  </fieldset>
</form>

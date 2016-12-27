<?php
include("config.php");
$def = $db->selecto("SELECT * FROM not_def");
$def = $def[0];
$temat = $def['subject'];
$wiad = $def['message'];
$head = $def['headers'];
print <<<KOD
<b>Temat wiadomości:</b><br>
<input type="text" class="form-control" id="defTitle" value="$temat"/><br>
<b>Treść wiadomości:</b><br>
<textarea class="form-control" id="defMess">$wiad</textarea><br>
<b>Nagłówki:</b><br>
<textarea class="form-control" id="defHead">$head</textarea>
KOD;
?>

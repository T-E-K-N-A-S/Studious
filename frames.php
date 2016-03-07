<!DOCTYPE html>
<html>
<?php
$cat=$_GET["cat"];


echo "<frameset cols='10%,*'>
  <frame name='leftpane' src='menu.php?cat=$cat' noresize='noresize'>
  <frame name='frm' src='frame2.php?semin=3' noresize='noresize'>
  
</frameset>";
?>
</html>

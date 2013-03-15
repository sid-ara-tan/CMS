<?php echo "<input type='hidden' id='total_hidden' name='total_hidden' value='$total_marks' />";?>
<p style="color: red"><?php if(isset($error_message))echo $error_message;?></p>
<h2>Total: <?php echo '<font color="red">'.$total_marks.'</font>';?></h2>

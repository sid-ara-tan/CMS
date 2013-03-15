<div class="demo">
    <b><font color="red"><?php echo $notification_send; ?></font></b>
    <h1>Send Message/Assignment/File to Course Teacher : </h1>
    
    <?php
    if ($query_teacher->num_rows()>0) {
        echo '<div class="demo" align="center" style="border:solid">';
        echo "<br><h2>Select Course Teacher</h2>";
        
        ?>

        <select id="select_ct" name="selectct" onchange="load_send_form(this.value)">
            <option value="" selected="selected">Select</option>
            <?php
            foreach ($query_teacher->result_array() as $row) {
                ?>
                <option value="<?php echo $row['T_Id']; ?>"><?php echo $row['Name']; ?></option>

            <?php } ?>
        </select>

        <?php
        echo '<br><br></div>';
    }
    else
        echo heading('-No Course Teacher Found !-', 3);
    ?>
</div>


  <style type="text/css" title="currentStyle">
    @import "<?php echo base_url();?>jquery/admin/DataTables/media/css/demo_table.css";
</style>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
    $('.member_table').dataTable({
        "bJQueryUI": true,
        "sDom": '<"top"iflp<"clear">>rt<"bottom"ifp<"clear">>'
    });
} );
</script>


<p><h1>All Members List </h1></p>   
<?php
$tmpl = array ( 'table_open'  => '<table  class="display member_table">');

if ($query_std_list != FALSE) {

    $this->table->set_template($tmpl);
    $this->table->set_heading('ID', 'Name', 'E Mail','Action');

    foreach ($query_std_list->result_array() as $row) {

        $this->table->add_row($row['S_Id'], $row['Name'], $row['email'],'');
    }
    echo $this->table->generate();
} else {
    echo "<font color='red'> No Data Available" . '</font>';
    echo br(20);
}
?>
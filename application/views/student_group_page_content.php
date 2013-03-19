<style type="text/css" title="currentStyle">
    @import "<?php echo base_url(); ?>jquery/admin/DataTables/media/css/demo_table.css";
</style>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('.content_table_file').dataTable({
            "bJQueryUI": true,
            "sDom": '<"top"iflp<"clear">>rt<"bottom"ifp<"clear">>'
        });
    } );
</script>


<h1>All Course content :- </h1><br>
<?php
$tmpl = array('table_open' => '<table  class="display content_table_file">');
$this->table->set_template($tmpl);
$this->table->set_heading('Topic','File (Click To Download)', 'Description', 'Uploaded By', 'Date');

if ($record_content != FALSE) {
    foreach ($record_content as $row_record) {

        $this->table->add_row(
                $row_record->Topic,anchor('student_home_group/download_file/' . $courseno . '/' . $row_record->File_Path, $row_record->File_Path), $row_record->Description, $row_record->Uploader, $row_record->Upload_Time);
    }
    echo $this->table->generate();
} else {
    echo "<font color='red'> No Data Available" . '</font>';
    echo br(20);
}
?>
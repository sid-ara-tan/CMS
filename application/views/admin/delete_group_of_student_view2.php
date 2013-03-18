
<div align="center" class="search_header">
    <hr/>
    <span style="font-size: 24px;"><?php echo 'Level:'.$sLevel.' '.'Term:'.$Term;?></span>
</div>

<script>
    $(function () {
        $('#select-all').change(function (event) {
           var selected = this.checked;
           $('#table_check :checkbox').each(function (){
               this.checked = selected;
           });
       });
    });
</script>


<div id="table_check">
    <form action="<?php echo site_url('admin/student/delete_group_of_student2'); ?>"
          method="post" accept-charset="utf-8"
          onsubmit="return confirm('Are you sure?')">
        
        
    <table class="tablesorter" cellspacing="0">
        <tbody>
            <tr>
            <td>Select All<br/><input type="checkbox"  name="select-all" id="select-all" /></td>
            <td><h1>Select students to delete</h1></td>
            <td><?php echo form_submit('ok','Delete','id="list_of_student_submit"');?></td>
            </tr>
        </tbody>
    </table>
   <table class="tablesorter" cellspacing="0">
    <thead>
        <tr><th>Select</th>
            <th>Student ID</th>
            <th>Name</th>
            <th>Running</th>
            <th>Failed</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($student_by_level_term->result() as $student):?>
        <tr>
            <td><?php if($has_running[$student->S_Id]||$has_failed[$student->S_Id]):?>N/A <?php else:?>
                <input type="checkbox" name="taken_list[]" value="<?php echo $student->S_Id;?>" /><?php endif;?></td>
            <td><?php echo $student->S_Id;?></td>
            <td><?php echo $student->Name?></td>
            <td><?php if($has_running[$student->S_Id]):?>
                Yes<?php else:?>No<?php endif;?></td>
            <td><?php if($has_failed[$student->S_Id]):?>
                Yes<?php else:?>No<?php endif;?></td>

        </tr>
        <?php endforeach;?>
    </tbody>
     <tfoot>
    </tfoot>
</table>
    </form>
</div>

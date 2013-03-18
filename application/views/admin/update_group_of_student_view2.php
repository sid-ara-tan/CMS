
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
    <form action="<?php echo site_url('admin/student/update_group_of_student2'); ?>"
          method="post" accept-charset="utf-8"
          onsubmit="return confirm('Are you sure?')">
        <div align="center">
            <h1>Update to:</h1>
            <table>
                <tbody>
                    <?php
                        $options=array(
                            '1'=>'1',
                            '2'=>'2',
                            '3'=>'3',
                            '4'=>'4'
                        );
                    ?>
                    <tr>
                        <td><?php echo form_label('Level','sLevel');?></td>
                        <td><?php echo form_dropdown('sLevel',$options,set_select('sLevel'),'id="sLevel"');?></td>
                    </tr>
                     <?php
                    $options=array(
                            '1'=>'1',
                            '2'=>'2'
                        );
                    ?>
                    <tr>
                        <td><?php echo form_label('Term','Term');?></td>
                        <td><?php echo form_dropdown('Term',$options,set_value('Term'),'id="Term"');?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <hr />
    <table class="tablesorter" cellspacing="0">
        <tbody>
            <tr>
            <td>Select All<br/><input type="checkbox"  name="select-all" id="select-all" /></td>
            <td><h1>Select student to update</h1></td>
            <td><?php echo form_submit('ok','Update','id="list_of_student_submit"');?></td>
            </tr>
        </tbody>
    </table>
   <table class="tablesorter" cellspacing="0">
    <thead>
        <tr><th>Select</th>
            <th>Student ID</th>
            <th>Name</th>
            <th>Section</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($student_by_level_term->result() as $student):?>
        <tr>
            <td>
                <input type="checkbox" name="taken_list[]" value="<?php echo $student->S_Id;?>" /></td>
            <td><?php echo $student->S_Id;?></td>
            <td><?php echo $student->Name?></td>
            <td><?php echo $student->Sec;?></td>

        </tr>
        <?php endforeach;?>
    </tbody>
     <tfoot>
    </tfoot>
</table>
    </form>
</div>

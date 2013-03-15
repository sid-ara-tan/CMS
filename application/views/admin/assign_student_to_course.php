<?php
    $data['title']=$title;
    $this->load->view('admin/template/header',$data);
?>

</head>

<body>

<?php
    $data['toolbar']=array(
        'Home'=>  site_url('admin/admin')
    );
    $data['current']='Assign Student To Course';

    $this->load->view('admin/template/toolbar',$data);
?>

<?php
    include 'template/toolbar_config.php';
    $this->load->view('admin/template/navigator',$data);
?>

    <section id="main" class="column">
        <article class="module width_full shadow " id="page_tabs">
            <?php include_once 'function/course_selection.php'; ?>
        </article>
    </section>



<?php $this->load->view('admin/template/footer');?>
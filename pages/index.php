<?php include('_header.php');?>
<?php include('_topmenu.php');?>

<h1>Index page</h1>

<?php

    $db = Zend_Registry::get('db');
    //var_dump($db);
    $q = $db->select()->from('post')->limit(5);
    $posts = $db->fetchAll($q);

?>

<table>
    <?php foreach ($posts as $post):?>
        <tr>
            <?php foreach($post as $key => $val):?>
                <td><?php echo $val;?></td>
            <?php endforeach;?>
        </tr>
    <?php endforeach;?>

</table>

<?php include('_footer.php');?>

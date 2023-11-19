<?php
use yii\helpers\Html;
?>

<style>
    table th,td{
        padding: 10px;
    }
</style>

<table border="1">
    <tr>
        <th>Full_name</th>
        <th>status</th>
        <th>id</th>
        <th>Action</th>
    </tr>

    <?php foreach($model as $field){ ?>
        <tr>
            <td><?= $field->username; ?></td>
            <td><?= $field->status; ?></td>
            <td><?= $field->id; ?></td>
            <td><?= Html::a("Edit", ['user/edit', 'id' => $field->id]); ?></td>
        </tr>
    <?php } ?>
</table>
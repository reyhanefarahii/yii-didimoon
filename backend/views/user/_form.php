<?php
use common\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'username'); ?>
<?= $form->field($model, 'id'); ?>
<?= $form->field($model, 'status'); ?>

<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>

<?php ActiveForm::end(); ?>
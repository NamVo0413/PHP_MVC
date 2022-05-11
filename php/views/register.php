<?php /**@var $model \app\models\User  */?>
<h1>Register</h1>
<?php ?>
<?php $form= app\core\form\Form::begin("","post")?>
    <?php echo $form->field($model,'email') ?>
    <?php echo $form->field($model,'pass')->fieldPassword() ?>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php app\core\form\Form::end()?>


<?php

use app\models\SystemUser;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SystemUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="system-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['type' => 'Password']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

   

    <?= $form->field($model, 'privileges')->radioList(SystemUser::PrivilegesOptionArr()) ?>

    <?= $form->field($model, 'data_status')->radioList(SystemUser::DataStatusOptionArr()) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Employee;


/* @var $this yii\web\View */
/* @var $model app\models\Employee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_status')->radioList(Employee::DataStatusOptionArr())?>
    
    <?= $form->field($model, 'employee_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'working_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    
    

</div>

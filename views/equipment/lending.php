<?php

use app\models\Employee;
use app\models\LendingHistory;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Equipment */

$this->title = $model->code;
$this->params['breadcrumbs'][] = ['label' => 'Equipments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="equipment-view">
<?= Html::a('設備情報', ['view', 'id' => $model->id], ['class' => 'btn btn-info']) ?>

    
    <h1>貸出登録</h1>

    <table class="table table-striped table-bordered">
        <tr>
            <th>製品名</th>
            <th>会社員</th>
            <th>貸出先</th>
            <th>貸出日</th>
            <th>返却日</th>
            
            <th>コメント</th>
           
        </tr>


        <?php foreach ($model->employees as $employee){ ?>
        <?php 
            $lendingHistory = LendingHistory::findOne(['equipment_id'=>$model->id,'employee_id'=>$employee->id]);
        ?>
      
       
        <tr>
        　　<td> <?= $lendingHistory->equipment->name ?></td>
            <td> <?= $lendingHistory->employee->name ?></td>
            <td><?= $lendingHistory->borrower_name ?></td>
            <td><?= $lendingHistory->lending_date ?></td>
            <td><?= $lendingHistory->return_date ?></td>
         
            <td><?= $lendingHistory->remarks ?></td>
         
           
         
         
            
        </tr>
        <?php } ?>
        
        
        
        
        
    </table>
    <?php $form = ActiveForm::begin([
        'action' =>['create-lending-history'],
    ]); ?>
    
    <?php 
        $lendingHistory = new LendingHistory(['equipment_id'=>$model->id]);
        $employees = Employee::find()->all();
        $employeeMap = [];
        foreach ($employees as $employee){
            $employeeMap[$employee->id] = $employee->name;
        }
    ?>
    <div class="row">
        <div class="col-md-6">
     <?= $form->field($lendingHistory,'equipment_id')->hiddenInput()->label(false) ?>
    
    <?= $form->field($lendingHistory,'employee_id')->dropDownList($employeeMap,[
        'prompt'=>'Select Employee'
    ]) ?>
     <?= $form->field($lendingHistory, 'borrower_name')->textarea(['rows' => 1]) ?>

     <?= $form->field($lendingHistory, 'lending_date')->textInput(['type'=>'date']) ?>

     <?= $form->field($lendingHistory, 'return_date')->textInput(['readonly'=>true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($lendingHistory, 'remarks')->textarea(['rows' => 6]) ?>
        </div>
    </div>

     

    
    
    
    
    
    <div class= "form-group">
    
    <?= Html::submitButton('登録',['class'=>'btn btn-success']) ?>
    </div>
   
    <?php ActiveForm::end() ?>
   
    
 


　　

        



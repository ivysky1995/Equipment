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


  
    <h1>返却登録</h1>

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
        'action' =>['create-return-history'],
    ]); ?>
    <?php 
        $newLendingHistory = new LendingHistory([
            'equipment_id'=>$lendingHistory->equipment_id,
            'employee_id'=>$lendingHistory->employee_id,
            'remarks'=>$lendingHistory->remarks,
            'borrower_name'=>$lendingHistory->borrower_name,
            'lending_date'=>$lendingHistory->lending_date,
            
        ]);
        
    ?>
    

    <div class="row">
    <div class="col-md-6">
        <?= $form->field($newLendingHistory,'equipment_id')->hiddenInput()->label(false) ?>
        <?= $form->field($newLendingHistory,'employee_id')->hiddenInput()->label(false) ?>
        <?= $form->field($newLendingHistory, 'borrower_name')->textInput(['readonly' => true]) ?>

        <?= $form->field($newLendingHistory, 'lending_date')->textInput(['readonly' => true]) ?>

        <?= $form->field($newLendingHistory, 'return_date')->textInput(['type' => 'date']) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($newLendingHistory, 'remarks')->textarea([
            'rows' => 6,
            'readonly' => true,
        ]) ?>
    </div>
</div>

     

     

    
    
    
    
    
    <div class= "form-group">
    
    <?= Html::submitButton('保存',['class'=>'btn btn-success']) ?>
    </div>
   
    <?php ActiveForm::end() ?>
   
    
 


　　

        



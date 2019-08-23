<?php

use app\models\Employee;
use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel app\models\EmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app','Employees');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app','Create Employee'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

       
            'name',
            [
                'attribute'=>'data_status',
//                'content'=>function($model){
//                      if($model->data_status==1){
//                          return '<span class="label label-success">�ʏ�</span>';
//                      }else{
//                          return '<span class="label label-danger">�폜</span>';
//                      }
       
//                },
                  'filter'=> Employee::DataStatusOptionArr(),
                'value'=> 'dataStatusStr',
                
            ],
            
            'employee_no',
            [
                'attribute'=>'working_status',
                'filter'=>Employee::WorkingStatusOptionArr(),
                'value'=>'WorkingStatusStr',
            ],
                        

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view}{update}',
                'buttons'=>[
                    'view' =>function($url,$model){
                     return Html::a('View',$url,['class'=>'btn btn-xs btn-primary']);
                    },
                    'update' =>function($url,$model){
                    return Html::a('Update',$url,['class'=>'btn btn-xs btn-success']);
                    },
                   
                ],
                
                
            ],
        ],
    ]); ?>


</div>

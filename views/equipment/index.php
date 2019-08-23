<?php

use app\models\Equipment;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EquipmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '設備';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('設備追加', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           
            'code',
            [
                'attribute'=>'category_id',
                'filter'=>Equipment::typeOptionArr(),
                'value'=> 'typeStr',

            ],
            'name',
            //'model_number',
            //'serial_number',
            //'specification',
            //'accessory:ntext',
            //'remarks:ntext',
            //'buy_date:datetime',
    
            //'payment_amount:currency',
            [
                'attribute'=>'equipment_status',
                'filter'=>Equipment::EquipmentStatusOptionArr(),
                'value'=>'EquipmentStatusStr',
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

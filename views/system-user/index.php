<?php

use app\models\SystemUser;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SystemUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'System Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create System User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          
            'username',
            
            'email:email',
            
            [
                'attribute'=>'privileges',
                'filter'=>SystemUser::PrivilegesOptionArr(),
                'value'=>'privilegesStr'
            ],
            [
                'attribute'=>'data_status',
                'filter'=>SystemUser::DataStatusOptionArr(),
                'value'=>'dataStatusStr'
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

<?php

use app\models\Category;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app','Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app','Create Category'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute'=>'data_status',
                'value'=>'DataStatusStr',
                'filter'=>Category::DataStatusOptionArr(),
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

<?php

use app\models\Employee;
use app\models\LendingHistory;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LendingHistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app','Lending Histories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lending-history-index">

    <h1><?= Html::encode($this->title) ?></h1>

   

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          
            [
                'attribute'=>'employee_id',
             
            ],
            'borrower_name',
            'equipmentName',
            'lending_date',
            'return_date',
            'remarks:ntext',
            

            
        ],
    ]); ?>


</div>

<?php

use app\models\LendingHistory;
use app\models\Equipment;
use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\Equipment */

$this->title = $model->code;
$this->params['breadcrumbs'][] = ['label' => 'Equipments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="equipment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('編集', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('削除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('貸出', ['lending', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('返却', ['return', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
       
            'code',
            'typeStr',
            'name',
            'model_number',
            'serial_number',
            'specification',
            'accessory:ntext',
            'remarks:ntext',
            'buy_date',
            'payment_amount',
            'equipmentStatusStr',
        ],
    ]) ?>
      

        

</div>

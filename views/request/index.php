<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Request', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'datetime',
                'format' => ['date', 'php:Y-m-d']
            ],
            [
                'label' => 'Фото заявки',
                'attribute' => 'photo_to',
                'format' => 'html',
                'value' => function ($data) {
                    return "<img src='$data->photo_to' style='width: 100px'>";
                },
            ],
            'name',
            'description:ntext',
            'category.name',
            [
                'label' => 'Статус заявки',
                'attribute' => 'status',
                'value' => function ($data) {
                    if ($data->status == 0) return 'Новая';
                    if ($data->status == 1) return 'Завершена';
                    if ($data->status == 2) return 'Отменена';

                },
                'filter' => ['0' => 'Новая', '1' => 'Решена', '2' => 'Отклонена'],
                'filterInputOptions' => ['prompt' => 'Все статусы', 'class' => 'form-control', 'id' => null]
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

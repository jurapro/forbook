<?php
/* @var $this yii\web\View */

use yii\grid\GridView;
use yii\helpers\Html; ?>
<h1>Административная панель сайта</h1>
<p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'category.name',
        'user.full_name',
        'name',
        'description:ntext',
        [
            'label' => 'Статус заявки',
            'attribute' => 'status',
            'value'=>function ($data) {
                if ($data->status==0) return 'Новая';
                if ($data->status==1) return 'Завершена';
                if ($data->status==2) return 'Отменена';

            },
            'filter' => ['0' => 'Новая', '1' => 'Решена', '2' => 'Отклонена'],
            'filterInputOptions' => ['prompt' => 'Все статусы', 'class' => 'form-control', 'id' => null]
        ],
        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>
</p>

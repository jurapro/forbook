<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

use yii\helpers\Html;
use yii\widgets\DetailView; ?>

    <div id="requests">
        <h1>Количество решенных заявок <span><?= $count; ?></span></h1>
    </div>

<?php
$this->registerJsFile(
    '@web/js/index.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

$this->registerCssFile("@web/css/main.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
]);

foreach ($requests as $model) {

    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'datetime',
            'name',
            'category.name',
            [
                'label' => 'Изображение',
                'format' => 'html',
                'value' =>"<div class='request' style='background-image: url($model->photo_to)'>
                <div class='img_request' style='background-image: url($model->photo_after)'></div>
                </div>",

            ],
        ],
    ]);
}

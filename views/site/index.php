<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

    <div id="requests">
        <h1>Количество решенных заявок <span><?= $count; ?></span></h1>
    </div>

<?php
$this->registerJsFile(
    '@web/js/index.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
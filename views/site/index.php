<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

use yii\widgets\Pjax; ?>
<div>
    <?php Pjax::begin(['id' => 'requests']); ?>
    <h1>Количество решенных заявок <span><?=$count;?></span></h1>
    <?php Pjax::end(); ?>
</div>
<?php
$this->registerJsFile(
    '@web/js/index.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
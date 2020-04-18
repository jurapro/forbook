<?php

/* @var $this yii\web\View */

$this->title = 'Главная страница';

$this->registerJsFile(
    '@web/js/index.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
$this->registerCssFile("@web/css/main.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
]);
?>
<div id="requests">
    <h1 class="cover-heading">Количество решенных заявок <span><?= $count; ?></span></h1>
</div>


<div class="row">
    <?php
    foreach ($requests as $model) {
        ?>

        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="<?= $model->photo_after; ?>" alt="<?= $model->name; ?>"
                     data-img-to="<?= $model->photo_to; ?>"
                     data-img-after="<?= $model->photo_after; ?>">
                <div class="caption">
                    <h3><?= $model->name; ?></h3>
                    <p><?= $model->datetime; ?></p>
                    <p><?= $model->category->name; ?></p>
                </div>
            </div>
        </div>

        <?php
    }
    ?>
</div>

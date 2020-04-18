<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Мои заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?> <?= Html::a('Подать заявку', ['create'], ['class' => 'btn btn-success']) ?></h1>

    <?php
    foreach ($requests as $model) {
        ?>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="<?= $model->photo_to; ?>" alt="<?= $model->name; ?>">
                <div class="caption">
                    <h3><?= $model->name; ?></h3>
                    <p><?= $model->datetime; ?></p>
                    <?php
                        if ($model->status == 0) echo '<p class="bg-info">Новая</p>';
                        if ($model->status == 1) echo '<p class="bg-success">Завершена</p>';
                        if ($model->status == 2) echo '<p class="bg-danger">Отменена</p>>';
                        ?>
                    <p><?= $model->category->name; ?></p>
                    <p><?= $model->description; ?></p>
                </div>
            </div>
        </div>

        <?php
    }
    ?>

</div>

<?php

use app\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Мои заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?> <?= Html::a('Подать заявку', ['create'], ['class' => 'btn btn-success']) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
    <?php echo $form->field($request, 'status')
        ->dropDownList(
            ['-1' => 'Все', '0' => 'Новая', '1' => 'Завершена', '2' => 'Отменена'],
            [
                'onchange' => "$.pjax.reload({container: '#requests', data: {status: $(this).val()}});",
            ]) ?>
    <?php ActiveForm::end(); ?>

    <?php Pjax::begin(['id' => 'requests']); ?>
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
                    if ($model->status == 2) echo '<p class="bg-danger">Отменена</p>';
                    ?>
                    <p><?= $model->category->name; ?></p>
                    <p><?= $model->description; ?></p>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <?php Pjax::end(); ?>

</div>

<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Request */

$this->title = 'Выполнение заявки: ' . $model->name;
?>
<div class="request-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="request-form">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?>

        <?= $form->field($model, 'imageFile')->fileInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

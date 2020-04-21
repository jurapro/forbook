<?php
/* @var $this yii\web\View */

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax; ?>
<h1>Пользовательские заявки</h1>

<?php $form = ActiveForm::begin(); ?>
<?php echo $form->field($model, 'id_user')
    ->dropDownList($users,
        [
            'onchange' => "$.pjax.reload({container: '#my', data: {id_user: $(this).val()}});",
            'prompt' => 'Выбор пользователя',
        ]) ?>

<?php Pjax::begin(['id' => 'my']); ?>
    <?php echo $form->field($model, 'id')->dropDownList($requests,
        [
            'prompt' => 'Выбор заявок',
        ]) ?>
<?php Pjax::end(); ?>

<?php ActiveForm::end(); ?>




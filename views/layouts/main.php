<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="container">
    <div class="header clearfix">
            <?php
            echo Nav::widget([
                'options' => ['class' => 'nav nav-pills pull-right'],
                'items' => [
                    ['label' => 'Главная', 'url' => ['/site/index']],
                    ['label' => 'Регистрация', 'url' => ['/user/create'], 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Личный кабинет', 'url' => ['/request/index'], 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Панель администрирования сайта', 'url' => ['/admin/index'],
                        'visible' => !Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin()],
                    Yii::$app->user->isGuest ? (
                    ['label' => 'Вход', 'url' => ['/site/login']]
                    ) : (
                        '<li>'
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                            'Выход (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm()
                        . '</li>'
                    )
                ],
            ]);
            ?>
        <h3 class="text-muted">Сайт сознательных граждан</h3>
    </div>

    <div class="row marketing">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>

</div> <!-- /container -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

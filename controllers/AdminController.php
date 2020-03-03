<?php

namespace app\controllers;

use app\models\Request;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;

class AdminController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['*'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'roles' => ['@'],
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->isAdmin();
                        }
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Request::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);

    }

}

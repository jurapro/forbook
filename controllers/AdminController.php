<?php

namespace app\controllers;

use app\models\Request;
use app\models\User;
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
                        'actions' => ['index', 'users'],
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

    public function actionUsers($id_user = 0)
    {
        $model = new Request();

        $users = User::find()
            ->select(['full_name'])
            ->indexBy('id')
            ->column();

        $requests = Request::find()
            ->select(['name'])
            ->where(['id_user' => $id_user])
            ->indexBy('id')
            ->column();

        return $this->render('users', [
            'requests' => $requests,
            'users' => $users,
            'model' => $model,
        ]);
    }

}

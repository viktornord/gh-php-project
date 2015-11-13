<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 13/11/15
 * Time: 23:58
 */

namespace backend\controllers;


use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\rest\Controller;

class HomeController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                    ],
                ],
            ]
        ];
    }

    public function actionIndex() {
        return $this->render('index');
    }

}
<?php

namespace ityakutia\callback\controllers;

use ityakutia\callback\models\Callback;
use ityakutia\callback\models\CallbackSearch;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class BackController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['callback']
                    ]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST']
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        $searchModel = new CallbackSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        Url::remember();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]); 
    }

    public function actionView($id)
    {
        $model = $this->findModel($id);

        return $this->render('view', [
            'model' => $model,
        ]); 
    }

    public function actionChangeStatus($id, $status)
    {
        $model = $this->findModel($id);
        if (array_key_exists($status, $model::STATUSES)) {
            $model->status = $status;
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Статус успешно задан!');
            } else {
                Yii::$app->session->setFlash('error', 'Статус не изменен!');
            }
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $this->redirect(Url::previous());
    }

    public function actionDelete($id)
    {
        if(false !== $this->findModel($id)->delete()) {
            Yii::$app->session->setFlash('success', 'Запись успешно удалена!');
        }

        return $this->redirect(Url::previous());
    }

    protected function findModel($id)
    {
        $model = Callback::findOne($id);
        if(null === $model) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $model;
    }
}
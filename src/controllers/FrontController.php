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

class FrontController extends Controller
{
    public function actionCreate()
    {
        $view = Yii::$app->params['custom_view_for_modules']['callback_front']['create'] ?? 'create';
        $form_view = Yii::$app->params['custom_view_for_modules']['callback_front']['_form'] ?? '_form';

        $model = new Callback();
        $model->hash = Yii::$app->security->generateRandomString(22) . time();

        if($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Запись успешно создана!');
            return $this->redirect(Url::toRoute(['/callback/front/thanks', 'hash' => $model->hash]));
        }

        return $this->render($view, [
            'model' => $model,
            'form_view' => $form_view,
        ]);
    }

    public function actionThanks($hash)
    {
        $view = Yii::$app->params['custom_view_for_modules']['callback_front']['thanks'] ?? 'thanks';
        $model = $this->findModel($hash);

        return $this->render($view, [
            'model' => $model,
        ]);
    }

    protected function findModel($hash)
    {
        $model = Callback::find()->where(['hash' => $hash])->one();
        if(null === $model) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $model;
    }
}
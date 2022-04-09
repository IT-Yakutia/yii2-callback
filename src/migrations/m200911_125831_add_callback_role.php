<?php

use yii\db\Migration;

/**
 * Class m200911_125831_add_callback_role
 */
class m200911_125831_add_callback_role extends Migration
{
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        $callbackRedactor = $auth->getPermission('callback');
        if($callbackRedactor == null){
            $callbackRedactor = $auth->createPermission('callback');
            $callbackRedactor->description = 'Доступ к заявкам перезвонить';

            $auth->add($callbackRedactor);

            $operator = $auth->getRole('operator');
            if($operator != null || $operator != false)
                $auth->addChild($operator,$callbackRedactor);
        }
    }

    public function safeDown()
    {
        $auth = Yii::$app->authManager;
        $callbackRedactor = $auth->getPermission('callback');
        if($callbackRedactor !== null)
            $auth->remove($callbackRedactor);
        
    }
}

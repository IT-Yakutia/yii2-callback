<?php

namespace ityakutia\callback;

use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface {

    public function bootstrap($app)
    {
        $app->setModule('callback', 'ityakutia\callback\Module');
    }
}
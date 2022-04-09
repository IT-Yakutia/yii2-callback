<?php

namespace ityakutia\callback;

class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'ityakutia\callback\controllers';
    public $defaultRoute = 'callback';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }
}
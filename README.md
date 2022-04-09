Callback form service for yii2
=====================
Callback form server for yii2

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```sh
php composer.phar require --prefer-dist it-yakutia/yii2-callback "*"
```

or add

```json
"it-yakutia/yii2-callback": "*"
```

to the require section of your `composer.json` file.

Add migration path in your console config file:

```php
'controllerMap' => [
    ...
    'migrate' => [
    ...
        'migrationPath' => [
            ...
            '@vendor/it-yakutia/yii2-callback/src/migrations',
        ],
    ],
]
```

Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= Url::toRoute(['/callback/back/index']); ?>
```

Add RBAC roles:

```
callback
```

For front use views params templates:

```php
<?php
return [
    // ...
    'custom_view_for_modules' => [
        // ...
        'callback_front' => [
            'create' => '@frontend/themes/basic/views/callback/create',
            '_form' => '@frontend/themes/basic/views/callback/_form',
            'thanks' => '@frontend/themes/basic/views/callback/thanks'
        ]
    ],
];
```

And add link:
```php
<?= Url::toRoute(['/callback/front/create']); ?>
```

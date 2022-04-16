<?php

namespace ityakutia\callback\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class Callback extends ActiveRecord
{
    const STATUS_NEW = 10;
    const STATUS_INPROGRESS = 15;
    const STATUS_DONE = 20;

    const STATUSES = [
        self::STATUS_NEW => 'Новая',
        self::STATUS_INPROGRESS => 'В работе',
        self::STATUS_DONE => 'Обработан',
    ];

    public static function tableName()
    {
        return 'callback';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    public function rules()
    {
        return [
            [['title','message', 'phone', 'name'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['title', 'phone', 'name', 'hash'], 'string', 'max' => 255],
            [['message'], 'string'],
            [['is_accept_consent_pd'], 'boolean'],
            [['is_accept_consent_pd'], 'compare', 'compareValue' => 1, 'operator' => '=='],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Тема',
            'name' => 'ФИО',
            'message' => 'Сообщение',
            'phone' => 'Телефн',
            'is_accept_consent_pd' => 'Согласие на обработку ПД',
            'status' => 'Status',
            'created_at' => 'Создан',
            'updated_at' => 'Изменен',
        ];
    }
}
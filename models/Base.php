<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "base".
 *
 * @property int $id_num
 * @property int $id
 * @property string $type
 * @property string $flag
 * @property string $payload
 * @property string $action
 * @property string $request_datetime
 */
class Base extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'base';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'type', 'flag', 'payload', 'action', 'request_datetime'], 'required'],
            [['id'], 'integer'],
            [['request_datetime'], 'safe'],
            [['type', 'flag'], 'string', 'max' => 1],
            [['payload'], 'string', 'max' => 300],
            [['action'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_num' => 'Id Num',
            'id' => 'ID',
            'type' => 'Type',
            'flag' => 'Flag',
            'payload' => 'Payload',
            'action' => 'Action',
            'request_datetime' => 'Request Datetime',
        ];
    }
}

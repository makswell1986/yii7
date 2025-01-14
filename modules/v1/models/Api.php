<?php

namespace app\modules\v1\models;

use Yii;

/**
 * This is the model class for table "sdmx_data_2402__1_".
 *
 * @property int $Code
 * @property string|null $Klassifikator
 * @property string|null $Klassifikator_ru
 * @property string|null $Klassifikator_en
 * @property int $god
 */
class Api extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sdmx2402';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Code', 'god'], 'required'],
            [['Code', 'god'], 'integer'],
            [['Klassifikator'], 'string', 'max' => 29],
            [['Klassifikator_ru'], 'string', 'max' => 25],
            [['Klassifikator_en'], 'string', 'max' => 26],
            [['pokazatel'], 'number'],
            
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Code' => 'Code',
            'Klassifikator' => 'Klassifikator',
            'Klassifikator_ru' => 'Klassifikator Ru',
            'Klassifikator_en' => 'Klassifikator En',
            'pokazatel' => 'Pokazatel',
            'god' => 'God',
        ];
    }
}

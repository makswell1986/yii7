<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sdmx2402".
 *
 * @property int $id
 * @property int $Code
 * @property string|null $Klassifikator
 * @property string|null $Klassifikator_ru
 * @property string|null $Klassifikator_en
 * @property string $pokazatel
 * @property int $god
 */
class Sdmx2402 extends \yii\db\ActiveRecord
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
            [['Code', 'pokazatel', 'god'], 'required'],
            [['Code', 'god'], 'integer'],
            [['Klassifikator'], 'string', 'max' => 29],
            [['Klassifikator_ru'], 'string', 'max' => 25],
            [['Klassifikator_en'], 'string', 'max' => 26],
            [['pokazatel'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Code' => 'Code',
            'Klassifikator' => 'Klassifikator',
            'Klassifikator_ru' => 'Klassifikator Ru',
            'Klassifikator_en' => 'Klassifikator En',
            'pokazatel' => 'Pokazatel',
            'god' => 'God',
        ];
    }
}

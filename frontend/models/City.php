<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property integer $city_id
 * @property string $city_name
 * @property integer $city_population
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city_name', 'city_population'], 'required'],
            [['city_population'], 'integer'],
            [['city_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'city_id' => 'City ID',
            'city_name' => 'City Name',
            'city_population' => 'City Population',
        ];
    }

    /**
     * @inheritdoc
     * @return CityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CityQuery(get_called_class());
    }
}

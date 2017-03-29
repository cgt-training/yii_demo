<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property integer $company_id
 * @property string $company_name
 * @property string $company_email
 * @property string $company_address
 * @property string $company_create_date
 * @property string $company_status
 * @property string $registration_date
 * @property string $logo
 *
 * @property Branch[] $branches
 * @property Department[] $departments
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_name', 'company_email', 'company_address', 'company_create_date', 'company_status', 'registration_date', 'logo'], 'required'],
            [['company_create_date', 'registration_date'], 'safe'],
            [['company_name', 'logo'], 'string', 'max' => 100],
            [['company_email', 'company_status'], 'string', 'max' => 255],
            [['company_address'], 'string', 'max' => 200],
            [['company_name'], 'unique'],
            [['company_email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'Company ID',
            'company_name' => 'Company Name',
            'company_email' => 'Company Email',
            'company_address' => 'Company Address',
            'company_create_date' => 'Company Create Date',
            'company_status' => 'Company Status',
            'registration_date' => 'Registration Date',
            'logo' => 'Logo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBranches()
    {
        return $this->hasMany(Branch::className(), ['company_id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Department::className(), ['company_id' => 'company_id']);
    }

    /**
     * @inheritdoc
     * @return CompanyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CompanyQuery(get_called_class());
    }
}

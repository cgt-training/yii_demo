<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "branch".
 *
 * @property integer $branch_id
 * @property integer $company_id
 * @property string $branch_name
 * @property string $branch_address
 * @property string $branch_create_date
 * @property string $branch_status
 *
 * @property Company $company
 * @property Department[] $departments
 */
class Branch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'branch';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'branch_name', 'branch_address', 'branch_create_date', 'branch_status'], 'required'],
            [['company_id'], 'integer'],
            [['branch_create_date'], 'safe'],
            [['branch_name'], 'string', 'max' => 50],
            [['branch_address'], 'string', 'max' => 200],
            [['branch_status'], 'string', 'max' => 255],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'company_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'branch_id' => 'Branch ID',
            'company_id' => 'Company ID',
            'branch_name' => 'Branch Name',
            'branch_address' => 'Branch Address',
            'branch_create_date' => 'Branch Create Date',
            'branch_status' => 'Branch Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['company_id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Department::className(), ['branch_id' => 'branch_id']);
    }

    /**
     * @inheritdoc
     * @return BranchQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BranchQuery(get_called_class());
    }
}

<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property integer $dept_id
 * @property integer $branch_id
 * @property integer $company_id
 * @property string $dept_name
 * @property string $dept_create_date
 * @property string $dept_status
 *
 * @property Company $company
 * @property Branch $branch
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['branch_id', 'company_id', 'dept_name', 'dept_create_date', 'dept_status'], 'required'],
            [['branch_id', 'company_id'], 'integer'],
            [['dept_create_date'], 'safe'],
            [['dept_name'], 'string', 'max' => 50],
            [['dept_status'], 'string', 'max' => 255],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'company_id']],
            [['branch_id'], 'exist', 'skipOnError' => true, 'targetClass' => Branch::className(), 'targetAttribute' => ['branch_id' => 'branch_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dept_id' => 'Dept ID',
            'branch_id' => 'Branch ID',
            'company_id' => 'Company ID',
            'dept_name' => 'Dept Name',
            'dept_create_date' => 'Dept Create Date',
            'dept_status' => 'Dept Status',
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
    public function getBranch()
    {
        return $this->hasOne(Branch::className(), ['branch_id' => 'branch_id']);
    }

    /**
     * @inheritdoc
     * @return DepartmentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DepartmentQuery(get_called_class());
    }
}

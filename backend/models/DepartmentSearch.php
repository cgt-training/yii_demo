<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Department;

/**
 * DepartmentSearch represents the model behind the search form about `app\models\Department`.
 */
class DepartmentSearch extends Department
{
    public $branch_name,$company_name;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dept_id', 'branch_id', 'company_id'], 'integer'],
            [['dept_name', 'dept_create_date', 'dept_status','branch_name','company_name'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Department::find()->joinWith(['company','branch']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'dept_id' => $this->dept_id,
            'branch_id' => $this->branch_id,
            'company_id' => $this->company_id,
            'dept_create_date' => $this->dept_create_date,
            'company_name' => $this->company_name,
            'branch_name' => $this->branch_name,

        ]);

        $query->andFilterWhere(['like', 'dept_name', $this->dept_name])
            ->andFilterWhere(['like', 'dept_status', $this->dept_status])
            ->andFilterWhere(['like', 'company_name', $this->company_name])
            ->andFilterWhere(['like', 'branch_name', $this->branch_name]);

        return $dataProvider;
    }
}

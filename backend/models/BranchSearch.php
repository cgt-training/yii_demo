<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Branch;

/**
 * BranchSearch represents the model behind the search form about `app\models\Branch`.
 */
class BranchSearch extends Branch
{

    public $company_name;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['branch_id', 'company_id'], 'integer'],
            [['branch_name', 'company_name' ,'branch_address', 'branch_create_date', 'branch_status'], 'safe'],
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
        $query = Branch::find()->joinWith('company');

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
            'branch_id' => $this->branch_id,
            'company_id' => $this->company_id,
            'company_name' => $this->company_name,
            'branch_create_date' => $this->branch_create_date,
        ]);

        $query->andFilterWhere(['like', 'branch_name', $this->branch_name])
            ->andFilterWhere(['like', 'branch_address', $this->branch_address])
            ->andFilterWhere(['like', 'company_name', $this->company_name])
            ->andFilterWhere(['like', 'branch_status', $this->branch_status]);

        return $dataProvider;
    }
}
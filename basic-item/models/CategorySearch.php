<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Category;

/**
 * CategorySearch represents the model behind the search form about `app\models\Category`.
 */
class CategorySearch extends Category
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cate_id', 'cate_sort', 'cate_isshow', 'cate_isnav', 'cate_pid'], 'integer'],
            [['cate_name', 'cate_path', 'cate_desc'], 'safe'],
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
        $query = Category::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 5],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'cate_id' => $this->cate_id,
            'cate_sort' => $this->cate_sort,
            'cate_isshow' => $this->cate_isshow,
            'cate_isnav' => $this->cate_isnav,
            'cate_pid' => $this->cate_pid,
        ]);

        $query->andFilterWhere(['like', 'cate_name', $this->cate_name])
            ->andFilterWhere(['like', 'cate_path', $this->cate_path])
            ->andFilterWhere(['like', 'cate_desc', $this->cate_desc]);

        return $dataProvider;
    }
}

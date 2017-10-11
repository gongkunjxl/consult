<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tips;

/**
 * TipsSearch represents the model behind the search form about `app\models\Tips`.
 */
class TipsSearch extends Tips
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'from_id', 'to_id', 'ctime', 'articleId', 'if_read'], 'integer'],
            [['content'], 'safe'],
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
        $query = Tips::find();

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
            'id' => $this->id,
            'from_id' => $this->from_id,
            'to_id' => $this->to_id,
            'ctime' => $this->ctime,
            'articleId' => $this->articleId,
            'if_read' => $this->if_read,
        ]);

        $query->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}

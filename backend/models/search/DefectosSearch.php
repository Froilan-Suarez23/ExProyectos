<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Defectos;

/**
 * DefectosSearch represents the model behind the search form of `backend\models\Defectos`.
 */
class DefectosSearch extends Defectos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idDefecto', 'Activo'], 'integer'],
            [['NombreDefecto'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Defectos::find();

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
            'idDefecto' => $this->idDefecto,
            'Activo' => $this->Activo,
        ]);

        $query->andFilterWhere(['like', 'NombreDefecto', $this->NombreDefecto]);

        return $dataProvider;
    }
}

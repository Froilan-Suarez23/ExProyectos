<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Sprints;

/**
 * SprintsSearch represents the model behind the search form of `backend\models\Sprints`.
 */
class SprintsSearch extends Sprints
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idSprints', 'Activo', 'idProyecto'], 'integer'],
            [['NombreSprints', 'Descripcion', 'FechaInicio', 'FechaFinal'], 'safe'],
            [['CantidadDias'], 'number'],
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
        $query = Sprints::find();

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
            'idSprints' => $this->idSprints,
            'FechaInicio' => $this->FechaInicio,
            'FechaFinal' => $this->FechaFinal,
            'CantidadDias' => $this->CantidadDias,
            'Activo' => $this->Activo,
            'idProyecto' => $this->idProyecto,
        ]);

        $query->andFilterWhere(['like', 'NombreSprints', $this->NombreSprints])
            ->andFilterWhere(['like', 'Descripcion', $this->Descripcion]);

        return $dataProvider;
    }
}

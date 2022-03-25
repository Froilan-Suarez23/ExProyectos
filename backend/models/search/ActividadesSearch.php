<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Actividades;

/**
 * ActividadesSearch represents the model behind the search form of `backend\models\Actividades`.
 */
class ActividadesSearch extends Actividades
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idActividad', 'Activo', 'idProyecto'], 'integer'],
            [['NombreActividad', 'Descripcion'], 'safe'],
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
        $query = Actividades::find();

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
            'idActividad' => $this->idActividad,
            'Activo' => $this->Activo,
            'idProyecto' => $this->idProyecto,
        ]);

        $query->andFilterWhere(['like', 'NombreActividad', $this->NombreActividad])
            ->andFilterWhere(['like', 'Descripcion', $this->Descripcion]);

        return $dataProvider;
    }
}

<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Bitacoratiempos;

/**
 * BitacoratiemposSearch represents the model behind the search form of `backend\models\Bitacoratiempos`.
 */
class BitacoratiemposSearch extends Bitacoratiempos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idBitacoraTiempo', 'idEtapa', 'idProyecto', 'idHistoria', 'idUsuario'], 'integer'],
            [['FechaInicio', 'HoraInicio', 'FechaFinal', 'HoraFinal', 'Interrupcion', 'Descripcion', 'Artefacto'], 'safe'],
            [['Total'], 'number'],
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
        $query = Bitacoratiempos::find();

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
            'idBitacoraTiempo' => $this->idBitacoraTiempo,
            'FechaInicio' => $this->FechaInicio,
            'HoraInicio' => $this->HoraInicio,
            'FechaFinal' => $this->FechaFinal,
            'HoraFinal' => $this->HoraFinal,
            'Interrupcion' => $this->Interrupcion,
            'Total' => $this->Total,
            'idEtapa' => $this->idEtapa,
            'idProyecto' => $this->idProyecto,
            'idHistoria' => $this->idHistoria,
            'idUsuario' => $this->idUsuario,
        ]);

        $query->andFilterWhere(['like', 'Descripcion', $this->Descripcion])
            ->andFilterWhere(['like', 'Artefacto', $this->Artefacto]);

        return $dataProvider;
    }
}

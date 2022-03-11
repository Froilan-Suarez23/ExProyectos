<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "etapas".
 *
 * @property int $idEtapa
 * @property string|null $NombreEtapa
 * @property int|null $Activo
 *
 * @property Bitacoratiempos[] $bitacoratiempos
 */
class Etapas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'etapas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Activo'], 'integer'],
            [['NombreEtapa'], 'string', 'max' => 200],
            [['NombreEtapa'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idEtapa' => Yii::t('app', 'Id Etapa'),
            'NombreEtapa' => Yii::t('app', 'Nombre Etapa'),
            'Activo' => Yii::t('app', 'Activo'),
        ];
    }

    /**
     * Gets query for [[Bitacoratiempos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBitacoratiempos()
    {
        return $this->hasMany(Bitacoratiempos::className(), ['idEtapa' => 'idEtapa']);
    }
}

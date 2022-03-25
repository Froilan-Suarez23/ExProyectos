<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "etaparemovido".
 *
 * @property int $idEtaparr
 * @property string|null $NombreEtapa
 * @property int|null $Activo
 *
 * @property Bitacoradefectos[] $bitacoradefectos
 */
class Etaparemovido extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'etaparemovido';
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
            'idEtaparr' => Yii::t('app', 'Id Etaparr'),
            'NombreEtapa' => Yii::t('app', 'Nombre Etapa'),
            'Activo' => Yii::t('app', 'Activo'),
        ];
    }

    /**
     * Gets query for [[Bitacoradefectos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBitacoradefectos()
    {
        return $this->hasMany(Bitacoradefectos::className(), ['idEtaparr' => 'idEtaparr']);
    }
}

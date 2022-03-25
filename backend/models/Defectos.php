<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "defectos".
 *
 * @property int $idDefecto
 * @property string|null $NombreDefecto
 * @property int|null $Activo
 *
 * @property Bitacoradefectos[] $bitacoradefectos
 */
class Defectos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'defectos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Activo'], 'integer'],
            [['NombreDefecto'], 'string', 'max' => 200],
            [['NombreDefecto'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idDefecto' => Yii::t('app', 'Id Defecto'),
            'NombreDefecto' => Yii::t('app', 'Nombre Defecto'),
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
        return $this->hasMany(Bitacoradefectos::className(), ['idDefecto' => 'idDefecto']);
    }
}

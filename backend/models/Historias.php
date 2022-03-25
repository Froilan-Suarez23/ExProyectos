<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "historias".
 *
 * @property int $idHistoria
 * @property string|null $NombreHistoria
 * @property string|null $Numero
 * @property string|null $Descripcion
 * @property int|null $Peso
 * @property int|null $idSprints
 * @property int|null $idUsuario
 * @property int|null $Activo
 * @property int|null $idProyecto
 *
 * @property Proyectos $idProyecto0
 * @property Sprints $idSprints0
 */
class Historias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'historias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Peso', 'idSprints', 'idUsuario', 'Activo', 'idProyecto'], 'integer'],
            [['NombreHistoria'], 'string', 'max' => 200],
            [['Numero', 'Descripcion'], 'string', 'max' => 250],
            [['NombreHistoria'], 'unique'],
            [['Numero'], 'unique'],
            [['NombreHistoria'],'required', 'message'=>'Nombre Historia no puede estar vacío.'],
            [['Descripcion'],'required', 'message'=>'La Descripción no puede estar vacío.'],
            [['Peso'],'required', 'message'=>'El campo Peso no debe de ir vacío .'],
            [['idProyecto'],'required', 'message'=>'El campo Id Proyecto no puede estar vacío.'],
            [['idProyecto'], 'exist', 'skipOnError' => true, 'targetClass' => Proyectos::className(), 'targetAttribute' => ['idProyecto' => 'idProyecto']],
            [['idSprints'], 'exist', 'skipOnError' => true, 'targetClass' => Sprints::className(), 'targetAttribute' => ['idSprints' => 'idSprints']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idHistoria' => Yii::t('app', 'Id Historia'),
            'NombreHistoria' => Yii::t('app', 'Nombre Historia'),
            'Numero' => Yii::t('app', 'No'),
            'Descripcion' => Yii::t('app', 'Descripcion'),
            'Peso' => Yii::t('app', 'Peso'),
            'idSprints' => Yii::t('app', 'Id Sprints'),
            'idUsuario' => Yii::t('app', 'Id Usuario'),
            'Activo' => Yii::t('app', 'Status'),
            'idProyecto' => Yii::t('app', 'Id Proyecto'),
        ];
    }

    /**
     * Gets query for [[IdProyecto0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdProyecto0()
    {
        return $this->hasOne(Proyectos::className(), ['idProyecto' => 'idProyecto']);
    }

    /**
     * Gets query for [[IdSprints0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdSprints0()
    {
        return $this->hasOne(Sprints::className(), ['idSprints' => 'idSprints']);
    }

    public function beforeSave($insert)
    {
        parent::beforeSave($insert);
        if($insert)
            $this->Activo=1;
        return true;
        
    }

    public static function getSiguienteFolio(){
        $num = Historias::find()
                    ->orderBy(['idHistoria' => SORT_DESC])
                    ->one();
        return $num -> idHistoria + 1;
    }

    
}

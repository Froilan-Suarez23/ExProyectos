<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sprints".
 *
 * @property int $idSprints
 * @property string|null $NombreSprints
 * @property string|null $Descripcion
 * @property string|null $FechaInicio
 * @property string|null $FechaFinal
 * @property float|null $CantidadDias
 * @property int|null $Activo
 * @property int|null $idProyecto
 *
 * @property Proyectos $idProyecto0
 */
class Sprints extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sprints';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['FechaInicio', 'FechaFinal'], 'safe'],
            [['FechaInicio', 'FechaFinal'],'date','format'=>'dd-MM-yyyy'],
            [['FechaInicio'],'required', 'message'=>'Fecha de Inicio no puede estar vacío.'],
            [['FechaFinal'],'required', 'message'=>'Fecha de Final no puede estar vacío.'],
            [['NombreSprints'],'required', 'message'=>'Nombre Sprint no puede estar vacío.'],
            [['CantidadDias'],'required', 'message'=>'Numero Dias no puede estar vacío.'],
            [['Activo'],'required', 'message'=>'Status no puede estar vacío.'],
            [['CantidadDias'], 'number'],
            [['Activo', 'idProyecto'], 'integer'],
            [['NombreSprints'], 'string', 'max' => 200],
            [['Descripcion'], 'string', 'max' => 250],
            [['NombreSprints'], 'unique'],
            [['idProyecto'], 'exist', 'skipOnError' => true, 'targetClass' => Proyectos::className(), 'targetAttribute' => ['idProyecto' => 'idProyecto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idSprints' => Yii::t('app', 'Id Sprints'),
            'NombreSprints' => Yii::t('app', 'Nombre Sprints'),
            'Descripcion' => Yii::t('app', 'Descripcion'),
            'FechaInicio' => Yii::t('app', 'Fecha Inicio'),
            'FechaFinal' => Yii::t('app', 'Fecha Final'),
            'CantidadDias' => Yii::t('app', 'Numero Dias'),
            'Activo' => Yii::t('app', 'Status'),
            'idProyecto' => Yii::t('app', 'Id Proyecto'),
        ];
    }

    public function beforeSave($insert){
       
       
        $this->FechaInicio =date_format(date_create_from_format('d-m-Y', $this->FechaInicio), 'd-m-Y');
        $this->FechaFinal =date_format(date_create_from_format('d-m-Y', $this->FechaFinal), 'd-m-Y');
        
        return true;
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
}

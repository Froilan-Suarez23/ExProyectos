<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bitacoratiempos".
 *
 * @property int $idBitacoraTiempo
 * @property string|null $FechaInicio
 * @property string|null $HoraInicio
 * @property string|null $FechaFinal
 * @property string|null $HoraFinal
 * @property string|null $Interrupcion
 * @property float|null $Total
 * @property int|null $idEtapa
 * @property string|null $Descripcion
 * @property int|null $idProyecto
 * @property int|null $idHistoria
 * @property string|null $Artefacto
 * @property int|null $idUsuario
 *
 * @property Etapas $idEtapa0
 * @property Historias $idHistoria0
 * @property Proyectos $idProyecto0
 */
class Bitacoratiempos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bitacoratiempos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['FechaInicio', 'HoraInicio', 'FechaFinal', 'HoraFinal', 'Interrupcion'], 'safe'],
            [['FechaInicio', 'FechaFinal'],'date','format'=>'yyyy-MM-dd'],
            [['HoraInicio','HoraFinal'],'date','format'=>'hh:mm a'],
            ['Interrupcion', 'match', 'pattern' =>'/[0-9][0-9]:[0-5][0-9]/', 'message' =>'Indique en formato hh:mm'],
            [['FechaInicio', 'FechaFinal', 'HoraInicio', 'HoraFinal', 'Interrupcion', 'Artefacto'],'required', 'message'=>'Campo requerido'],
            [['idEtapa', 'idProyecto', 'idHistoria', 'idUsuario'], 'integer'],
            [['Descripcion', 'Artefacto'], 'string', 'max' => 250],
            [['idEtapa'], 'exist', 'skipOnError' => true, 'targetClass' => Etapas::className(), 'targetAttribute' => ['idEtapa' => 'idEtapa']],
            [['idHistoria'], 'exist', 'skipOnError' => true, 'targetClass' => Historias::className(), 'targetAttribute' => ['idHistoria' => 'idHistoria']],
            [['idProyecto'], 'exist', 'skipOnError' => true, 'targetClass' => Proyectos::className(), 'targetAttribute' => ['idProyecto' => 'idProyecto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idBitacoraTiempo' => Yii::t('app', 'Id Bitacora Tiempo'),
            'FechaInicio' => Yii::t('app', 'Fecha Inicio'),
            'HoraInicio' => Yii::t('app', 'Hora Inicio'),
            'FechaFinal' => Yii::t('app', 'Fecha Final'),
            'HoraFinal' => Yii::t('app', 'Hora Final'),
            'Interrupcion' => Yii::t('app', 'Interrupcion'),
            'Total' => Yii::t('app', 'Total'),
            'idEtapa' => Yii::t('app', 'Etapa'),
            'Descripcion' => Yii::t('app', 'Descripcion'),
            'idProyecto' => Yii::t('app', 'Proyecto'),
            'idHistoria' => Yii::t('app', 'Historia'),
            'Artefacto' => Yii::t('app', 'Artefacto'),
            'idUsuario' => Yii::t('app', 'Id Usuario'),
        ];
    }

    public function beforeSave($insert){
        $fechaHoraInicio = date_create_from_format('h:i a', $this->HoraInicio);
        $fechaHoraFinal = date_create_from_format('h:i a', $this->HoraFinal);
        $fechaHoraInt = date_create_from_format('H:i', $this->Interrupcion);
        $interval = date_diff($fechaHoraFinal, $fechaHoraInicio);
        $this->Total=(($interval->h * 60 + $interval->i)-($fechaHoraInt->format('i')))/60.0;
        $this->FechaInicio =date_format(date_create_from_format('Y-m-d', $this->FechaInicio), 'Y-m-d');
        $this->FechaFinal =date_format(date_create_from_format('Y-m-d', $this->FechaFinal), 'Y-m-d');
        $this->HoraInicio=date_format($fechaHoraInicio, 'Y-m-d H:i:s');
        $this->HoraFinal=date_format($fechaHoraFinal, 'Y-m-d H:i:s');
        $this->Interrupcion=date_format($fechaHoraInt,'Y-m-d H:i:s');
        $this->idUsuario = Yii::$app->user->id;
        return true;
    }

    /**
     * Gets query for [[IdEtapa0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdEtapa0()
    {
        return $this->hasOne(Etapas::className(), ['idEtapa' => 'idEtapa']);
    }

    /**
     * Gets query for [[IdHistoria0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdHistoria0()
    {
        return $this->hasOne(Historias::className(), ['idHistoria' => 'idHistoria']);
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

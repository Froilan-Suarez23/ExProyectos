<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bitacoradefectos".
 *
 * @property int $idBitacoraDefecto
 * @property string|null $Descripcion
 * @property string|null $FechaCaptura
 * @property string|null $Hora
 * @property int|null $idEtapa
 * @property int|null $idProyecto
 * @property int|null $idDefecto
 *
 * @property Defectos $idDefecto0
 * @property Etapas $idEtapa0
 * @property Etaparemovido $idEtaparr0
 * @property Proyectos $idProyecto0
 */
class Bitacoradefectos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bitacoradefectos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['FechaCaptura', 'Hora'], 'safe'],
           
            [['idEtapa', 'idProyecto', 'idDefecto'], 'integer'],
            [['Descripcion'], 'string', 'max' => 250],
            [['idDefecto'], 'exist', 'skipOnError' => true, 'targetClass' => Defectos::className(), 'targetAttribute' => ['idDefecto' => 'idDefecto']],
            [['idEtapa'], 'exist', 'skipOnError' => true, 'targetClass' => Etapas::className(), 'targetAttribute' => ['idEtapa' => 'idEtapa']],
            [['idEtaparr'], 'exist', 'skipOnError' => true, 'targetClass' => Etaparemovido::className(), 'targetAttribute' => ['idEtaparr' => 'idEtaparr']],
            [['idProyecto'], 'exist', 'skipOnError' => true, 'targetClass' => Proyectos::className(), 'targetAttribute' => ['idProyecto' => 'idProyecto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idBitacoraDefecto' => Yii::t('app', 'Id Bitacora Defecto'),
            'Descripcion' => Yii::t('app', 'Descripcion Defecto'),
            'FechaCaptura' => Yii::t('app', 'Fecha Captura'),
            'Hora' => Yii::t('app', 'Fix Time'),
            'idEtapa' => Yii::t('app', 'Etapa Inyectado'),
            'idEtaparr' => Yii::t('app', 'Etapa Removido'),
            'idProyecto' => Yii::t('app', 'Proyecto'),
            'idDefecto' => Yii::t('app', 'Tipo Defecto'),
        ];
    }


    /**
     * Gets query for [[IdDefecto0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdDefecto0()
    {
        return $this->hasOne(Defectos::className(), ['idDefecto' => 'idDefecto']);
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

    public function getIdEtaparemovido0()
    {
        return $this->hasOne(Etaparemovido::className(), ['idEtaparr' => 'idEtaparr']);
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

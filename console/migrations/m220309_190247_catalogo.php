<?php

use yii\db\Migration;

/**
 * Class m220309_190247_catalogo
 */
class m220309_190247_catalogo extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;

        if($this -> db ->driverName ==='mysql'){

            $tableOptions ='CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        }

        $this->createTable('{{%Proyectos}}', [
            'idProyecto' => $this->primaryKey(),
            'NombreProyecto' =>$this->string(200)->unique(),
            'Activo' => $this->boolean()
        ], $tableOptions);

        $this->createTable('{{%Sprints}}', [
            'idSprints' => $this->primaryKey(),
            'NombreSprints' => $this->string(200)->unique(),
            'Descripcion' => $this->string(250),
            'FechaInicio' => $this->date(),
            'FechaFinal' => $this->date(),
            'CantidadDias' => $this->float(),
            'Activo' => $this->boolean(),
            'idProyecto' =>$this->integer()
        ], $tableOptions);

        $this->createTable('{{%Historias}}', [
            'idHistoria' => $this->primaryKey(),
            'NombreHistoria' => $this->string(200)->unique(),
            'Numero' => $this->string(250)->unique(),
            'Descripcion' => $this->string(250),
            'Peso' => $this->boolean(),
            'idSprints' =>$this->integer(),
            'idUsuario' =>$this->integer(),
            'Activo' => $this->boolean(), 
            'idProyecto' =>$this->integer()
        ], $tableOptions);

        $this->createTable('{{%Bitacoratiempos}}', [
            'idBitacoraTiempo' => $this->primaryKey(),
            'FechaInicio' =>$this->date(),
            'HoraInicio' => $this->time(),
            'FechaFinal' =>$this->date(),
            'HoraFinal' => $this->time(),
            'Interrupcion' => $this->time(),
            'Total' => $this->float(),
            'idEtapa' => $this->integer(),
            'Descripcion' => $this ->string(250),
            'idProyecto'=> $this->integer(),
            'idHistoria'=> $this->integer(),
            'Artefacto' => $this->string(250),
            'idUsuario' => $this->integer()
        ], $tableOptions);

        $this->createTable('{{%Etapas}}', [
            'idEtapa' => $this->primaryKey(),
            'NombreEtapa' => $this->string(200)->unique(),
            'Activo' => $this->boolean(),
        ], $tableOptions);

        $this->addForeignKey('FK_spri_proy', 'Sprints', 'idProyecto', 'Proyectos', 'idProyecto');
        $this->addForeignKey('FK_hist_proy', 'Historias', 'idProyecto', 'Proyectos', 'idProyecto');
        $this->addForeignKey('FK_hist_spri', 'Historias', 'idSprints', 'Sprints', 'idSprints');
        $this->addForeignKey('FK_bitt_proy', 'Bitacoratiempos', 'idProyecto', 'Proyectos', 'idProyecto');
        $this->addForeignKey('FK_bitt_hist', 'Bitacoratiempos', 'idHistoria', 'Historias', 'idHistoria');
        $this->addForeignKey('FK_bitt_etap', 'Bitacoratiempos', 'idEtapa', 'Etapas', 'idEtapa');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_spri_proy', 'Sprints');
        $this->dropForeignKey('FK_hist_proy', 'Historias');
        $this->dropForeignKey('FK_hist_spri', 'Historias');
        $this->dropForeignKey('FK_bitt_proy', 'Bitacoratiempos');
        $this->dropForeignKey('FK_bitt_hist', 'Bitacoratiempos');
        $this->dropForeignKey('FK_bitt_etap', 'Bitacoratiempos');
        $this->dropTable('{{%Proyectos}}');
        $this->dropTable('{{%Sprints}}');
        $this->dropTable('{{%Historias}}');
        $this->dropTable('{{%Bitacoratiempos}}');
        $this->dropTable('{{%Etapas}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220309_190247_catalogo cannot be reverted.\n";

        return false;
    }
    */
}

<?php

use yii\db\Migration;

/**
 * Class m220222_003723_catalogo_proyectos
 */
class m220222_003723_catalogo_proyectos extends Migration
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

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%Proyectos}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220222_003723_catalogo_proyectos cannot be reverted.\n";

        return false;
    }
    */
}

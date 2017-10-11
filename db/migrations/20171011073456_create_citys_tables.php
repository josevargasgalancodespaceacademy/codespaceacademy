<?php


use Phinx\Migration\AbstractMigration;

class CreateCitysTables extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $citysTable = $this->table('citys');
        $citysTable->addColumn('name', 'string', array('limit' => 100))
              ->addColumn('created_at', 'datetime', array('null' => true))
              ->addColumn('updated_at', 'datetime', array('null' => true))
              ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->dropTable('citys');
    }
}

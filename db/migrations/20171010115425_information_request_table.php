<?php


use Phinx\Migration\AbstractMigration;

class InformationRequestTable extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $newsletter = $this->table('information_requests');
        $newsletter->addColumn('name', 'string', array('limit' => 100))
              ->addColumn('email', 'string', array('limit' => 100))
              ->addColumn('telephone', 'string', array('limit' => 15))
              ->addColumn('comment', 'text', array('null' => true))
              ->addColumn('city', 'string', array('limit' => 100))
              ->addColumn('course', 'string', array('limit' => 100))
              ->addColumn('created_at', 'datetime', array('null' => true))
              ->addColumn('updated_at', 'datetime', array('null' => true))
              ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->dropTable('information_requests');
    }
}

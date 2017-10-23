<?php


use Phinx\Migration\AbstractMigration;

class CreateUsersTable extends AbstractMigration
{

    /**
     * Migrate Up.
     */
    public function up()
    {
        $users = $this->table('users');
        $users->addColumn('name', 'string', array('limit' => 255, 'null' => true))
              ->addColumn('email', 'string', array('limit' => 255))
              ->addColumn('password', 'string', array('limit' => 255))
              ->addColumn('created_at', 'datetime', array('null' => true))
              ->addColumn('updated_at', 'datetime', array('null' => true))
              ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->dropTable('users');
    }

}

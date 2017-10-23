<?php


use Phinx\Migration\AbstractMigration;

class CreateRolesTable extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $users = $this->table('roles');
        $users->addColumn('name', 'string')
              ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->dropTable('roles');
    }
}

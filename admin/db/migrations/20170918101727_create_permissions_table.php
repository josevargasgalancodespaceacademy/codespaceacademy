<?php


use Phinx\Migration\AbstractMigration;

class CreatePermissionsTable extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $users = $this->table('permissions');
        $users->addColumn('name', 'string')
              ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->dropTable('permissions');
    }
}

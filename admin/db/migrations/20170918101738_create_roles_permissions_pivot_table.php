<?php


use Phinx\Migration\AbstractMigration;

class CreateRolesPermissionsPivotTable extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $users = $this->table('role_permissions');
        $users->addColumn('role_id', 'integer')
              ->addColumn('permission_id', 'integer')
              ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->dropTable('role_permissions');
    }
}

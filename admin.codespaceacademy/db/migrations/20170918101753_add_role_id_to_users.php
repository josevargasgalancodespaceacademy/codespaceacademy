<?php


use Phinx\Migration\AbstractMigration;

class AddRoleIdToUsers extends AbstractMigration
{

    public function change()
    {
        $table = $this->table('users');
        $table->addColumn('role_id', 'integer')
            ->update();
    }
}

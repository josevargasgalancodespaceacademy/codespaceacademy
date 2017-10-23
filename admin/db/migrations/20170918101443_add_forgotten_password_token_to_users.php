<?php


use Phinx\Migration\AbstractMigration;

class AddForgottenPasswordTokenToUsers extends AbstractMigration
{

    public function change()
    {
        $table = $this->table('users');
        $table->addColumn('forgotten_password_token', 'string', array('null' => true, 'limit' => 255))
            ->update();
    }
}

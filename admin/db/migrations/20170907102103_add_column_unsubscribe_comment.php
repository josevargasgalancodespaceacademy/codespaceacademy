<?php


use Phinx\Migration\AbstractMigration;

class AddColumnUnsubscribeComment extends AbstractMigration
{

    public function change()
    {
        $table = $this->table('newsletter_subscriptions');
        $table->addColumn('comment_unsubscribe', 'text', array('null' => true))
            ->update();
    }
}

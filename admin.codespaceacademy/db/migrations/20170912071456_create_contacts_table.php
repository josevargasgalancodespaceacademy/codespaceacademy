<?php


use Phinx\Migration\AbstractMigration;

class CreateContactsTable extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function change()
    {
        $users = $this->table('contacts');
        $users->addColumn('email', 'string', array('limit' => 255))
              ->addColumn('created', 'datetime')
              ->addIndex(array('email'), array('unique' => true, 'name' => 'idx_contact_email'))
              ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->dropTable('contacts');
    }

    /**
     * Database dependent seed command
     */

    //INSERT into contacts (email, created) select distinct email, created FROM (select email, created from curriculums UNION select email, created from company_contacts UNION select email, created from newsletter_subscriptions UNION select email, created from promotion_entries) t;
}

<?php


use Phinx\Migration\AbstractMigration;

class AddUpdatedAtColumns extends AbstractMigration
{

    public function change()
    {
        $tables = ['contacts','company_contacts','curriculums','newsletter_subscriptions','promotion_entries'];

        foreach($tables as $table) {
            $table = $this->table($table);
            $table->addColumn('updated_at', 'datetime', array('null' => true))
                ->update();
        }

    }
}

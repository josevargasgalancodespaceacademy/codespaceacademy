<?php


use Phinx\Migration\AbstractMigration;

class CreateCoursesTables extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $coursesTable = $this->table('courses');
        $coursesTable->addColumn('name', 'string', array('limit' => 100))
              ->addColumn('city_id', 'integer')
              ->addColumn('active', 'boolean', array('default' => false))
              ->addColumn('created_at', 'datetime', array('null' => true))
              ->addColumn('updated_at', 'datetime', array('null' => true))
              ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->dropTable('ccourses');
    }
}

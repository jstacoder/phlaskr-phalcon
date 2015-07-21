<?php 

use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Phalcon\Db\Reference;
use Phalcon\Mvc\Model\Migration;

class PostsMigration_100 extends Migration
{

    public function up()
    {
        $this->morphTable(
            'posts',
            array(
            'columns' => array(
                new Column(
                    'id',
                    array(
                        'type' => Column::TYPE_INTEGER,
                        'unsigned' => true,
                        'notNull' => true,
                        'autoIncrement' => true,
                        'size' => 10,
                        'first' => true
                    )
                ),
                new Column(
                    'title',
                    array(
                        'type' => Column::TYPE_VARCHAR,
                        'size' => 255,
                        'after' => 'id'
                    )
                ),
                new Column(
                    'body',
                    array(
                        'type' => Column::TYPE_VARCHAR,
                        'size' => 500,
                        'after' => 'title'
                    )
                ),
                new Column(
                    'excerpt',
                    array(
                        'type' => Column::TYPE_VARCHAR,
                        'size' => 500,
                        'after' => 'body'
                    )
                ),
                new Column(
                    'published',
                    array(
                        'type' => Column::TYPE_DATETIME,
                        'size' => 1,
                        'after' => 'excerpt'
                    )
                ),
                new Column(
                    'updated',
                    array(
                        'type' => Column::TYPE_DATETIME,
                        'size' => 1,
                        'after' => 'published'
                    )
                ),
                new Column(
                    'pinged',
                    array(
                        'type' => Column::TYPE_INTEGER,
                        'size' => 1,
                        'after' => 'updated'
                    )
                ),
                new Column(
                    'to_ping',
                    array(
                        'type' => Column::TYPE_INTEGER,
                        'size' => 1,
                        'after' => 'pinged'
                    )
                )
            ),
            'indexes' => array(
                new Index('PRIMARY', array('id'))
            ),
            'options' => array(
                'TABLE_TYPE' => 'BASE TABLE',
                'AUTO_INCREMENT' => '1',
                'ENGINE' => 'InnoDB',
                'TABLE_COLLATION' => 'utf8_general_ci'
            )
        )
        );
    }
}

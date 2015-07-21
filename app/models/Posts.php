<?php

class Posts extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $title;

    /**
     *
     * @var string
     */
    public $body;

    /**
     *
     * @var string
     */
    public $excerpt;

    /**
     *
     * @var string
     */
    public $published;

    /**
     *
     * @var string
     */
    public $updated;

    /**
     *
     * @var integer
     */
    public $pinged;

    /**
     *
     * @var integer
     */
    public $to_ping;

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'title' => 'title', 
            'body' => 'body', 
            'excerpt' => 'excerpt', 
            'published' => 'published', 
            'updated' => 'updated', 
            'pinged' => 'pinged', 
            'to_ping' => 'to_ping'
        );
    }

}

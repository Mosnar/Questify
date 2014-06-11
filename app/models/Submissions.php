<?php




class Submissions extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;
     
    /**
     *
     * @var integer
     */
    public $quest_id;
     
    /**
     *
     * @var integer
     */
    public $user_id;
     
    /**
     *
     * @var integer
     */
    public $image_id;
     
    /**
     *
     * @var string
     */
    public $approved;
     
    /**
     *
     * @var integer
     */
    public $datetime;

    public $body;

}

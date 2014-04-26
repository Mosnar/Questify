<?php




class Companies extends \Phalcon\Mvc\Model
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
    public $datetime;
     
    /**
     *
     * @var string
     */
    public $name;
     
    /**
     *
     * @var string
     */
    public $description;

    /**
     *
     * @var string
     */
    public $handle;

    /**
     * @var integer
     */
    public $user_id;

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'datetime' => 'datetime', 
            'name' => 'name', 
            'description' => 'description',
            'handle' => 'handle',
            'user_id' => 'user_id'
        );
    }

}

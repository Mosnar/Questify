<?php




class Orders extends \Phalcon\Mvc\Model
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
     * @var integer
     */
    public $user_id;
     
    /**
     *
     * @var integer
     */
    public $prize_id;

    public $company_id;
    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'datetime' => 'datetime', 
            'user_id' => 'user_id', 
            'prize_id' => 'prize_id',
            'company_id' => 'company_id'
        );
    }

}

<?php




class Prizes extends \Phalcon\Mvc\Model
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
    public $description;
     
    /**
     *
     * @var integer
     */
    public $image_id;
     
    /**
     *
     * @var integer
     */
    public $points;

    public $company_id;
}

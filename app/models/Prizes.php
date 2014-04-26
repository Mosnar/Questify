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
    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'description' => 'description', 
            'image_id' => 'image_id', 
            'points' => 'points',
            'company_id' => 'company_id'
        );
    }

}

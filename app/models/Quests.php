<?php




class Quests extends \Phalcon\Mvc\Model
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
    public $company_id;
     
    /**
     *
     * @var string
     */
    public $name;
     
    /**
     *
     * @var integer
     */
    public $experience_points_earned;

    /**
     *
     * @var integer
     */
    public $experience_points_required;

    /**
     * @string objective
     */
    public $objective;

    /**
     * @bool
     */
    public $image_required;

    /**
     * @bool
     */
    public $text_required;
    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'company_id' => 'company_id', 
            'name' => 'name', 
            'experience_points_earned' => 'experience_points_earned',
            'experience_points_required' => 'experience_points_required',
            'objective' => 'objective',
            'image_required' => 'image_required',
            'text_required' => 'text_required'
        );
    }

}

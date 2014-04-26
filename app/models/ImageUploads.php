<?php




class ImageUploads extends \Phalcon\Mvc\Model
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
    public $file_size;
     
    /**
     *
     * @var integer
     */
    public $user_id;
     
    /**
     *
     * @var string
     */
    public $file_name;
     
    /**
     *
     * @var string
     */
    public $original_file_name;
     
    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'file_size' => 'file_size', 
            'user_id' => 'user_id', 
            'file_name' => 'file_name', 
            'original_file_name' => 'original_file_name'
        );
    }

}

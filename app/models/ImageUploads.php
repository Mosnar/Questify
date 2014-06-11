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

}

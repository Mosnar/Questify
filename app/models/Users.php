<?php




class Users extends \Phalcon\Mvc\Model
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
    public $facebook_id;
     
    /**
     *
     * @var integer
     */
    public $account_type;

    /**
     *
     * @var string
     */
    public $email;

    /**
     *
     * @var string
     */
    public $ip;
     
    /**
     *
     * @var integer
     */
    public $points_balance;

    /**
     *
     * @var integer
     */
    public $points_retro;

    /**
     *
     * @var integer
     */
    public $company_id;


    /**
     * @var string
     */
    public $password;

}

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

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'facebook_id' => 'facebook_id', 
            'account_type' => 'account_type', 
            'ip' => 'ip',
            'email' => 'email',
            'points_balance' => 'points_balance',
            'company_id' => 'company_id',
            'password' => 'password',
            'points_retro' => 'points_retro'
        );
    }

}

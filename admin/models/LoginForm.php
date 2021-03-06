<?php
namespace admin\models;

use Yii;
use yii\base\Model;

class LoginForm extends Model
{
    public $admin_name;
    public $password;
    private $admin;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // admin_name and password are both required
            [['admin_name', 'password'], 'required'],
            // password is validated by validatePassword()
             ['password', 'validatePassword'],
        ];
    }
    public function attributeLabels()
    {
        return 
        [
            'admin_name'=>'用户名',
            'password'=>'密码',
        ];
    }
    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     */
    public function validatePassword($attribute)
    {
        if (!$this->hasErrors())
        {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password))
                $this->addError($attribute, '密码或用户名不正确');
        }
    }


    /**
     * Logs in a user using the provided admin_name and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate())
            return Yii::$app->user->login($this->getUser(),0);
        return false;
    }

    /**
     * Finds user by [[admin_name]]
     *
     * @return Admin|null
     */
    protected function getUser()
    {
        if ($this->admin === null)
            $this->admin = Admin::findOne(["admin_name"=>$this->admin_name]);
        return $this->admin;
    }
}

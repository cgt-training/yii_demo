<?php
namespace backend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class UserCreate extends Model
{
    public $username;
    public $email;
    public $password;
    public $status;
    public $role;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],


            ['status', 'required'],
            ['role', 'safe'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function create()
    {
        if (!$this->validate()) {
            return null;
        }
        


        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->role = $this->role;
        $user->status = $this->status;
        $user->setPassword($this->password);
        $user->generateAuthKey(); 

        return $user->save(false) ? $user : null;
    }
}

<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    public function validationDefault(Validator $validator): Validator
    {
        return $validator
            ->allowEmptyString('email', 'An email is required', false)
            ->email('email')
            ->allowEmptyString('password', 'A password is required', false);
    }

}

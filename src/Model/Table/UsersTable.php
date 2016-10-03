<?php
namespace App\Model\Table;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     * @throws \Imagine\Exception\RuntimeException
     * @throws \Imagine\Exception\InvalidArgumentException
     * @throws \RuntimeException
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('users');
        $this->displayField('email');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Bots', [
            'foreignKey' => 'user_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->allowEmpty('token');

        return $validator;
    }

    public function validationPassword(Validator $validator)
    {
        $validator
            ->add('current_password', 'custom', [
                'rule' => function ($value, $context) {
                    $user = $this->get($context['data']['id']);
                    if ($user) {
                        if ((new DefaultPasswordHasher)->check($value, $user->password)) {
                            return true;
                        }
                    }
                    return false;
                },
                'message' => 'The current password does not match.',
            ])
            ->notEmpty('current_password');

        $validator
            ->add('new_password', [
                'length' => [
                    'rule' => ['minLength', 6],
                    'message' => 'The password must be at least 6 characters.',
                ]
            ])
            ->add('new_password', [
                'match' => [
                    'rule' => ['compareWith', 'confirm_password'],
                    'message' => 'The passwords do not match.',
                ]
            ])
            ->notEmpty('new_password');

        $validator
            ->add('confirm_password', [
                'length' => [
                    'rule' => ['minLength', 6],
                    'message' => 'The password must be at least 6 characters.',
                ]
            ])
            ->add('confirm_password', [
                'match' => [
                    'rule' => ['compareWith', 'new_password'],
                    'message' => 'The passwords do not match.',
                ]
            ])
            ->notEmpty('confirm_password');

        return $validator;
    }

    public function validationPasswordReset(Validator $validator)
    {
        $validator
            ->add('new_password', [
                'length' => [
                    'rule' => ['minLength', 6],
                    'message' => 'The password must be at least 6 characters.',
                ]
            ])
            ->add('new_password', [
                'match' => [
                    'rule' => ['compareWith', 'confirm_password'],
                    'message' => 'The passwords do not match.',
                ]
            ])
            ->notEmpty('new_password');

        $validator
            ->add('confirm_password', [
                'length' => [
                    'rule' => ['minLength', 6],
                    'message' => 'The password must be at least 6 characters.',
                ]
            ])
            ->add('confirm_password', [
                'match' => [
                    'rule' => ['compareWith', 'new_password'],
                    'message' => 'The passwords do not match.',
                ]
            ])
            ->notEmpty('confirm_password');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        return $rules;
    }

    /**
     * Look up a user id from token
     * @param $token the token to look up
     * @return the id of the user
     */
    public function getUserIdFromToken($token)
    {
        return $this->find()
            ->where(['token' => $token])
            ->select(['id'])
            ->first()['id'];
    }

    /**
     * Look up a user from email
     * @param $email the email to look up
     * @return the user entity
     */
    public function getUserFromEmail($email)
    {
        $user = $this->find()
            ->where(['email' => $email])
            ->first();

        if ($user) {
            return $user;
        }

        return false;
    }

    /**
     * Look up a user's full_name from id
     * @param $id the user id to look up
     * @return the full_name of the user
     */
    public function getFullName($id)
    {
        $fullName = $this->find()
            ->where(['id' => $id])
            ->select(['first_name', 'last_name'])
            ->first()['full_name'];

        return $fullName;
    }

    /**
     * Look up a user's email from id
     * @param $id the user id to look up
     * @return the email of the user
     */
    public function getEmail($id)
    {
        $fullName = $this->find()
            ->where(['id' => $id])
            ->select(['email'])
            ->first()['email'];

        return $fullName;
    }

    /**
     * Generate and set user's token
     * @param $id
     * @return string the user token
     * @internal param the $userId user id to interact with
     */
    public function setToken($id)
    {
        $token = Text::uuid();
        $user = $this->get($id, [
            'contain' => []
        ]);
        if ($user) {
            $user->token = $token;
            $this->save($user);

            return $user->token;
        }
        return false;
    }

    /**
     * @param $userData
     * @param null $id
     * @return \App\Model\Entity\User|bool
     */
    public function updateUser($userData, $id = null)
    {
        if (!$id && !empty($userData['id'])) {
            $id = $userData['id'];
        }
        if (!$id) {
            return false;
        }
        $user = $this->get($id);
        $user = $this->patchEntity($user, $userData);
        return $this->save($user);
    }
}

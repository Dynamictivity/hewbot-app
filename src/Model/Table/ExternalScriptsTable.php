<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ExternalScripts Model
 *
 * @property \Cake\ORM\Association\HasMany $BotExternalScripts
 *
 * @method \App\Model\Entity\ExternalScript get($primaryKey, $options = [])
 * @method \App\Model\Entity\ExternalScript newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ExternalScript[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ExternalScript|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExternalScript patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ExternalScript[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ExternalScript findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ExternalScriptsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('external_scripts');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('BotExternalScripts', [
            'foreignKey' => 'external_script_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        return $validator;
    }
}

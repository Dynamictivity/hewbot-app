<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bots Model
 *
 * @property \Cake\ORM\Association\BelongsTo $BotAdapters
 * @property \Cake\ORM\Association\HasMany $BotExternalScripts
 *
 * @method \App\Model\Entity\Bot get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bot newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Bot[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bot|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bot patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bot[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bot findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BotsTable extends Table
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

        $this->table('bots');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('BotAdapters', [
            'foreignKey' => 'bot_adapter_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('BotExternalScripts', [
            'foreignKey' => 'bot_id'
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
            ->requirePresence('hubot_slack_token', 'create')
            ->notEmpty('hubot_slack_token');

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
        $rules->add($rules->existsIn(['bot_adapter_id'], 'BotAdapters'));

        return $rules;
    }
}

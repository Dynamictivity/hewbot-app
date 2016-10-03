<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bot Entity
 *
 * @property int $id
 * @property string $name
 * @property int $user_id
 * @property int $bot_adapter_id
 * @property string $hubot_slack_token
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\BotAdapter $bot_adapter
 * @property \App\Model\Entity\BotExternalScript[] $bot_external_scripts
 */
class Bot extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}

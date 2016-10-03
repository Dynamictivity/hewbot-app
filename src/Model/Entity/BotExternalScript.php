<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BotExternalScript Entity
 *
 * @property int $id
 * @property int $bot_id
 * @property int $external_script_id
 * @property int $created
 *
 * @property \App\Model\Entity\Bot $bot
 * @property \App\Model\Entity\ExternalScript $external_script
 */
class BotExternalScript extends Entity
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

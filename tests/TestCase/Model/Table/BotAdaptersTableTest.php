<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BotAdaptersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BotAdaptersTable Test Case
 */
class BotAdaptersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BotAdaptersTable
     */
    public $BotAdapters;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bot_adapters',
        'app.bots'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BotAdapters') ? [] : ['className' => 'App\Model\Table\BotAdaptersTable'];
        $this->BotAdapters = TableRegistry::get('BotAdapters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BotAdapters);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

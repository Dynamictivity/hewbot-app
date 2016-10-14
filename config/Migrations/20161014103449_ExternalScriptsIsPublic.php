<?php
use Migrations\AbstractMigration;

class ExternalScriptsIsPublic extends AbstractMigration
{

    public function up()
    {
        $this->table('external_scripts')
            ->addColumn('is_public', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->update();
    }

    public function down()
    {
        $this->table('external_scripts')
            ->removeColumn('is_public')
            ->update();
    }
}

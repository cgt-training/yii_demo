<?php

use yii\db\Migration;

/**
 * Handles adding role to table `user`.
 */
class m170330_103335_add_role_column_to_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('user', 'role', 'VARCHAR(64) AFTER username');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('user', 'role');
    }
}

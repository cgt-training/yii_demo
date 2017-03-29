<?php

use yii\db\Migration;

/**
 * Handles the creation of table `branch`.
 * Has foreign keys to the tables:
 *
 * - `company`
 */
class m170327_113724_create_branch_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('branch', [
            'branch_id' => $this->primaryKey(),
            'company_id' => $this->integer()->notNull(),
            'branch_name' => $this->string(50)->notNull(),
            'branch_address' => $this->string(200)->notNull(),
            'branch_create_date' => $this->date()->notNull(),
            'branch_status' => $this->string()->notNull(),
        ]);

        // creates index for column `company_id`
        $this->createIndex(
            'idx-branch-company_id',
            'branch',
            'company_id'
        );

        // add foreign key for table `company`
        $this->addForeignKey(
            'fk-branch-company_id',
            'branch',
            'company_id',
            'company',
            'company_id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `company`
        $this->dropForeignKey(
            'fk-branch-company_id',
            'branch'
        );

        // drops index for column `company_id`
        $this->dropIndex(
            'idx-branch-company_id',
            'branch'
        );

        $this->dropTable('branch');
    }
}

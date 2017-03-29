<?php

use yii\db\Migration;

/**
 * Handles the creation of table `department`.
 * Has foreign keys to the tables:
 *
 * - `branch`
 * - `company`
 */
class m170327_113732_create_department_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('department', [
            'dept_id' => $this->primaryKey(),
            'branch_id' => $this->integer()->notNull(),
            'company_id' => $this->integer()->notNull(),
            'dept_name' => $this->string(50)->notNull(),
            'dept_create_date' => $this->date()->notNull(),
            'dept_status' => $this->string()->notNull(),
        ]);

        // creates index for column `branch_id`
        $this->createIndex(
            'idx-department-branch_id',
            'department',
            'branch_id'
        );

        // add foreign key for table `branch`
        $this->addForeignKey(
            'fk-department-branch_id',
            'department',
            'branch_id',
            'branch',
            'branch_id',
            'CASCADE'
        );

        // creates index for column `company_id`
        $this->createIndex(
            'idx-department-company_id',
            'department',
            'company_id'
        );

        // add foreign key for table `company`
        $this->addForeignKey(
            'fk-department-company_id',
            'department',
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
        // drops foreign key for table `branch`
        $this->dropForeignKey(
            'fk-department-branch_id',
            'department'
        );

        // drops index for column `branch_id`
        $this->dropIndex(
            'idx-department-branch_id',
            'department'
        );

        // drops foreign key for table `company`
        $this->dropForeignKey(
            'fk-department-company_id',
            'department'
        );

        // drops index for column `company_id`
        $this->dropIndex(
            'idx-department-company_id',
            'department'
        );

        $this->dropTable('department');
    }
}

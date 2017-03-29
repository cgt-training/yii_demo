<?php

use yii\db\Migration;

/**
 * Handles the creation of table `company`.
 */
class m170327_113657_create_company_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('company', [
            'company_id' => $this->primaryKey(),
            'company_name' => $this->string(100)->unique()->notNull(),
            'company_email' => $this->string()->unique()->notNull(),
            'company_address' => $this->string(200)->notNull(),
            'company_create_date' => $this->date()->notNull(),
            'company_status' => $this->string()->notNull(),
            'registration_date' => $this->date()->notNull(),
            'logo' => $this->string(100)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('company');
    }
}

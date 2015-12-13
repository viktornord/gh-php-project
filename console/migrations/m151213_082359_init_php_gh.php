<?php

use yii\db\Schema;
use yii\db\Migration;

class m151213_082359_init_php_gh extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%orders}}', [
            'id' => $this->primaryKey(),
            'firstname' => $this->string()->notNull()->defaultValue('unknown'),
            'lastname' => $this->string()->notNull()->defaultValue('unknown'),
            'email' => $this->string()->notNull(),
            'site' => $this->string(),
            'phone' => $this->string()->notNull(),
            'with_delivery' => $this->boolean()->notNull()->defaultValue(0),
            'delivery_address' => $this->string()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%goods}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'price' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%orders}}');
        $this->dropTable('{{%goods}}');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}

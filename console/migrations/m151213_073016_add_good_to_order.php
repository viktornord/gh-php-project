<?php

use yii\db\Schema;
use yii\db\Migration;

class m151213_073016_add_good_to_order extends Migration
{
    public function up()
    {
        $this->addColumn('orders', 'good_id', $this->integer()->notNull());
        $this->addColumn('orders', 'total_price', $this->integer()->notNull());
        $this->addColumn('orders', 'goods_count', $this->integer()->notNull());

        $this->addForeignKey('fk-order_good_id', 'orders', 'good_id', 'goods', 'id', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk-order_good_id', 'orders');
        $this->dropColumn('orders', 'good_id');
        $this->dropColumn('orders', 'total_price');
        $this->dropColumn('orders', 'goods_count');
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

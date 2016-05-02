<?php

use yii\db\Migration;

class m160501_200114_image extends Migration
{
    public function up()
    {
        $this->createTable('{{%image}}',[
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'url' => $this->string()->notNull(),
        ]);

        $this->addForeignKey('product_id_image_fk', '{{%image}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'CASCADE');

    }   

    public function down()
    {
        $this->dropTable('{{%image}}');
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

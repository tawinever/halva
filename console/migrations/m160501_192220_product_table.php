<?php

use yii\db\Migration;

class m160501_192220_product_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%product}}',[
            'id' => $this->primaryKey(),
            'supply_id' => $this->integer()->notNull(),
            'title' => $this->text()->notNull(),
            'description' => $this->text()->notNull(),
            'price' => $this->integer()->notNull(),
            'duration' => $this->integer()->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->addForeignKey('supply_id_fk', '{{%product}}', 'supply_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%product}}');
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

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m231113_072808_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'user_id' => $this->primaryKey(),
            'user_name' => $this -> string(50),
            'user_email' => $this -> string(100),
            'user_password' => $this -> string(100),
            'user_type' => $this->string(120)->defaultValue('user'),
            'user_created_at' => $this->dateTime()->defaultValue(Date('Y-m-d H:i:s')),
            'user_updated_at' => $this->dateTime()->defaultValue(Date('Y-m-d H:i:s')),

        ]);
        $this->alterColumn('{{%users}}', 'user_id', $this->smallInteger(8).' NOT NULL AUTO_INCREMENT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}

<?php

use common\models\User;
use yii\db\Migration;


/**
 * Class m231119_102157_tbl_channel
 */
class m231119_102157_tbl_channel extends Migration
{
    /**
     * {@inheritdoc}
     */
//    public function safeUp()
//    {
//
//    }

    /**
     * {@inheritdoc}
     */
//    public function safeDown()
//    {
//        echo "m231119_102157_tbl_channel cannot be reverted.\n";
//
//        return false;
//    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // https://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%tbl_channel}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(190)->notNull()->unique(),
            'did' => $this->string(500)->notNull(),
            'title' => $this->string(),
            'description' => $this->text(),
            'image' => $this->string(250),
            'cover' => $this->string(250),
            'type' => $this->tinyInteger(),
            'status' => $this->smallInteger()->notNull()->defaultValue(9),

            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'last_post_at' => $this->integer()->notNull(),

            'verified' => $this->tinyInteger(1),
            'tags' => $this->string(1000),
            'addresses' => $this->string(1000),
            'config' => $this->json(),
            'user_sid' => $this->bigInteger(),
            'user_id' => $this->integer(),
            'pinned_video_id' => $this->integer(),
            'pa_id' => $this->tinyInteger(1),


        ], $tableOptions);

        $this->addForeignKey(
            '{{%user}}',
            '{{%tbl_channel}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropTable('tbl_channel');

        return false;
    }

}

<?php

use yii\db\Migration;

/**
 * Class m231119_130758_tbl_playlist
 */
class m231119_130758_tbl_playlist extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // https://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%tbl_playlist}}', [
            'id' => $this->primaryKey(),
            'did' => $this->string(500)->notNull(),
            'title' => $this->string(),
            'description' => $this->text(),
            'slug' => $this->string(250),
            'image' => $this->string(250),
            'type' => $this->tinyInteger(),
            'sequence' => $this->tinyInteger(),
            'status' => $this->smallInteger()->notNull()->defaultValue(9),

            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),

            'tags' => $this->string(1000),
            'config' => $this->json(),
            'user_id' => $this->integer(),
            'channel_id' => $this->integer(),


        ], $tableOptions);

        $this->addForeignKey('fk-ch-id', 'tbl_playlist', 'channel_id', 'tbl_channel', 'id',
            'CASCADE', 'CASCADE');
        $this->addForeignKey('fk-usr-id', 'tbl_playlist', 'user_id', '{{%user}}', 'id',
        'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m231119_130758_tbl_playlist cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231119_130758_tbl_playlist cannot be reverted.\n";

        return false;
    }
    */
}

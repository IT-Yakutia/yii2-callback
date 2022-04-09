<?php

use yii\db\Migration;

/**
 * Class m200328_135424_callback_init
 */
class m200328_135424_callback_init extends Migration
{

    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('callback', [
            'id' => $this->primaryKey(),
            'hash' => $this->string(32)->notNull(),
            'title' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'message' => $this->text()->notNull(),
            'phone' => $this->string()->notNull(),
            'is_accept_consent_pd' => $this->boolean()->notNull(),
            
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('callback');
    }
}

<?php

use yii\db\Migration;

class m161209_123403_google_place_table extends Migration
{
    public function up()
    {
        $strOptions = null;
        if ($this->db->driverName === 'mysql') {
            $strOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%google_place}}', [
            'id' => $this->char(255)->notNull(),
            'name' => $this->string(255)->notNull(),
            'full_name' => $this->string(255)->notNull(),
            'type' => $this->char(32)->notNull(),
            'url' => $this->text(),
            'location_lat' => $this->decimal(10,7)->notNull(),
            'location_lng' => $this->decimal(10,7)->notNull(),
            'viewport_ne_lat' => $this->decimal(10,7),
            'viewport_ne_lng' => $this->decimal(10,7),
            'viewport_sw_lat' => $this->decimal(10,7),
            'viewport_sw_lng' => $this->decimal(10,7),
            'raw_data' => $this->text(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ], $strOptions);

        $this->addPrimaryKey('pk', '{{%google_place}}', ['id']);
    }

    public function down()
    {
        $this->dropTable('{{%google_place}}');
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

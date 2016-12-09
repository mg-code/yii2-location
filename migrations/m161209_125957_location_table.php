<?php

use yii\db\Migration;

class m161209_125957_location_table extends Migration
{
    public function up()
    {
        $strOptions = null;
        if ($this->db->driverName === 'mysql') {
            $strOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%location}}', [
            'id' => $this->bigPrimaryKey(22)->unsigned(),
            'google_id' => $this->char(255),
            'region' => $this->string(255),
            'city' => $this->string(255),
            'address' => $this->string(255),
            'zip_code' => $this->string(255),
            'lat' => $this->decimal(10,7),
            'lng' => $this->decimal(10,7),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->dateTime()->notNull(),
        ], $strOptions);


        $this->addForeignKey('fk_location_google_id', '{{%location}}', 'google_id', '{{%google_place}}', 'id', 'RESTRICT', 'CASCADE');
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

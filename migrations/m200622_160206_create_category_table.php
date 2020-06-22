<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m200622_160206_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%categories}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer()->null()->defaultValue(NULL),
            'name' => $this->string()
        ]);

        $this->addForeignKey(
            'fk-categories-parent_id',
            'categories',
            'parent_id',
            'categories',
            'id',
            'CASCADE'
        );

        $this->batchInsert('categories',['id','parent_id','name'],[
            [null,null,'Cat A'],
            [null,null,'Cat B'],
            [null,null,'Cat C'],
            [null,null,'Cat D'],

            [null,1,'Cat A - 1'],
            [null,1,'Cat A - 2'],
            [null,1,'Cat A - 3'],
            [null,5,'Cat A - 1 - 1'],
            [null,6,'Cat A - 2 - 1'],

            [null,2,'Cat B - 1'],
            [null,2,'Cat B - 2'],
            [null,2,'Cat B - 3'],

            [null,10,'Cat B - 1 - 1'],
            [null,11,'Cat A - 2 - 1'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%category}}');
    }
}

<?php

class m170821_014133_create_table_pegawai_gaji extends CDbMigration
{

    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
        $dbEngine = 'InnoDB';

        $this->createTable('pegawai_gaji', ["
            `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
            `pegawai_id` int(10) unsigned NOT NULL,
            `gaji` decimal(18,2) NOT NULL,
            `per_tanggal` date NOT NULL,
            `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            `updated_by` int(10) unsigned NOT NULL,
            `created_at` timestamp NOT NULL DEFAULT '2000-01-01 00:00:00',
            PRIMARY KEY (`id`),
            KEY `fk_pegawai_gaji_updatedby_idx` (`updated_by`),
            KEY `fk_pegawai_gaji_pegawai_idx` (`pegawai_id`),
            CONSTRAINT `fk_pegawai_gaji_pegawai` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
            CONSTRAINT `fk_pegawai_gaji_updatedby` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION"
                ], 'ENGINE=' . $dbEngine . ' DEFAULT CHARSET=utf8');
    }

    public function safeDown()
    {
        echo "m170821_014133_create_table_pegawai_gaji does not support migration down.\n";
        return false;
    }

}

<?php

class m171207_012937_add_pegawai_mutasi extends CDbMigration
{

    public function safeUp()
    {

        $this->createTable('pegawai_mutasi', ["
            `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
            `pegawai_id` int(10) unsigned NOT NULL,
            `nama` varchar(50) NOT NULL,
            `per_tanggal` date NOT NULL,
            `keterangan` varchar(1000) DEFAULT NULL,
            `jabatan_id` int(10) unsigned NOT NULL,
            `bagian_id` int(10) unsigned NOT NULL,
            `cabang_id` int(10) unsigned NOT NULL,
            `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            `updated_by` int(10) unsigned NOT NULL,
            `created_at` timestamp NOT NULL DEFAULT '2000-01-01 00:00:00',
            PRIMARY KEY (`id`),
            KEY `fk_mutasi_updatedby_idx` (`updated_by`),
            KEY `fk_mutasi_pegawai_idx` (`pegawai_id`),
            KEY `fk_mutasi_jabatan_idx` (`jabatan_id`),
            KEY `fk_mutasi_bagian_idx` (`bagian_id`),
            KEY `fk_mutasi_cabang_idx` (`cabang_id`),
            KEY `mutasi_per_tanggal_idx` (`per_tanggal`),
            CONSTRAINT `fk_mutasi_bagian` FOREIGN KEY (`bagian_id`) REFERENCES `bagian` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
            CONSTRAINT `fk_mutasi_cabang` FOREIGN KEY (`cabang_id`) REFERENCES `cabang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
            CONSTRAINT `fk_mutasi_jabatan` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
            CONSTRAINT `fk_mutasi_pegawai` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
            CONSTRAINT `fk_mutasi_updatedby` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
                "], "ENGINE=InnoDB DEFAULT CHARSET=utf8");

//        $this->addForeignKey('fk_mutasi_bagian', 'pegawai_mutasi', 'bagian_id', 'bagian', 'id');
//        $this->addForeignKey('fk_mutasi_cabang', 'pegawai_mutasi', 'cabang_id', 'cabang', 'id');
//        $this->addForeignKey('fk_mutasi_jabatan', 'pegawai_mutasi', 'jabatan_id', 'jabatan', 'id');
//        $this->addForeignKey('fk_mutasi_pegawai', 'pegawai_mutasi', 'pegawai_id', 'pegawai', 'id');
//        $this->addForeignKey('fk_mutasi_updatedby', 'pegawai_mutasi', 'updated_by', 'user', 'id');
        // Isi data awal, jika ada
        $this->execute("
            INSERT INTO pegawai_mutasi (pegawai_id,nama,per_tanggal,jabatan_id,bagian_id,cabang_id,created_at,updated_by)
            (
            SELECT id, nama, date_format(created_at,'%Y-%m-%d'), jabatan_id, bagian_id, cabang_id, NOW(), 1
            FROM pegawai
            )
            ");

        $this->dropForeignKey('fk_pegawai_cabang', 'pegawai');
        $this->dropForeignKey('fk_pegawai_bagian', 'pegawai');
        $this->dropForeignKey('fk_pegawai_jabatan', 'pegawai');
        $this->dropColumn('pegawai', 'cabang_id');
        $this->dropColumn('pegawai', 'bagian_id');
        $this->dropColumn('pegawai', 'jabatan_id');
    }

    public function safeDown()
    {
        echo "m171207_012937_add_pegawai_mutasi does not support migration down.\n";
        return false;
    }

}

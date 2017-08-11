<?php

class m170810_021040_initdb_sdm extends CDbMigration
{

    public function safeUp()
    {
        $dbEngine = 'InnoDB';

        $this->createTable('bagian', [
            "`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
              `nama` varchar(50) NOT NULL,
              `keterangan` varchar(500) DEFAULT NULL,
              `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
              `updated_by` int(10) unsigned NOT NULL,
              `created_at` timestamp NOT NULL DEFAULT '2000-01-01 00:00:00',
              PRIMARY KEY (`id`),
              UNIQUE KEY `nama` (`nama`),
              KEY `fk_bagian_updatedby_idx` (`updated_by`),
              CONSTRAINT `fk_bagian_updatedby` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION"
                ], 'ENGINE=' . $dbEngine . ' DEFAULT CHARSET=utf8');

        $this->createTable('cabang', [
            "`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
              `nama` varchar(50) NOT NULL,
              `alamat` varchar(500) DEFAULT NULL,
              `telpon` varchar(500) DEFAULT NULL,
              `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
              `updated_by` int(10) unsigned NOT NULL,
              `created_at` timestamp NOT NULL DEFAULT '2000-01-01 00:00:00',
              PRIMARY KEY (`id`),
              UNIQUE KEY `nama` (`nama`),
              KEY `fk_cabang_updatedby_idx` (`updated_by`),
              CONSTRAINT `fk_cabang_updatedby` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION"
                ], 'ENGINE=' . $dbEngine . ' DEFAULT CHARSET=utf8');

        $this->createTable('jabatan', [
            "`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
              `nama` varchar(50) NOT NULL,
              `keterangan` varchar(500) DEFAULT NULL,
              `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
              `updated_by` int(10) unsigned NOT NULL,
              `created_at` timestamp NOT NULL DEFAULT '2000-01-01 00:00:00',
              PRIMARY KEY (`id`),
              UNIQUE KEY `nama` (`nama`),
              KEY `fk_jabatan_updatedby_idx` (`updated_by`),
              CONSTRAINT `fk_jabatan_updatedby` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION"
                ], 'ENGINE=' . $dbEngine . ' DEFAULT CHARSET=utf8');

        $this->createTable('pegawai', [
            "`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
              `nip` varchar(50) DEFAULT NULL,
              `nama` varchar(50) NOT NULL,
              `alamat` varchar(250) NOT NULL,
              `tanggal_lahir` date NOT NULL,
              `jabatan_id` int(10) unsigned NOT NULL,
              `bagian_id` int(10) unsigned NOT NULL,
              `cabang_id` int(10) unsigned NOT NULL,
              `telpon` varchar(50) NOT NULL,
              `perusahaan` varchar(50) NOT NULL DEFAULT 'Ahadmart',
              `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
              `updated_by` int(10) unsigned NOT NULL,
              `created_at` timestamp NOT NULL DEFAULT '2000-01-01 00:00:00',
              PRIMARY KEY (`id`),
              UNIQUE KEY `nip_UNIQUE` (`nip`),
              KEY `fk_pegawai_updatedby_idx` (`updated_by`),
              KEY `fk_pegawai_jabatan_idx` (`jabatan_id`),
              KEY `fk_pegawai_bagian_idx` (`bagian_id`),
              KEY `fk_pegawai_cabang_idx` (`cabang_id`),
              CONSTRAINT `fk_pegawai_jabatan` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
              CONSTRAINT `fk_pegawai_bagian` FOREIGN KEY (`bagian_id`) REFERENCES `bagian` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
              CONSTRAINT `fk_pegawai_cabang` FOREIGN KEY (`cabang_id`) REFERENCES `cabang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
              CONSTRAINT `fk_pegawai_updatedby` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION"
                ], 'ENGINE=' . $dbEngine . ' DEFAULT CHARSET=utf8');

        $this->createTable('pegawai_config', [
            "`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
              `pegawai_id` int(10) unsigned NOT NULL,
              `cuti_tahunan` decimal(4,2) NOT NULL DEFAULT '0.00' COMMENT 'Bisa pecahan, misal 0.5 hari',
              `bpjs` tinyint(1) NOT NULL DEFAULT '1',
              `tunjangan_anak` decimal(18,2) NOT NULL DEFAULT '0.00',
              `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
              `updated_by` int(10) unsigned NOT NULL,
              `created_at` timestamp NOT NULL DEFAULT '2000-01-01 00:00:00',
              PRIMARY KEY (`id`),
              KEY `fk_pegawai_config_updatedby_idx` (`updated_by`),
              KEY `fk_pegawai_config_pegawai_idx` (`pegawai_id`),
              CONSTRAINT `fk_pegawai_config_pegawai` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
              CONSTRAINT `fk_pegawai_config_updatedby` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION"
                ], 'ENGINE=' . $dbEngine . ' DEFAULT CHARSET=utf8');

        $this->createTable('pegawai_cuti', [
            "`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
              `pegawai_id` int(10) unsigned NOT NULL,
              `nama` varchar(50) NOT NULL,
              `cuti` decimal(4,2) NOT NULL COMMENT 'Bisa pecahan, misal 0.5 (hari)',
              `mulai_cuti` date NOT NULL,
              `alasan` varchar(20) NOT NULL,
              `keterangan` varchar(250) NOT NULL,
              `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
              `updated_by` int(10) unsigned NOT NULL,
              `created_at` timestamp NOT NULL DEFAULT '2000-01-01 00:00:00',
              PRIMARY KEY (`id`),
              KEY `fk_cuti_updatedby_idx` (`updated_by`),
              KEY `fk_cuti_pegawai_idx` (`pegawai_id`),
              CONSTRAINT `fk_cuti_pegawai` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
              CONSTRAINT `fk_cuti_updatedby` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION"
                ], 'ENGINE=' . $dbEngine . ' DEFAULT CHARSET=utf8');
    }

    public function safeDown()
    {
        echo "m170810_021040_initdb_sdm does not support migration down.\n";
    }

}

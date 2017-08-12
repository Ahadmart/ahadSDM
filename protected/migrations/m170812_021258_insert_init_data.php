<?php

class m170812_021258_insert_init_data extends CDbMigration
{

    public function safeUp()
    {
        $this->insertMultiple('cabang', [
            ['nama' => 'Ahadmart Ceger', 'updated_by' => 1, 'created_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Ahadmart Pondok Kacang', 'updated_by' => 1, 'created_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Ahadmart UIN', 'updated_by' => 1, 'created_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Gudang', 'updated_by' => 1, 'created_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Ahadmart Legoso', 'updated_by' => 1, 'created_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Ahadmart Gandul 1', 'updated_by' => 1, 'created_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Ahadmart Gandul 2', 'updated_by' => 1, 'created_at' => date('Y-m-d H:i:s')],
        ]);

        $this->insertMultiple('bagian', [
            ['nama' => 'Toko', 'updated_by' => 1, 'created_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Gudang', 'updated_by' => 1, 'created_at' => date('Y-m-d H:i:s')],
            ['nama' => 'IT', 'updated_by' => 1, 'created_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Manajemen', 'updated_by' => 1, 'created_at' => date('Y-m-d H:i:s')],
        ]);

        $this->insertMultiple('jabatan', [
            ['nama' => 'Kepala Toko', 'updated_by' => 1, 'created_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Kasir', 'updated_by' => 1, 'created_at' => date('Y-m-d H:i:s')],
        ]);

        $this->insertMultiple('alasan_cuti', [
            ['nama' => 'Sakit', 'updated_by' => 1, 'created_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Urusan Keluarga', 'updated_by' => 1, 'created_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Absen', 'updated_by' => 1, 'created_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Libur', 'updated_by' => 1, 'created_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Lainnya', 'updated_by' => 1, 'created_at' => date('Y-m-d H:i:s')],
        ]);
    }

    public function safeDown()
    {
        echo "m170812_021258_insert_init_data does not support migration down.\n";
        return false;
    }

}

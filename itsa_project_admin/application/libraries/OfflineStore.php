<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OfflineStore
{
    protected $CI;
    public function __construct()
    {
        $this->CI =& get_instance();
    }
    public function hitungTotalHarga($belanjaan)
    {
        $totalHarga = 0;

        foreach ($belanjaan as $item) {
            $jenis = $item['jenis'];
            $harga = $item['harga'];
            $jumlah = $item['jumlah'];

            switch ($jenis) {
                case 'anak':
                    if ($jumlah >= 2) {
                        $harga = $harga * $jumlah * 0.8;
                    }
                    break;
                case 'laki-laki':
                    if ($this->CI->session->userdata('member')) {
                        $harga = $harga * $jumlah * 0.65;
                    }
                    break;
                case 'wanita':
                    if ($jumlah >= 2) {
                        $harga = $harga * ($jumlah - 1);
                    }
                    break;
            }

            $totalHarga += $harga;
        }

        return $totalHarga + (count($belanjaan) * 2000);
    }
}

<?php
require_once 'Pembayaran.php';
require_once 'Cetak.php';

class COD extends Pembayaran implements Cetak {
    public function prosesPembayaran() {
        if ($this->validasi()) {
            $total = $this->hitungTotal();
            return "Pembayaran COD berhasil! <br> Jumlah awal: Rp " . number_format($this->jumlah, 0, ',', '.') . "<br> Total yang harus dibayar (diskon 10% + pajak 11%): Rp " . number_format($total, 0, ',', '.');
        }
        return "Jumlah tidak valid";
    }

    public function cetakStruk() {
        $total = $this->hitungTotal();
        return "=== STRUK COD === <br> Jumlah awal: Rp " . number_format($this->jumlah, 0, ',', '.') . "<br> Diskon (10%): Rp " . number_format($this->jumlah * $this->diskon, 0, ',', '.') . "<br> Pajak (11% dari setelah diskon): Rp " . number_format(($this->jumlah - ($this->jumlah * $this->diskon)) * $this->pajak, 0, ',', '.') . "<br> Total pembayaran: Rp " . number_format($total, 0, ',', '.');
    }
}
?>
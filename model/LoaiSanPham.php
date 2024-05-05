<?php

class LoaiSanPham {
    private $maLoaiSP;
    private $tenLoaiSP;
    private $icon;
    private $biDanh;

    public function __construct($maLoaiSP = null, $tenLoaiSP = null, $icon = null, $biDanh = null) {
        $this->maLoaiSP = $maLoaiSP;
        $this->tenLoaiSP = $tenLoaiSP;
        $this->icon = $icon;
        $this->biDanh = $biDanh;
    }

    public function getMaLoaiSP() {
        return $this->maLoaiSP;
    }

    public function setMaLoaiSP($maLoaiSP) {
        $this->maLoaiSP = $maLoaiSP;
    }

    public function getTenLoaiSP() {
        return $this->tenLoaiSP;
    }

    public function setTenLoaiSP($tenLoaiSP) {
        $this->tenLoaiSP = $tenLoaiSP;
    }

    public function getIcon() {
        return $this->icon;
    }

    public function setIcon($icon) {
        $this->icon = $icon;
    }

    public function getBiDanh() {
        return $this->biDanh;
    }

    public function setBiDanh($biDanh) {
        $this->biDanh = $biDanh;
    }
}


?>
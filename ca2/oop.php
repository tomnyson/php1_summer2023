<?php
class CongNguoi
{
    public $ten;
    public $tuoi;
    private $gioiTinh;

    function __construct($ten, $tuoi, $gioiTinh)
    {
        $this->ten = $ten;
        $this->tuoi = $tuoi;
        $this->gioiTinh = $gioiTinh;
    }

    function xuatThuongTin()
    {
        echo "Ten: " . $this->ten . "<br>";
        echo "Tuoi: " . $this->tuoi . "<br>";
        echo "GioiTinh: " . $this->gioiTinh . "<br>";
    }

    function getGioiTinh()
    {
        return $this->gioiTinh;
    }

    function setGioiTinh($gioiTinh)
    {
        $this->gioiTinh = $gioiTinh;
    }
}

$nguoi = new CongNguoi('teo', 18, 'nu');
$nguoi1 = new CongNguoi('teo1', 20, 'nam');
// $nguoi->xuatThuongTin();
// $nguoi1->xuatThuongTin();
echo $nguoi1->getGioiTinh();
$nguoi1->setGioiTinh('nu');
echo $nguoi1->getGioiTinh();

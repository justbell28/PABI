<?php
class Produk {
    private  $judul,
            $penulis,
            $penerbit;
    protected $diskon = 0;

    private $harga = 0;
    
    public function __construct($judul = "judul", $penulis = "penulis",$penerbit="penerbit",$harga = 0)//"__" method special
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        
    }

    public function setJudul($judul){
       
        $this->judul = $judul;
    }

    public function getJudul(){
     return $this->judul;   
    }

    public function setPenulis($penulis){
       
        $this->penulis = $penulis;
    }

    public function getPenulis($penulis){
       
        $this->penulis = $penulis;
    }

    public function getPenerbit($penerbit){
       
        $this->penerbit = $penerbit;
    }

    public function setPenerbit($penerbit){
       
        $this->penerbit = $penerbit;
    }

    public function getHarga(){
        return $this->harga - ($this->harga * $this->diskon/100 );
    }

    public function getLabel(){
        return "$this->penulis, $this->penerbit";
        //fungsi this mengambil properti yang berada didalam kelas yang bersangkutan 
    }

    public function getInfoProduk () {
        //Komik : Naruto | Mashashi Kishimoto, Shonen Jump (Rp. 30000) - 100 Halaman.
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        
        return $str;
    }        
}

class CetakInfoProduk{
    public function cetak($produk){
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp.{$produk->harga})";
        return $str;
    }
}

class Komik extends Produk{
    public $jmlHalaman;

    public function __construct($judul = "judul", $penulis = "penulis",$penerbit="penerbit", $harga = 0, $jmlHalaman = 0 ){
       parent::__construct($judul , $penulis ,$penerbit,$harga);

       $this->jmlHalaman = $jmlHalaman;
    }
    public function getInfoProduk()
    {
        $str = "Komik : ". parent :: getInfoProduk() ." - {$this->jmlHalaman} Halaman.";
        return $str;
    }
}    

class Game extends Produk{
    public $waktuMain;
    public function __construct($judul = "judul", $penulis = "penulis",$penerbit="penerbit",$harga = 0, $waktuMain = 0 )
    {
        parent ::__construct($judul , $penulis ,$penerbit,$harga);

        $this->waktuMain = $waktuMain;
    }

    public function setDiskon($diskon){
        $this->diskon = $diskon;   
       }

    public function getInfoProduk()
    {
        $str = "Game : ". parent::getInfoProduk()." ~ {$this->waktuMain} Jam.";
        return $str;
    }
}  

$produk1  = new Komik("Naruto","Masashi Kishimoto","Shonen Jump",30000, 100);

$produk2 = new Game("Uncharted","Neil Druckmann","Sony Computer",250000, 50);

echo  $produk1->getInfoProduk ();
echo "<br>";
echo $produk2->getInfoProduk();
echo "<hr>";
$produk2->setDiskon(50);
echo $produk2 -> getHarga();
echo "<hr>";

echo $produk2->getJudul();
?>
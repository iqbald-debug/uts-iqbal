<?php
abstract class ProdukBuku {
    protected $id;
    protected $nama;
    protected $hargaDasar;

    public function __construct($id, $nama, $hargaDasar) {
        $this->id = $id;
        $this->nama = $nama;
        $this->hargaDasar = $hargaDasar;
    }

    public function getId() { return $this->id; }
    public function getNama() { return $this->nama; }
    public function getHargaDasar() { return $this->hargaDasar; }

    abstract public function hitungTotal();
    abstract public function getJenis();
}

class Novel extends ProdukBuku {
    private $halaman;

    public function __construct($id, $nama, $hargaDasar, $halaman) {
        parent::__construct($id, $nama, $hargaDasar);
        $this->halaman = $halaman;
    }

    public function hitungTotal() {
        return $this->hargaDasar + (500 * $this->halaman);
    }

    public function getJenis() {
        return "Novel";
    }

    public function cetakDetail() {
        return "Halaman: " . $this->halaman;
    }
}

class BukuPelajaran extends ProdukBuku {
    private $kelas;

    public function __construct($id, $nama, $hargaDasar, $kelas) {
        parent::__construct($id, $nama, $hargaDasar);
        $this->kelas = $kelas;
    }

    public function hitungTotal() {
        return $this->hargaDasar + (10000 * $this->kelas);
    }

    public function getJenis() {
        return "Buku Pelajaran";
    }

    public function cetakDetail() {
        return "Kelas: " . $this->kelas;
    }
}

class Majalah extends ProdukBuku {
    private $edisi;

    public function __construct($id, $nama, $hargaDasar, $edisi) {
        parent::__construct($id, $nama, $hargaDasar);
        $this->edisi = $edisi;
    }

    public function hitungTotal() {
        $total = $this->hargaDasar + (2000 * $this->edisi);
        $D = 5; 
        
        if ($this->edisi > $D) {
            $total = $total - ($total * 0.05);
        }
        return $total;
    }

    public function getJenis() {
        return "Majalah";
    }

    public function cetakDetail() {
        return "Edisi: " . $this->edisi;
    }
}

// Instansiasi Objek
$buku1 = new Novel("NVL-001", "Kisah Budi", 50000, 200);
$buku2 = new BukuPelajaran("BP-001", "Biologi Andi", 45000, 10);
$buku3 = new Majalah("MJL-001", "Gaya Siti", 30000, 6); 
$buku4 = new Novel("NVL-002", "Laskar Pelangi", 65000, 350);
$buku5 = new BukuPelajaran("BP-002", "Matematika Lanjut", 55000, 12);

$daftarBuku = [$buku1, $buku2, $buku3, $buku4, $buku5];
$totalKeseluruhan = 0;

echo "=== DAFTAR PRODUK BUKU === <b>";

$no = 1;
foreach ($daftarBuku as $buku) {
    $totalBuku = $buku->hitungTotal();
    $totalKeseluruhan += $totalBuku;
    
    echo $no++ . ". ID: " . $buku->getId() . "<b>";
    echo "   Nama        : " . $buku->getNama() . "<b>";
    echo "   Jenis       : " . $buku->getJenis() . "<b>";
    echo "   Harga Dasar : Rp " . number_format($buku->getHargaDasar(), 0, ',', '.') . "<b>";
    echo "   Detail      : " . $buku->cetakDetail() . "<b>";
    echo "   Total       : Rp " . number_format($totalBuku, 0, ',', '.') . "<b>";
    echo "----------------------------------<b>";
}

echo "TOTAL KESELURUHAN: Rp " . number_format($totalKeseluruhan, 0, ',', '.') . "<b>";

echo "=== STRUKTUR ARRAY (print_r) ===<b>";
print_r($daftarBuku);
?>
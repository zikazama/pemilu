<?php
Class Cetak extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    
    function index(){
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(270,7,'DATA MAHASISWA POLITEKNIK NEGERI SUBANG',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(270,7,'OLEH KPU BEM-KEMA POLSUB',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',12);
        /*
        $pdf->Cell(20,6,'NIM',1,0);
        $pdf->Cell(85,6,'PRODI',1,0);
        $pdf->Cell(27,6,'TINGKAT',1,0);
        $pdf->Cell(25,6,'PASSWORD',1,1);
        $pdf->SetFont('Arial','',10);
        */
        $hitung = 1;
        function cek($par) {
            if ($par % 3 == 0) {
                return 1;
            } else {
                return 0;
            }
        }
        function cek2($par) {
            if (($par-4) % 3 == 0) {
                return 1;
            } else {
                return 0;
            }
        }
        
        

        $xk = 20;
        $yk = 30;
        $a = 10;
        $mahasiswa = $this->db->get('user')->result();
        foreach ($mahasiswa as $row){
            $pdf->Rect($xk,$yk,60,30);
            $pdf->Line($xk,$yk+10,$xk+60,$yk+10);
            $pdf->Cell(80,10,'KPU POLSUB',0,0,'C');
            $pdf->Cell(-100,30,"NIM     : $row->nim",0,0,'C');
            $pdf->Cell(110,45,"PASSWORD : $row->password",0,cek($hitung),'C');
            $hitung++;
            if (cek2($hitung) == 0) {
                $xk += 90;   
            } else {
                $xk = 20;
                $yk += 45;
            } 
                if ($hitung % $a == 0) {
                    $pdf->AddPage();
                    $pdf->Cell(10,7,'',0,1);
                    $pdf->Cell(10,9,'',0,1);
                    $xk = 20;
                    $yk = 25;
                    $a += 9;
                }    
             
        }
        
        
        $pdf->Output();
    }
}
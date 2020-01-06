<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Fpdf\Fpdf;
class reportProduct extends FPDF
{
  var $widths;
  var $aligns;

function SetWidths($w)
{
  $this->widths=$w;
}

function SetAligns($a)
{
  $this->aligns=$a;
}

function Row($data)
{
  $nb=0;
  for($i=0;$i<count($data);$i++)
    $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
  $h=(4*$nb);
  $this->CheckPageBreak($h);
  for($i=0;$i<count($data);$i++)
  {
   $w=$this->widths[$i];
   $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
   $x=$this->GetX();
   $y=$this->GetY();
   $this->Rect($x,$y,$w,$h);
   $this->MultiCell($w,4,$data[$i],0,$a);
   $this->SetXY($x+$w,$y);
  }
  $this->Ln($h);
}

function CheckPageBreak($h)
{
  if($this->GetY()+$h>$this->PageBreakTrigger)
  $this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
  $cw=&$this->CurrentFont['cw'];
  if($w==0)
   $w=$this->w-$this->rMargin-$this->x;
  $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
  $s=str_replace("r",'',$txt);
  $nb=strlen($s);
  if($nb>0 and $s[$nb-1]=="n")
   $nb--;
  $sep=-1;
  $i=0;
  $j=0;
  $l=0;
  $nl=1;
  while($i<$nb)
  {
   $c=$s[$i];
   if($c=="n")
   {
    $i++;
    $sep=-1;
    $j=$i;
    $l=0;
    $nl++;
    continue;
   }
   if($c==' ')
    $sep=$i;
   $l+=$cw[$c];
   if($l>$wmax)
   {
    if($sep==-1)
    {
     if($i==$j)
      $i++;
    }
    else
     $i=$sep+1;
    $sep=-1;
    $j=$i;
    $l=0;
    $nl++;
   }
   else
   $i++;
 }
 return $nl;
}

function Header()
{
  if($this->kriteria=="report")
  {
    //   $this->SetX(0);
    $this->image(base_url().'assets/images/logo-print.png',160,10,35,13);
        $this->SetFont('Times', 'B','11');
        $this->Cell(0,4,'Main Dealer ',0,1,'L');
        $this->Cell(0,5,'Tim Audit Triomotor Honda ',0,1,'L');
        $this->Cell(0,5,'Cabang '.$this->nama,0,1,'L');
        $this->SetLineWidth(0.3);
        $this->line(10,25,200,25);
        $this->ln(5);
        if ($this->PageNo()>=2) {
            $this->Cell(8,15,'No',1,0,'C',TRUE);
            $this->Cell(25,15,'No Mesin',1,0,'C',TRUE);
            $this->Cell(28,15,'No Rangka',1,0,'C',TRUE);
            $this->Cell(27,15,'Type Unit',1,0,'C',TRUE);
            $this->Cell(20,15,'Umur Unit',1,0,'C',TRUE); 
            $this->Cell(25,15,'Lokasi',1,0,'C',TRUE);
            $this->Cell(25,15,'Status Unit',1,0,'C',TRUE);
            $this->Cell(25,15,'Keterangan',1,1,'C',TRUE);   
        }
  }elseif($this->kriteria=="status"){
      if ($this->PageNo()>=2) {
        $this->SetFont('Arial','B',8);
        $this->Cell(8,6,'NO',1,0,'C');
        $this->Cell(25,6,'NO MESIN',1,0,'C');
        $this->Cell(28,6,'NO RANGKA',1,0,'C');
        $this->Cell(25,6,'KODE ITEM',1,0,'C');
        $this->Cell(27,6,'TYPE UNIT',1,0,'C');
        $this->Cell(25,6,'USIA UNIT',1,0,'C');
        $this->Cell(25,6,'LOKASI',1,0,'C');
        $this->Cell(25,6,'STATUS',1,1,'C');
      }

  }
}

function Footer()
{
//   Position at 1.5 cm from bottom
$this->SetFont('Times','','14');
  $this->SetY(-20);
//   Arial italic 8
  $this->SetFont('Arial','',6);
//   Page number
$page = $this->PageNo();
  $this->Cell(0,5,$page,0,0,'C');
}

public function setKriteria($i)
{
  $this->kriteria=$i;
}

public function getKriteria()
{
  return $this->kriteria;
}

public function setNama($n)
{
  $this->nama=$n;
}

public function getNama()
{
  return $this->nama;
}

public function setDataset($n)
{
  $this->dataset=$n;
}

public function getDataset()
{
  return $this->dataset;
}

}

?>
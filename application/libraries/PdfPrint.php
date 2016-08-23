<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PdfPrint
{	
	public function __construct()
	{
        $this->obj =& get_instance();
	}

	public function printPDF($html = "<h1>Test Page</h1>"){
		$ci = $this->obj;
		$ci->load->library("Pdf");
		$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
    	$pdf->SetCreator(PDF_CREATOR);
        // Add a page
        $pdf->AddPage();
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Output();
	}
	public function test()
	{
		echo "jadi";
	}
}
?>
<?php 
class pdfexample extends CI_Controller{
      function __construct()
    	{ parent::__construct(); } 
    function index() {
     $this->load->library("Pdf");
    $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
        // Add a page
        $pdf->AddPage();
        $html = "<h1>Test Page</h1>";
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Output();
    }
}
?>
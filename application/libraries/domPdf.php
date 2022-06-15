<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Pdf
{
  public function generate($html,$filename,$kertas)
  {
    define('DOMPDF_ENABLE_AUTOLOAD', false);
    require_once("dompdf/dompdf_config.inc.php");
 

    $dompdf = new DOMPDF();

    $dompdf->load_html($html);
 	$dompdf->set_paper('A4', $kertas);   
    $dompdf->render();
    $dompdf->stream($filename.'.pdf',array("Attachment"=>0));

  }
}
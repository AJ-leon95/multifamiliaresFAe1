<?php
use Dompdf\Dompdf;
use Dompdf\Options;

class Pdf
{
    protected $ci;
    protected $dompdf;

    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->helper('file');
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $this->dompdf = new Dompdf($options);
    }

    public function load_view($view, $data = array())
    {
        $html = $this->ci->load->view($view, $data, TRUE);
        $this->dompdf->loadHtml($html);
    }

    public function render()
    {
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
    }

    public function stream($filename = "document.pdf")
    {
        $this->render();
        $this->dompdf->stream($filename, array("Attachment" => 0));
    }

    public function download($filename = "document.pdf")
    {
        $this->render();
        $output = $this->dompdf->output();
        file_put_contents($filename, $output);
    }
}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class certificate extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_certificate', 'model');
        $this->user = $this->bodo->Dec($this->session->userdata('id_user'));
    }

    function AddText($pdf, $text, $x, $y, $a, $f, $t, $s, $r, $g, $b) {
        $pdf->SetFont($f, $t, $s);
        $pdf->SetXY($x, $y);
        $pdf->SetTextColor($r, $g, $b);
        $pdf->Cell(70, 10, $text, 0, 0, $a);
    }

    function AddTextTitle($pdf, $text, $x, $y, $a, $f, $t, $s, $r, $g, $b) {
        $pdf->SetFont($f, $t, $s);
        $pdf->SetXY($x, $y);
        $pdf->SetTextColor($r, $g, $b);
        $pdf->Cell(40, 10, $text, 0, 0, $a);
    }

    function AddDate($pdf, $text, $x, $y, $a, $f, $t, $s, $r, $g, $b) {
        $pdf->SetFont($f, $t, $s);
        $pdf->SetXY($x, $y);
        $pdf->SetTextColor($r, $g, $b);
        $pdf->Cell(100, 10, $text, 0, 0, $a);
    }

    function CreatePage($pdf, $name, $course_name, $date) {
        $pdf->AddPage('L', PDF_UNIT, ['format' => 'A4', 'Rotate' => -90]);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetFont('helvetica', 'B', 16);

        $pdf->setPrintHeader(false);
        $pdf->SetFooterMargin(0);
        $pdf->setPrintFooter(false);
        $pdf->SetAutoPageBreak(TRUE, 0);

        $pdf->SetLeftMargin(0);
        $pdf->SetTopMargin(0);
        $pdf->StartTransform();
        $pdf->Image(FCPATH . 'uploads/imgs/mini-class.png', 0, 0, 0);
        $pdf->Rotate(360);
        // $pdf->WriteHTML($html);
        $pdf->StopTransform();
        //Add a Name to the certificate
        $this->AddText($pdf, ucwords($name), 30, 117, 'C', 'Helvetica', 'B', 40, 3, 84, 156);
        $this->AddTextTitle($pdf, ucwords('Mini Class Sertifikasiku :'), 36, 155, 'C', 'Helvetica', 'B', 18, 3, 84, 156);
        $this->AddTextTitle($pdf, ucwords($course_name), 44, 165, 'C', 'Helvetica', 'B', 18, 3, 84, 156);

        $this->AddDate($pdf, ucwords($date), 0, 185, 'C', 'Arial', 'B', 14, 255, 255, 255);
    }

    public function index_get() {
        $this->response([], REST_Controller::HTTP_OK);
    }

    public function generate_post() {

        $this->load->library('Pdf');
        $pdf = new Pdf('L', PDF_UNIT, ['format' => 'A4', 'Rotate' => -90], true, "UTF-8", false);

        $msg = array();

        try {
            $structure = FCPATH . 'festival/' . date('dmY') . "/";
            if (!is_dir($structure)) {
                mkdir($structure, 0777, true);
            }
            $res = $this->db->insert('mt_festival', array(
                'full_name' => $this->input->post('full_name'),
                'email' => $this->input->post('email'),
                'course_title' => $this->input->post('course_title'),
                'certificate_url' => base_url() . 'festival/' . date('dmY') . '/',
            ));
            if ($res) {
                $this->CreatePage($pdf, $this->input->post('full_name'), $this->input->post('course_title'), $this->input->post('tanggal'), '');
                $pdf->Output($structure . date('dmYHms') . '-festival.pdf', 'F');
                $msg['status'] = true;
                $msg['message'] = 'Success';
            }
//            $this->response($msg, REST_Controller::HTTP_OK);
            ToJson($msg);
        } catch (Exception $e) {
            $msg['status'] = false;
            $msg['message'] = 'Fail !';
            $msg['error'] = $e->getMessage();
            ToJson($msg);
        }
    }

}

<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ah_Email {
    public function __construct()
    {
        $CI =& get_instance();
        $CI->load->config('email', true);
        $this->configs = $CI->config->config['email'];

        $CI->load->library('email');
        $this->email = $CI->email;
    }

    public function send($email_to, $subject, $template, $template_vars = array(), $settings = array())
    {
        $settings = $this->configs['settings'];

        $this->email->initialize($settings);

        $this->email->from($settings['from_email'], $settings['from_name']);
        $this->email->to($email_to);

        $ci =& get_instance();

        $this->email->subject($subject);
        $this->email->message($ci->load->view('emails/' . $template, $template_vars, true));

        $res = $this->email->send();
        return $res;
    }
}
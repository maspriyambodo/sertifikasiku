<?php

if (Dekrip($this->session->userdata('role_id')) == 1 or Dekrip($this->session->userdata('role_id')) == 2) {
    require_once 'v_admin.php';
} else {
    null;
}
<?php  

if($is_logged_in == "is_logged_in")
{
$this->load->view('includes/header2');
}
else
{
$this->load->view('includes/header');
}

$this->load->view($main_content);

$this->load->view('includes/footer');

?>
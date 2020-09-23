<?php
function send_email($to, $subject, $body, $file_name = ''){
    $CI =& get_instance();
    $CI->load->model('auth_model');
    $header_template = $CI->auth_model->header_template();
    $header =   $header_template->header;
    $footer =   $header_template->footer;

    
    $body_content='<table>   
     <tr>
         <td>'.$header.'</td>
     </tr>
     <tr>
         <td> '.$body.'</td>
     </tr>
     <tr>
         <td>'.$footer.'</td>
    </tr>
</table>';
    $CI =& get_instance();
    $CI->load->library('email'); // load library 
    $config = Array(
        'protocol' => 'smtp',
        'smtp_host' => $CI->config->item('smtp_host'),
        'smtp_port' => $CI->config->item('smtp_port'),
        'smtp_user' =>  $CI->config->item('smtp_user'),
        'smtp_pass' => $CI->config->item('smtp_pass'),
        'smtp_crypto'  => 'ssl',
        'mailtype'  => 'html', 
        'charset'   => 'iso-8859-1'
    );
              // $config =            Array(
            //         'protocol' => 'smtp',
            //         'smtp_host' => 'localhost',
            //         'smtp_port' => 25,
            //         'smtp_user' => 'eventsdragon@gmail.com',
            //         'smtp_pass' => '',
            //         'mailtype'  => 'html', 
            //         'charset'   => 'iso-8859-1'
            //     );
    
    $config['validate'] = FALSE;
    $config['priority'] = 3;
    $config['crlf']     = "\r\n";
    $config['newline']  = "\r\n";
    $config['wordwrap'] = TRUE;
    $CI->email->initialize($config);
   $CI->email->from($CI->config->item('email_from'), 'eventsdragon');
    $CI->email->to($to); 
    $CI->email->subject($subject);
    $CI->email->message($body_content);	
    if('' != $file_name){
        print $CI->email->attach($file_name);
        die;
        
        return false;
    }
    if(!$CI->email->send()){
      //print $CI->email->print_debugger();die();
       return false;
    }else{
        return true;
    }

}

 <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Send_Email
    {
        
        public function __construct()
        {
            $this->obj =& get_instance();
        }






         public function sendEmail($email = null){            
                    if ($email != null && is_array($email)) {
                        $this->load->library('email');

                        $this->email->from($email['fromEmail'], $email['fromName']);
                        if(isset($email['toEmail'])){
                            if (is_array($email['toEmail'])) {
                                foreach ($email['toEmail'] as $key => $toEmail) {
                                    $this->email->to($toEmail);
                                }
                            }else{
                                $this->email->to($email['toEmail']);
                            }
                        }else{
                            $this->session->set_flashdata('error', 'Please set to->email');
                            return false;
                        }
                        if (isset($email['toCc'])) {
                            if (is_array($email['toCc'])) {
                                foreach ($email['toCc'] as $key) {
                                    $this->email->cc($key);
                                }
                            }else{
                                $this->email->cc($email['toCc']); 
                            }
                        }                  
                        if (isset($email['toBcc'])) {
                            if (is_array($email['toBcc'])) {
                                foreach ($email['toBcc'] as $key) {
                                    $this->email->bcc($key);
                                }
                            }else{
                                $this->email->bcc($email['toBcc']); 
                            }
                        }
                        $this->email->subject($email['subject']);
                        $this->email->message($email['msg']);  

                        $result=$this->email->send()
 
                        return $result;
                    }
                    return false;         
                }


                public function sendEmail2($email = null){   


                    $this->load->library('email');
                $this->email->set_newline("\r\n");
                $config['protocol'] = 'smtp';
                $config['smtp_host'] = 'ssl://moon.sfdns.net';
                $config['smtp_port'] = '465';
                $config['smtp_user'] = 'epul@nastyjuice.com';
                $config['smtp_from_name'] = 'Nasty Reseller';
                $config['smtp_pass'] = 'selasih2014';
                $config['charset'] = 'utf-8';
                $config['wordwrap'] = TRUE;
                $config['newline'] = "\r\n";
                $config['mailtype'] = 'html'; 
                // $config = array(
                //  'protocol' => 'smtp',
                //  'smtp_host' => 'moon.sfdns.net',
                //  'smtp_port' => 465,
                //  'smtp_timeout' => '10', 
                //  'smtp_user' => 'epul@nastyjuice.com',
                //  'smtp_pass' => 'selasih2014',
                //  'mailtype' => 'html',
                //  'newline' => '\r\n',
                //  'charset' => 'utf-8',
                //  'wordwrap' => TRUE
                //  );
                $this->email->initialize($config);
                $this->email->from($config['smtp_user'],$config['smtp_from_name']);
                $this->email->to($email);
 
                $this->email->subject('');
                
                $msg = "";
                $this->email->message($msg);
                //$this->email->send();
                $result=$this->email->send();




                }


    }
    
    /* End of file Send_Email.php */
    /* Location: ./application/libraries/Send_Email.php */
    
?>
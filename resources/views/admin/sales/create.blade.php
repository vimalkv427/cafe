<?php
class Lead_import extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('excel');
        $this->admin_not_logged_in();
        $this->data['page_title'] = 'Lead Management - Import';
        $this->load->model('admin/Model_admin_groups');
        $this->load->model('admin/Model_lead_management');
        $this->load->model('admin/General', 'general');
        $this->load->model('admin/ExcelModel');
        $user_id    = $this->session->userdata('id');
        $User_under = $this->session->userdata('userunder_id');
        $franch_id  = $this->session->userdata('franch_id');
        if (function_exists('date_default_timezone_set')) {
            date_default_timezone_set("Asia/Kolkata");
        }
    }
    public function index()
    {
        if (!in_array('viewLeadManagement', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        $user_id    = $this->session->userdata('id');
        $User_under = $this->session->userdata('userunder_id');
        $franch_id  = $this->session->userdata('franch_id');
        $this->admin_render_template('admin/lead/import_leads');
    }
    function ajax()
    {
        $user_id   = $this->session->userdata('id');
        $franch_id = $this->session->userdata('franch_id');
        $flag_insert = 0;
        $count = 0;
        $flag_insert1 = 0;
        $count1 = 0;
        if (isset($_FILES["file"]["name"])) {
            $path   = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow    = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                // $data[] = array();
                for ($row = 2; $row <= $highestRow; $row++) {
                    $lead_date         = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $lead_name         = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $email = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $phone     = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $leadSource     = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $leadcountry     = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $leaddestination     = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $leadtype     = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    if($leadSource != ''){
                        $wh = array(
                            'lead_source' => $leadSource,
                            'status' => 1
                        );
                       $notemptyleadsource = $this->general->retrieve_record($wh,'lead_source_master'); 
                       if($notemptyleadsource){
                           $leadsourceid = $notemptyleadsource->id;
                       }else {
                           $array = array(
                               'lead_source' => $leadSource,
                               'created_date' => date('Y-m-d'),
                               'created_time' => date("g:i:s a"),
                               'status' => 1
                           );
                           $leadsourceid = $this->general->create_record($array,'lead_source_master'); 
                       }
                    }else{
                        $leadSource = "ManualImport";
                        $wh = array(
                            'lead_source' => $leadSource,
                            'status' => 1
                        );
                       $notemptyleadsource = $this->general->retrieve_record($wh,'lead_source_master'); 
                       if($notemptyleadsource){
                           $leadsourceid = $notemptyleadsource->id;
                       }else {
                            $array = array(
                               'lead_source' => $leadSource,
                               'created_date' => date('Y-m-d'),
                               'created_time' => date("g:i:s a"),
                               'status' => 1
                           );
                           $leadsourceid = $this->general->create_record($array,'lead_source_master'); 
                       }
                    }
                    
//                    if($lead_date !=''){
//                        // Assuming you have the serialized date value stored in $lead_date_serialized
//                        $lead_date_serialized = $lead_date;
//
//                        // Convert serialized date value to Unix timestamp
//                        $unix_timestamp = PHPExcel_Shared_Date::ExcelToPHP($lead_date_serialized);
//
//                        // Format Unix timestamp as a human-readable date
//                        $lead_date = date('Y-m-d', $unix_timestamp);
//
//                        // Output the formatted date
//                       // echo $lead_date;
//                        $created_date = $lead_date;
//                        print_r($unix_timestamp);
//                        die();
//                    }
                    
                // if ($lead_date != '') {
                //         if (is_numeric($lead_date)) {
                    
                //             $unix_timestamp = PHPExcel_Shared_Date::ExcelToPHP($lead_date);
                //             $lead_date = date('Y-m-d', $unix_timestamp);
                //         } else {
        
                //                 $lead_date_parts = explode('-', $lead_date);
                        
                //                 if (count($lead_date_parts) === 3) {
                               
                //                     $year = intval($lead_date_parts[2]);
                //                     if ($year < 100) {
                                       
                //                         $year += 2000;
                //                     }
                                    
                //                     $month = intval($lead_date_parts[0]);  
                //                     $day = intval($lead_date_parts[1]);   
                        
                        
                //                     $lead_date = sprintf('%04d-%02d-%02d', $year, $month, $day);
                //                 } else {
                //                     $lead_date = null;
                //                 }
                //         }
                
                
                //     $created_date = $lead_date;
                
                
                // }
                // else {
                //         $created_date = date('Y-m-d');
                // }
                    
                    
                    
                    
                    
                   
                if ($lead_date != '') {
                        if (is_numeric($lead_date)) {
                            $lead_dates = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($lead_date));
                        } else {
                            $lead_dates = date('Y-m-d', strtotime(str_replace('/', '-', $lead_date)));
                        }
                    } else {
                        $lead_dates = date('Y-m-d');
                    }    
                    
                    
                    
                    
                    
                    

                    $phones = substr($phone, -10);
                    $ph_unique = $this->general->execute_query2("SELECT * FROM crm_leads WHERE phone like '%$phones%' AND destination like '%$leaddestination%' AND type like'%$leadtype%'");
                    if ($phone != '' && count($ph_unique) === 0) {
                        $data   = array(
                            'lead_name' => $lead_name,
                            'email' => $email,
                            'phone' => $phone,
                            'lead_source' => $leadsourceid,
                            'country' => $leadcountry,
                            'owner' => $user_id,
                            'status' => 1,
                            'lead_status' => 1,
                            'created_date' => $lead_dates,
                            'current_dates' => date('Y-m-d'),
                            'created_time' => date("g:i:s a"),
                            'destination' => $leaddestination,
                            'type'  => $leadtype
                        );
                       
                        $create = $this->general->create_record($data,'crm_leads');
                        if($create){
                        $flag_insert = 1;
                        $count = $count+1;
                        $array_history = array('lead_id' => $create,
                            'title' => "ADD",
                            'description' => "Added lead on ".date('y-m-d g:i:s a'),
                            'status' => 1,
                            'user_id' => $this->session->userdata('id'),
                            'user_under' => $this->session->userdata('userunder_id'),
                            'created_date' => date('Y-m-d'),
                            'created_time' => date("g:i:s a")
                        );
                        $createhis = $this->general->create_record($array_history,'crm_lead_tracking');
                        }
                    }else {
                        // Insert into crm_leads_duplicates if the phone number is already in crm_leads
                        $data_duplicate = array(
                            'lead_name' => $lead_name,
                            'email' => $email,
                            'phone' => $phone,
                            'lead_source' => $leadsourceid,
                            'country' => $leadcountry,
                            'owner' => $user_id,
                            'status' => 1,
                            'lead_status' => 1,
                            'created_date' => $lead_dates,
                            'current_dates' => date('Y-m-d'),
                            'created_time' => date("g:i:s a"),
                            'destination' => $leaddestination,
                            'type'  => $leadtype
                        );
                        $create_duplicate = $this->general->create_record($data_duplicate, 'crm_leads_duplicates');
                        if($create_duplicate){
                        $flag_insert1 = 1;
                        $count1 = $count1+1;
                        
                        }
                    } 
                    
                    
                    
                    
                    
                }
            }
            if($flag_insert > 0) {
            echo $count.' - Data Imported successfully'.'<br>';
            echo $count1.'- Duplicate data found';
            }else if($flag_insert1 > 0) {
            
            echo $count1.'- Duplicate data found';
            }else{
             echo 'Something went wrong1';   
            }
        } else {
            echo 'Something went wrong2';
        }
    }
    
    
    public function upload(){
    $filesop = [];
    //require_once APPPATH."/third_party/SimpleXLSX.php";
    $file = $_FILES['csv']['tmp_name'];
    if($x = SimpleXLSX::parse($file)){
        $fields = $x->rows();
    }
    $c = 0;//
    $i=0;
    foreach($fields as $filesop){
        $data = array(
            'id' => $filesop[0],
            'name' => $filesop[1],
            'msg' => $filesop[2],

         );
         if($c != 0){
             $this->ExcelModel->excelstore($data);
             $i = $i + 1;
          }
             $c = $c + 1;
    }
  }
}
<?php

if (empty($_SERVER['HTTP_REFERER']) || strtoupper($_SERVER['REQUEST_METHOD']) != 'POST') {
    header( 'Location: index.php' ) ;
    die;
 }
 
 require_once 'bellevue.utilities.php';
 
 $keys = array_keys($_REQUEST);
 foreach($keys as $k)
 {
   ${$k} = $_REQUEST[$k];
   //echo "Created variable: $". $k . "=" . ${$k} . "<br />";
 }

 switch($action){
     case "srFormSubmit":
     
        //Add Entry to the WebLogs
        // $logger = new WebLogger("OPERATIONS_HELP_DESK",true);
        $logger = new WebLogger("SERVICE_REQUEST_FORM",true);
        $logger->add();
        $logId = $logger->id;


        $mailMessage = '';
        $mailMessage .=  '<h2> Service Request Form <h3><br>';
        $mailMessage .=  '--------------------------------------<br>';
        $mailMessage .=  '<h3>Applicant Information:<h3><br>';
        $mailMessage .= ' First Name: ' .$fName . '<br>';
        $mailMessage .= ' Last Name: ' .$lName . '<br>';
        $mailMessage .= ' Phone Number: ' .$phone . '<br>';
        $mailMessage .= ' Email: ' .$email . '<br>';
        if ($agree == "on") {
            $mailMessage .=  'This form is for non-confidential requests only. If your request is confidential in nature, please 
            contact the area in question personally. Do NOT put any confidential information in this form.<br>I Understand (Checked)<br>';
        }
        $mailMessage .=  ' Department:  ' . $firstChoice . '<br>';
        $mailMessage .=  ' Sub-Department:  ' . $secondChoice . '<br>';
        $mailMessage .=  ' Request Detail:  ' . $requestDetail . '<br>';
        if (isset($followUp)) $mailMessage .= 'Follow Up: ' .$followUp . '<br>';
        $mailMessage .=  '<br>';

        // catogorizing and sending emails based on department and sub-department selection
 
        if ($firstChoice == 'Business Finance' && $secondChoice == 'Account Payable' || $secondChoice == 'Reimbursement' || $secondChoice == 'Procure to Pay (P2P)'){
            $emailTo = 'accountspayable@bellevue.edu';
        };
        if ($firstChoice == 'Business Finance' && $secondChoice == 'Credit Cards'){
            $emailTo = 'bservices_cc@bellevue.edu';
        };
        if ($firstChoice == 'Business Finance' && $secondChoice == 'Other' || $secondChoice == ''){
            $emailTo = 'bservices_bf@bellevue.edu';
        };
        if ($firstChoice == 'Student Accounts' && $secondChoice == 'Tuition Remission' || $secondChoice == 'Other' || $secondChoice == ''){
            $emailTo = 'bservices_sa@bellevue.edu';
        };
        if ($firstChoice == 'Human Resources' && $secondChoice == 'Payroll'){
            $emailTo = 'bservices_pr@bellevue.edu';
        };
        if ($firstChoice == 'Human Resources' && $secondChoice == 'Benefits'){
            $emailTo = 'bservices_be@bellevue.edu';
        };
        if ($firstChoice == 'Human Resources' && $secondChoice == 'Reporting'){
            $emailTo = 'bservices_rp@bellevue.edu';
        };
        if ($firstChoice == 'Human Resources' && $secondChoice == 'Recruiting'){
            $emailTo = 'bservices_re@bellevue.edu';
        };
        if ($firstChoice == 'Human Resources' && $secondChoice == 'General' || $secondChoice == ''){
            $emailTo = 'bservices_hr@bellevue.edu';
        };
        if ($firstChoice == 'Financial Planning & Budgeting' && $secondChoice == 'AXIOM' || $secondChoice == 'State Authorization Budgeting' || $secondChoice == 'Other' || $secondChoice == ''){
            $emailTo = 'bservices_fp@bellevue.edu';
        };
        if ($firstChoice == 'Institutional Effectiveness' && $secondChoice == 'Reports' || $secondChoice == 'Other' || $secondChoice == ''){
            $emailTo = 'bservices_ie@bellevue.edu';
        };
        if ($firstChoice == 'Business Support' && $secondChoice == 'Ticket System' || $secondChoice == 'Other' || $secondChoice == ''){
            $emailTo = 'bservices_bs@bellevue.edu';
        };
        if ($firstChoice == 'Compliance' && $secondChoice == 'Contracts' || $secondChoice == 'Policy Statement Requests' || $secondChoice == 'Other' || $secondChoice == ''){
            $emailTo = 'bservices_co@bellevue.edu';
        };

        // $emailTo= 'rokaranjit@bellevue.edu';

        // Create mail object
        $mail = new BellevueExternalMailer();
        // $mail = new BellevueInternalMailer();


        // $mail->SetFrom("noreply@bellevue.edu", "noreply@bellevue.edu");
        $mail->SetFrom($email);
        $mail->AddAddress($email);
        $mail->AddAddress($emailTo);
        $mail->AddBCC('rokaranjit@bellevue.edu');
        $mail->AddBCC('jholzhey@bellevue.edu');
        $mail->AddBCC('dnihsen@bellevue.edu');
        $mail->AddBCC('whdtest@bellevue.edu'); 

        $mail->Subject = "Service Request Form" . " - ". $logId;
        $mail->Body = $mailMessage;
        $mail->IsHTML(true);

        if(!$mail->Send()) {
            echo "Mailer Error: Your mail could not be sent" . $mail->ErrorInfo;
        } else{
            // echo "You email was sent successfully";
        }
    break;
 }
?>
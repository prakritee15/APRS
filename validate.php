<?php
// Turn off all error reporting
error_reporting(0);
if(count($_POST)<11){
//this is to count how many values are sent in the post request
//if the user directly pings the page or uses other platform for pining the page with less values
        //header('LOCATION:http://www.kiitmun.org');
        $response =  "Don't fuck around with the form...";
        echo $response;
        exit;
}
$response = "";
$check = 1;
foreach($_POST as $key=>$value)
{
if(strpos($value, 'ransisco') !== FALSE)
{
//header('LOCATION:form.php');
$response =  "Don't fuck around... XSS and San Fransisco won't work...";
echo $response;
exit;
}//end of if
else
{
$value = trim($value);
$value = strip_tags($value);
$value = stripslashes($value);
$postdata[$key]=$value; //$postdata['email']
}       //end of else
}       //end of foreach
#the validation of all the inputs
$postdata['name'] =     filter_var($postdata['name'],FILTER_SANITIZE_STRING);
$postdata['email'] = filter_var($postdata['email'],FILTER_SANITIZE_EMAIL);
$postdata['altemail'] = filter_var($postdata['altemail'],FILTER_SANITIZE_EMAIL);
$postdata['contact'] =  filter_var($postdata['contact'],FILTER_SANITIZE_NUMBER_INT);
$postdata['gender'] =   filter_var($postdata['gender'],FILTER_SANITIZE_STRING);
$postdata['address'] = filter_var($postdata['address'],FILTER_SANITIZE_STRING);
$postdata['nation'] =   filter_var($postdata['nation'],FILTER_SANITIZE_STRING);
$postdata['college'] =  filter_var($postdata['college'],FILTER_SANITIZE_STRING);
$postdata['course'] = filter_var($postdata['course'],FILTER_SANITIZE_STRING);
$postdata['syear'] =    filter_var($postdata['syear'],FILTER_SANITIZE_STRING);
$postdata['pastca'] =   filter_var($postdata['pastca'],FILTER_SANITIZE_STRING);
if((strlen($postdata['name'])<1) or !(ctype_alpha(str_replace(" ", "",$postdata['name'])))){
$response .= "Empty/Invalid name"."<br />";
$check = 0;
}
if((!filter_var($postdata['email'],FILTER_VALIDATE_EMAIL)) or (strlen($postdata['email']) <1) ){
$response .= "Empty/Invalid email"."<br />";
$check = 0;
}
if(  (strlen($postdata['altemail']) >1) && (!filter_var($postdata['altemail'],FILTER_VALIDATE_EMAIL))  ){
$response .= "Empty/Invalid Alternate email"."<br />";
$check = 0;
}
if((strlen($postdata['contact'])!==10) or !(ctype_digit($postdata['contact']))){
$response .= "Empty/Invalid contact no"."<br />";
$check = 0;
}
if((strlen($postdata['gender'])<1) or !(ctype_alpha(str_replace(" ", "",$postdata['gender'])))){
$response .= "Empty/Invalid gender"."<br />";
$check = 0;
}
if(strlen($postdata['address'])<1){
$response .= "Empty address"."<br />";
$check = 0;
}
if((strlen($postdata['nation'])<1) or !(ctype_alpha(str_replace(" ", "",$postdata['nation'])))){
$response .= "Empty/Invalid nationality"."<br />";
$check = 0;
}
if(strlen($postdata['college'])<1){
$response .= "Empty Name of Institute"."<br />";
$check = 0;
}
if(strlen($postdata['course'])<1){
$response .= "Empty Course/Stream"."<br />";
$check = 0;
}
if(strlen($postdata['syear'])<1){
$response .= "Empty Year of Study"."<br />";
$check = 0;
}
if($check == 0)
{
        echo $response;
        exit;
}
require_once('connect.php');//connecting to the server
//insert details of the new ca
$query = "INSERT INTO ca( name,email,altemail,contact,gender,address,nation,college,course,syear,pastca)
                        VALUES( :name, :email, :altemail, :contact, :gender, :address, :nation, :college, :course, :syear, :pastca )";

$sth = $dbh->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$excute=$sth->execute(array(':name'=>$postdata['name'],':email'=>$postdata['email'],':altemail'=>$postdata['altemail'],':contact'=>$postdata['contact'],
                                                        ':gender'=>$postdata['gender'], ':address'=>$postdata['address'], ':nation'=>$postdata['nation'], ':college'=>$postdata['college'],
                                                        ':course'=>$postdata['course'], ':syear'=>$postdata['syear'], ':pastca'=>$postdata['pastca']));
if(!$excute ){
        echo "Error in connection"."<br/>"."Please try submitting the form again"."<br />";
        exit;
}
//mailing script

        $email_message = "";
        $email_message .= "Dear ".$postdata['name'].",\n\n"; //dear name,
        $email_message .= "Thank You for registering with KIIT International MUN."."\n";
        $email_message .= "You shall be hearing from us soon with promotional material and appointment details.\n\n";
        $email_message .= "Regards\n";
        $email_message .= "Secretariat\n";

        $to = $postdata['email'] ;
    $subject = "Campus ambassador registration for KIIT International MUN 2015";
    $headers = "From: KIIT International MUN <contact@kiitmun.org>\r\n";
    $headers .= "Reply-To: contact@kiitmun.org \r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=iso-8859-1" . "\r\n";
    mail($to, $subject, $email_message, $headers,"-f contact@kiitmun.org");

echo "OK";
?>

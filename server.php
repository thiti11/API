<?php
header("Content-Type: application/json; charset=UTF-8");
$request = json_decode(file_get_contents("php://input"), true);
require_once("connectServer.php");
require_once("Model.php");

$home_page = new home_page();

//print_r($request);
//exit;

switch ($request['mod']) {

      //Get model master data to cb_model
   case "Get_test":
      $data = $home_page->Get_test();
      break;
    case "Get_itemorder":
      $data = $home_page->Get_itemorder();
      break;
    case "Get_login":
      $data =$home_page->Get_login(); 
      break; 
    case "Get_Register":
      $data = $home_page->Get_Register();
      break; 
    case "Get_Order":
      $data = $home_page->Get_Order();
      break; 
    case "Get_Updateorder":
      $data = $home_page->Get_Updateorder();
      break;  
    case "Get_Deleteorder":
      $data = $home_page->Get_Deleteorder();
      break;  
    case "Get_itemm":
      $data = $home_page->Get_itemm();
      break;     
    case "Get_orderadmin":
      $data = $home_page->Get_orderadmin();
      break;           
      /// Last Case///
      $data["message"] = "ไม่พบ case";
      break;
      
}
$return = json_encode($data);
echo $return;

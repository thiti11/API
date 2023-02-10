<?php

include_once("connectServer.php");
use function PHPSTORM_META\type;

class home_page extends connectServer
{


    //Get model master data to cb_model
    function Get_test() 
    {
        
        $conn = $this->Myconn();
        $res = [];
        $sql = "SELECT * FROM employee ";
        $result = $conn->prepare($sql);
        $result->execute(); 
        while ($obj = $result->fetch(PDO::FETCH_ASSOC)) {
            array_push($res, $obj);
        }

        return $res;
    }
    function Get_itemorder() 
    {
        
        $conn = $this->Myconn();
        $res = [];
        $sql = "SELECT * FROM itemorder";
        $result = $conn->prepare($sql);
        $result->execute(); 
        while ($obj = $result->fetch(PDO::FETCH_ASSOC)) {
            array_push($res, $obj);
        }

        return $res;
    }
    
     //Get model master data to cb_model
     function Get_login() 
     { 
        $con = mysqli_connect("localhost","root","","welfare_req");
        
        $postdata = file_get_contents("php://input");
        if(isset($postdata) && !empty($postdata))
        {
            //$con = $this->Myconn();
            $res = [];
            $request = json_decode($postdata);
            $Username = mysqli_real_escape_string( $con,trim($request->Username ) );
            $Password = mysqli_real_escape_string( $con, trim($request->Password));
            
            // $sql ="SELECT * FROM Employee where Username='$Username' and Password='$Password'";
            $sql ="SELECT * FROM employee where Username='$Username' and Password='$Password'";

           // $result = mysqli_query($con,$sql);
           // print_r($result);
            
            if($result = mysqli_query( $con,$sql))
            {
              //  $rows = array();
            while($row = mysqli_fetch_assoc($result))
            if ($row>0) {

      
                $res=$row;
                return($res);
        
            }
           
         
            }
            else
            {
            http_response_code(404);
            }
            


        } 
     }


     function Get_Register()
     {   
        $con = mysqli_connect("localhost","root","","welfare_req");  
        $postdata = file_get_contents("php://input");
        if(isset($postdata) && !empty($postdata))
        {
            $request = json_decode($postdata);
       // $con= $this->Myconn();
       $res = [];
        $Username = mysqli_real_escape_string($con,trim($request->Username ) );
        $Password = mysqli_real_escape_string($con,trim($request->Password));
        $Firstname = trim($request->Firstname );
        $Lastname = trim($request->Lastname );
        $EmpNo = trim($request->EmpNo);
        $Position = trim($request->Position );
        $Department = trim($request->Department);
        $Section = trim($request->Section);
        $Type_of_Employee = trim($request->Type_of_Employee);
        $Employee_Detail = trim($request->Employee_Detail);
        $Joined_date = trim($request->Joined_date);
        $sql = "INSERT INTO Employee (
            Username, 
            Password, 
            Firstname, 
            Lastname, 
            EmpNo,
            Position,
            Department,
            Section,
            Type_of_Employee,
            Employee_Detail,
            Joined_date
            ) VALUES (
            '$Username',
            '$Password',
            '$Firstname',
            '$Lastname',
            '$EmpNo',
            '$Position',
            '$Department',
            '$Section',
            '$Type_of_Employee',
            '$Employee_Detail',
            '$Joined_date')";
            

            if($con->query($sql) === TRUE){
                array_push($res,$con);
                return("successfully");
            }else{
                return("failed");
            }
       

        }
     }
     function Get_Order()
     {
        $con = mysqli_connect("localhost","root","","welfare_req");  
        $postdata = file_get_contents("php://input");
        if(isset($postdata) && !empty($postdata))
        {
            $request = json_decode($postdata);
        //$con= $this->Myconn();
        $res = [];
        $list = mysqli_real_escape_string($con,trim($request->list ) ); 
        $Quantity = mysqli_real_escape_string($con,trim($request->Quantity ) );
        $Remark = mysqli_real_escape_string($con,trim($request->Remark ) );

        $sql = "INSERT INTO itemorder (
                    list, 
                    Quantity, 
                    Remark
                    ) VALUES (
                    '$list',
                    '$Quantity',
                    '$Remark'
                )";

                if($con->query($sql) === TRUE){  
                    array_push($res,$con);
                    return("successfully");         
               //     $res = $con;
                //return( $res);
                }else{
                return("failed");
                }


        }
     }

    function Get_Deleteorder(){
       $conn = mysqli_connect("localhost","root","","welfare_req");  
       

       // if(isset($_POST['No_ID'])){
        $conn = $this->Myconn();
       // $No_ID=$_POST['No_ID'];
        $No_ID='106';
        $sql = "DELETE FROM `itemorder` WHERE `itemorder`.`No_ID`='$No_ID' ";
        $result = $conn->prepare($sql);
        $result->execute(); 
        return('successfully');
       //  }
}
      
        
}
            
        
 




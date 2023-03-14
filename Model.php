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

    function Get_itemm() 
    {
        
        $conn = $this->Myconn();
        $res = [];
        $sql = " SELECT  `List`FROM `itemm`  ";
        $result = $conn->prepare($sql);
        $result->execute(); 
        while ($obj = $result->fetch(PDO::FETCH_ASSOC)) {
            array_push($res, $obj);
        }

        return $res;
    }
    
    function Get_orderadmin() 
    {
        
        $conn = $this->Myconn();
        $res = [];
        $sql = "SELECT * FROM `itemorder` ";
        $result = $conn->prepare($sql);
        $result->execute(); 
        while ($obj = $result->fetch(PDO::FETCH_ASSOC)) {
            array_push($res, $obj);
        }

        return $res;
    }

    function Get_approval() 
    {
        
        $conn = $this->Myconn();
        $postdata = file_get_contents("php://input");
   
        $No_ID='';
        if(isset($postdata) && !empty($postdata))
        {
            $request = json_decode($postdata);
          
            $No_ID = trim($request->No_ID);
            
           
        }
        $res = [];
        $sql = "SELECT * FROM `itemorder` WHERE    No_ID='$No_ID'";
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
        $postdata = file_get_contents("php://input");
        $Employee_ID='';
        if(isset($postdata) && !empty($postdata))
        {
            $request = json_decode($postdata);
            $Employee_ID = trim($request->Employee_ID);
            
           
        }
        $res = [];
        $sql = "SELECT * FROM itemorder WHERE `Employee_ID`='$Employee_ID'";
        $result = $conn->prepare($sql);
        $result->execute(); 
        while ($obj = $result->fetch(PDO::FETCH_ASSOC)) {
            array_push($res, $obj);
        }

        return ($res);
    }

    function Get_Orderid() 
    {
        
        $conn = $this->Myconn();
        $postdata = file_get_contents("php://input");
   
        $No_ID='';
        if(isset($postdata) && !empty($postdata))
        {
            $request = json_decode($postdata);
          
            $No_ID = trim($request->No_ID);
            
           
        }
        $res = [];
        $sql = "SELECT * FROM itemorder WHERE    No_ID='$No_ID'";
        $result = $conn->prepare($sql);
       $result->execute(); 
      
        while ($obj = $result->fetch(PDO::FETCH_ASSOC)) {
            array_push($res, $obj);
        }

        return ($res);
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
           {

      
                $res=$row;
                return($res);
        
            }
            
         
         
            }
            else{
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
        $conn = mysqli_connect("localhost","root","","welfare_req");  
        $postdata = file_get_contents("php://input");
        if(isset($postdata) && !empty($postdata))
        {
            $request = json_decode($postdata);
        //$con= $this->Myconn();
        $res = [];
        $list = mysqli_real_escape_string($conn,trim($request->list ) ); 
        $Quantity = mysqli_real_escape_string($conn,trim($request->Quantity ) );
        $Remark = mysqli_real_escape_string($conn,trim($request->Remark ) );
        $Request_By = mysqli_real_escape_string($conn,trim($request->Request_By ) );
        $Status = mysqli_real_escape_string($conn,trim($request->Status ) );
        $Employee_ID= mysqli_real_escape_string($conn,trim($request->Employee_ID) );
        $Firstname= mysqli_real_escape_string($conn,trim($request->Firstname) );

        $sql = "INSERT INTO itemorder (
                    list, 
                    Quantity, 
                    Remark,
                    Employee_ID,
                    Firstname,
                    Request_By,
                    Status

                    ) VALUES (
                    '$list',
                    '$Quantity',
                    '$Remark',
                    '$Employee_ID',
                    '$Firstname',
                    '$Request_By',
                    '$Status'
                )";

                if($conn->query($sql) === TRUE){  
                    array_push($res,$conn);
                    return("successfully");         
          
                }else{
                return("failed");
                }


        }
     }

    function Get_Deleteorder(){
       $conn = mysqli_connect("localhost","root","","welfare_req");  
       $conn = $this->Myconn();
       $postdata = file_get_contents("php://input");
       $No_ID='';
       if(isset($postdata) && !empty($postdata))
       {
           $request = json_decode($postdata);
           $No_ID = trim($request->data);
       }
      

       // $No_ID='112';
        $sql = "DELETE FROM `itemorder` WHERE `itemorder`.`No_ID`='$No_ID' ";
        $result = $conn->prepare($sql);
        $result->execute(); 
        return('successfully');

    }
      
        function Get_Updateorder() 
        {
            $con = mysqli_connect("localhost","root","","welfare_req");  
        
         
            $postdata = file_get_contents("php://input");
            $No_ID='';
            if(isset($postdata) && !empty($postdata))
            {
                $request = json_decode($postdata);
                $No_ID = trim($request->data);
                $list = mysqli_real_escape_string($con,trim($request->list ) ); 
                $Quantity = mysqli_real_escape_string($con,trim($request->Quantity ) );
                $Remark = mysqli_real_escape_string($con,trim($request->Remark ) );

            }
           // $conn = $this->Myconn();
            $res = [];
            $sql =" UPDATE `itemorder` SET `List`='$list',`Quantity`='$Quantity',`Remark`='$Remark' WHERE No_ID =' $No_ID'  ";
            if($con->query($sql) === TRUE){  
                array_push($res,$con);
                return("successfully");         

            }else{
            return("failed");
            }


            
        }

        function Get_By() 
        {
            $con = mysqli_connect("localhost","root","","welfare_req");  
        
         
            $postdata = file_get_contents("php://input");
            $No_ID='';
            if(isset($postdata) && !empty($postdata))
            {
                $request = json_decode($postdata);
                $No_ID = trim($request->data);
               
                $Approved_By = mysqli_real_escape_string($con,trim($request->Approved_By ) );
                $Status = mysqli_real_escape_string($con,trim($request->Status ) );
             

            }
           // $conn = $this->Myconn();
            $res = [];
            $sql =" UPDATE `itemorder` SET `Approved_By`='$Approved_By',`Status`='$Status' WHERE No_ID =' $No_ID'  ";
            if($con->query($sql) === TRUE){  
                array_push($res,$con);
                return("successfully");         

            }else{
            return("failed");
            }


            
        }
        function Get_issued() 
        {
            $con = mysqli_connect("localhost","root","","welfare_req");  
        
         
            $postdata = file_get_contents("php://input");
            $No_ID='';
            if(isset($postdata) && !empty($postdata))
            {
                $request = json_decode($postdata);
                $No_ID = trim($request->data);
               
             
                $Issued_By = mysqli_real_escape_string($con,trim($request->Issued_By ) );
                $Status = mysqli_real_escape_string($con,trim($request->Status ) );
            }
           // $conn = $this->Myconn();
            $res = [];
            $sql =" UPDATE `itemorder` SET `Issued_By`='$Issued_By' ,`Status`='$Status'WHERE No_ID =' $No_ID'  ";
            if($con->query($sql) === TRUE){  
                array_push($res,$con);
                return("successfully");         

            }else{
            return("failed");
            }


            
        }

        function Get_Cancel() 
        {
            $con = mysqli_connect("localhost","root","","welfare_req");  
        
         
            $postdata = file_get_contents("php://input");
            $No_ID='';
            if(isset($postdata) && !empty($postdata))
            {
                $request = json_decode($postdata);
                $No_ID = trim($request->data);
               
                $RemarkCancel = mysqli_real_escape_string($con,trim($request->Cancel ) );
                $Status = mysqli_real_escape_string($con,trim($request->Status ) );
             

            }
           // $conn = $this->Myconn();
            $res = [];
            $sql =" UPDATE `itemorder` SET `RemarkCancel`='$RemarkCancel',`Status`='$Status' WHERE No_ID =' $No_ID'  ";
            if($con->query($sql) === TRUE){  
                array_push($res,$con);
                return("successfully");         

            }else{
            return("failed");
            }


            
        }

       
   
    
}
            
        
 




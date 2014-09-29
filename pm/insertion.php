<?php
session_start();
include 'connection.php';
$pn=$_REQUEST['pn'];
//echo $pn;
$result=mysqli_query($con,"SELECT * from prj_project");
while($row=mysqli_fetch_array($result))
  { //echo "working";
      if(strcmp($row['pr_prname'],$pn)==0)
      {
      	//echo @$_REQUEST['pn'];
         //$_SESSION['project_name'] =$row['pr_prname'];     
         $_SESSION['project_id']   =$row['pr_prid'];
		}
}
?>
<?php
if($_SERVER['REQUEST_METHOD']=="POST")
{

	if(isset($_REQUEST['num_cat']))
	{		
		  $number_field=$_REQUEST['num_cat'];
		  $tbtype=$_REQUEST['typetb'];
		 // echo $tbtype;
		   	$j=1;
include 'idgenerator.php'; 
			 while($j<=$number_field)
			  {

                  $pid=$_SESSION['project_id'];
                  //echo $pid;
			  	  $w= $_SESSION['wo_id'];
			  	  $p= $_SESSION['po_id'];		
				  $i=$_SESSION['SNo'];
				  $description=$_REQUEST['description-'.$j];
				  $quality=$_REQUEST['quantity-'.$j];
				  $type=$_REQUEST['work_type-'.$j];
				  $c='c'.$j;
				  if(isset($description))
				  {		
				  		//echo "working";
				  		if(strcmp($tbtype,"Workorder")==0)
				  		{
				  			//echo "working";
				  			$inserting=mysqli_query($con,"INSERT INTO wok_order(wo_woid,wo_wonum,wo_prid,wo_wodesc,wo_woquantity,wo_pspost) VALUES('$w','$c','$pid','$description','$quality','$type')");
					  	}
					  	else
					  	{
					  		//echo "working";
					  		$inserting=mysqli_query($con,"INSERT INTO pod_order(po_poid,po_prid,po_podesc,po_poquantity,po_pspost) VALUES('$p','$pid','$description','$quality','$type')");	
					  	}
					  
					  if(is_null($inserting))
					  	{
					  		echo "failed";
					  	}
					  $j++;
					  
				  }
		
			  	}
		 }
}

?>

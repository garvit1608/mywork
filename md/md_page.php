<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">

<script type="text/javascript">
function validate_form1()
{
if(document.forms["form1"]["project_name"].value=="")
{
alert("Please Enter The Project Name");
return false;
}
else if(document.forms["form1"]["pm_list"].value=="Select")
{
alert("please Select The PM");
return false;
}
else if(document.forms["form1"]["pi_list"].value=="Select")
{
alert("please Select The PI");
return false;
}
else if(document.forms["form1"]["ps_list"].value=="Select")
{
alert("please Select The PS");
return false;
}
else if(document.forms["form1"]["fs_list"].value=="Select")
{
alert("please Select The FS");
return false;
}
else if(document.forms["form1"]["si_list"].value=="Select")
{
alert("please Select The SI");
return false;
}
return true;
}


function refresh(){

  var u=document.URL;
  var sl=u.slice(-24);

  if(sl=="op=new_project&new=click")

    window.location="md_page.php?op=new_project";
}


</script>




<script src="jquery-1.4.2.min.js"></script>

<script>
$(window).load(function(){
		var pages = $('#container li'), current=0;
		var currentPage,nextPage;

		$('#container .button').click(function(){
			currentPage= pages.eq(current);
			if($(this).hasClass('prevButton'))
			{

				if (current <= 0)
					current=pages.length-1;
				else
					current=current-1;
			}
			else
			{
				if (current >= pages.length-1)
					current=0;
				else
					current=current+1;
			}
			nextPage = pages.eq(current);	
			currentPage.hide();	
			nextPage.show();		
		});




});

</script>
<!DOCTYPE html>
<html>
<?php 
//session_start();

$_SESSION['emp_name']="Garvit";
$_SESSION['desig']="managing director";


if($_REQUEST['op']=='new_project' && @$_REQUEST['new']=='click')
{
  include 'connection.php';

  $p_name=$_REQUEST['project_name'];
 $pm=$_REQUEST['pm_list'];
 $pi=$_REQUEST['pi_list'];
 $ps=$_REQUEST['ps_list'];
 $fs=$_REQUEST['fs_list'];
 $si=$_REQUEST['si_list'];
 //$id=md5($id_no);


echo "<script>alert('The Project Id is $id_no')</script>";

  $sql=mysqli_query($con,"INSERT INTO prj_project(pr_prid,pr_prname,pr_pm,pr_pi,pr_ps,pr_fs,pr_si) VALUES('$id_no','$p_name','$pm','$pi','$ps','$fs','$si')");
  if(empty($sql))
  {
    echo "error";
  }
  mysqli_close($con);
}


 ?>

<head>

<link rel="stylesheet" type="text/css" href="cssstyles.css" />

<style> 
body {
/*  background: url(../random-login-form/css/image/wallpaper2.jpeg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;*/
        width:80%;
        margin-left:auto;
        margin-right:auto;
}
</style>
<meta charset="UTF-8">

<title>md page</title>
</head>

<body onload="refresh();">

<div style="display:table; width:100%;">
<div style="display:table-row">
<div class="menu bar" style="display:table-cell;width:300px; ">
  <table width="200" class="table table-hover table-bordered">
  <tr>
    <td><span class="menu bar" style=" float:left"><span class="menu bar" style=" float:left"><img src="css/image/logo.png" width="300" height="83"></span></span></td>
  </tr>
  <tr>
    <td><div align="center"><a href="md_page.php?op=overview">Overview</a></div></td>
  </tr>
    <tr>
    <td><div align="center"><a href="md_page.php?op=new_project">Create New Project</a></div></td>
  </tr>
  <tr>
    <td><div align="center"><a href="md_page.php?op=approval">Approval</a></div></td>
  </tr>
    <tr>
    <td><div align="center"><a href="../logout.php">Logout</a></div></td>
  </tr>
</table>
</div>
<div class="top menu" style="display:table-cell;width:auto;">
  <div class="header" align="center">
  <table width="700" class="table table-bordered">
    <tr>
      <td width="342">Employee Name : <?php echo $_SESSION['emp_name']; ?></td>
      <td width="342" id="demo"> 
<script>
var d = new Date();
document.getElementById("demo").innerHTML = "Date : " + d.toDateString();
</script>
 </td>
    </tr>
    <tr>
      <td>Role : <?php echo $_SESSION['desig']; ?> </td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
  </div>
 
 <?php
if($_REQUEST['op']=='overview' || $_REQUEST['op']=='approval')
{


?> 
  
<div class="search" align="center">
  <form name="form2" method="post" action="md_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click">
      <table width="700" class="table table-bordered" >
      <tr>
        <td width="612">Project Name : <input type="text" placeholder="Project Name" name="project_name"></td>
        <td width="612">Status :<label>
              <select name="status" id="status">
                <option value=""></option>
                <option value="Project created">Project created</option>
                <option value="Request for quotation">Request for quotation</option>
                <option value="Create quotation">Create quotation</option>
                <option value="Quotation approval">Quotation approval</option>
                <option value="WO created">WO created</option>
                <option value="PO created">PO created</option>
              </select>
              </label>
          
          </td>
      </tr>
      <tr>
        <td>Project ID : 
            <input type="text" placeholder="Project ID" name="project_id"></td>
        <td><input name="search_submit" type="submit" class="style3" value="Search" /></td>
      </tr>
    </table>
	</form>
  </div>
  

<div class="search_table" align="center">

  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="700" class="table table-hover table-bordered" >
    <tr>
      <td>Project Name </td>
      <td>Project ID </td>
      <td>Status</td>
      <td>Date</td>
      <td>Initiated By </td>
    </tr>
    
    <?php
    }

?>
<?php 
if($_REQUEST['op']=='overview' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click')
{
        include 'clicktable.php'; 
}
else if($_REQUEST['op']=='overview' && @$_REQUEST['search']=='click')
{
        include 'another.php';
}
 else if($_REQUEST['op']=='approval' && @$_REQUEST['search']=='click')  
 {
      include 'approval_table.php';
 }
if(@$_REQUEST['op']=='approval' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click')
 {
  
      include 'approval_click.php';
 }
 ?>
  </table>
  
  
<?php   

  if($_REQUEST['op']=='overview' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click')
{

?>
<?php include 'know_status.php'; ?>  
  </div>  

  <center>
  <?php
            $pid=$_REQUEST['pn'];
            $path="../si/uploaded_files/$pid";
            $file_display = array('jpg', 'jpeg', 'png', 'gif');
            if(is_dir($path))
            {
            $files_count= count(glob("$path./*"));

  ?>
<div id="container">
  <ul>

      <?php
            if($dir_list=@opendir($path))
            {
              while (($filename = readdir($dir_list)) !== false) {
              $ex=strtolower(end(explode('.', $filename)));

              if(in_array($ex, $file_display)==true)
              {

            echo  "<li><img src='$path/$filename' width='604' height='453'/></li>";
              }
            }
          }
       
            
            ?>
      </ul>
      <span class="button prevButton"></span>
      <span class="button nextButton"></span></div>
<?php
}
else
{
  echo "<script>alert('No images for this project')</script>";
}
?>


<p>&nbsp;</p>

  </center>

<?php
}
  
    
     
	
	if($_REQUEST['op']=='new_project')
	{
    include 'connection.php';
  //  @$result1=mysqli_query($con,"SELECT * from usx_project");
	?>
<div class="new_project" align="center">
<form name="form1" method="post" action="md_page.php?op=<?php echo $_REQUEST['op']; ?>&new=click" onSubmit="return validate_form1()">

    <table width="700" border="1">
    <tr>
      <td>Project Name </td>
      <td><input type="text" placeholder="Project Name" name="project_name"></td>
    </tr>
    <tr>
      <td>Asign PM to this project</td>
      <td><select name="pm_list" id="pm_list">
                <option value="Select">Select</option>
                <?php
                
              //   echo "<script>alert('hello');</script>";
                  while($row=mysqli_fetch_array($result))
                  {
                    $x=$row['us_pm'];
                      if(strcasecmp($x, "Yes")==0)
                    echo "<option >".$row['us_fname']." ".$row['us_lname']."</option>";
                   
                  }


                 ?>
              </select></td>
    </tr>
      <tr>
      <td>Asign PI to this project</td>
      <td><select name="pi_list" id="pi_list">
                <option value="Select">Select</option>
               <?php
               mysqli_data_seek($result,0);
                  while($row=mysqli_fetch_array($result))
                  {
                   $x=$row['us_pi'];

                    if(strcasecmp($x, "Yes")==0)
                    echo "<option>".$row['us_fname']." ".$row['us_lname']."</option>";
                  }


                 ?>
              </select></td>
    </tr>
      <tr>
      <td>Asign PS to this project</td>
      <td><select name="ps_list" id="ps_list">
                <option value="Select">Select</option>
               <?php
            //   pos_reset();
                mysqli_data_seek($result,0);
                  while($row=mysqli_fetch_array($result))
                  {
                   $x=$row['us_ps'];
                     if(strcasecmp($x, "Yes")==0)
                    echo "<option>".$row['us_fname']." ".$row['us_lname']."</option>";
                  }


                 ?>
              </select></td>
    </tr>
      <tr>
      <td>Asign FS to this project</td>
      <td><select name="fs_list" id="fs_list">
                <option value="Select">Select</option>
               <?php
             //  pos_reset();
                mysqli_data_seek($result,0);
                  while($row=mysqli_fetch_array($result))
                  {
                    $x=$row['us_fs'];
                      if(strcasecmp($x, "Yes")==0)
                    echo "<option >".$row['us_fname']." ".$row['us_lname']."</option>";
                  }


                 ?>
              </select></td>
    </tr>
      <tr>
      <td>Asign SI to this project</td>
      <td><select name="si_list" id="si_list">
                <option value="Select">Select</option>
                <?php
               //     pos_reset();
                mysqli_data_seek($result,0);
                  while($row=mysqli_fetch_array($result))
                  {
                  $x=$row['us_si'];
                      if(strcasecmp($x, "Yes")==0)
                    echo "<option >".$row['us_fname']." ".$row['us_lname']."</option>";
                  }


                 ?>
              </select></td>
    </tr>
  </table>
  <input name="submit" type="submit" class="style3" value="Submit" />
  </form>
	</div>
	<?php
	}
	?>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
<?php  
if($_REQUEST['op']=='approval' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click')
{
if($_REQUEST['status']=='Funds')
{
?>
<form name="form3" method="post" action="md_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=<?php echo $_SESSION['project_name']?>&or=<?php echo $_REQUEST['or']?>" onsubmit="return val();">
<textarea rows="4" cols="50" name="MD_comment" placeholder="Comment here">
</textarea><br>
<input name="approval" type="submit" class="style3" value="Approval" />
<input name="reject" type="submit" class="style3" value="Reject" />
</form>
<?php

if(@$_REQUEST['approval']=='Approval')
  {
    include 'approval.php';
  }
  else if(@$_REQUEST['reject']=='Reject')
  {
    include 'reject.php';
  }
}
?>
 <center>
  <?php
            $pid=$_REQUEST['pn'];
            $path="../si/uploaded_files/$pid";
            $file_display = array('jpg', 'jpeg', 'png', 'gif');
            if(is_dir($path))
            {
            $files_count= count(glob("$path./*"));

  ?>
<div id="container">
  <ul>

      <?php
            if($dir_list=@opendir($path))
            {
              while (($filename = readdir($dir_list)) !== false) {
              $ex=strtolower(end(explode('.', $filename)));

              if(in_array($ex, $file_display)==true)
              {

            echo  "<li><img src='$path/$filename' width='604' height='453'/></li>";
              }
            }
          }
       
            
            ?>
      </ul>
      <span class="button prevButton"></span>
      <span class="button nextButton"></span></div>
<?php
}
else
{
  echo "<script>alert('No images for this project')</script>";
}
?>


<p>&nbsp;</p>

  </center>
<br>
<table border=1  width=500px>
  
  <tr>
    <th>
      S.No.
    </th>
    <th>
        Authority
    </th>
    <th>
      Comment
    </th>   
  </tr>
  <?php include'comment.php'; ?>
</table>
<br>
<br>

<form name="form4" method="post" action="ap_st_com.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=<?php echo $_SESSION['project_name']?>&or=<?php echo $_REQUEST['or']?>" onsubmit="return val1();">
<textarea rows="4" cols="50" name="St_comment" placeholder="Comment here">
</textarea><br>
<input name="approval" type="submit" class="style3" value="Approval" />
<input name="reject" type="submit" class="style3" value="Reject" />
</form>
<?php
//here the code for stages.................
if ($_REQUEST['status']=='stage') 
{
  
  if(@$_REQUEST['approval']=='Approval')
   {
      include 'stage_approval.php';
   }
   elseif(@$_REQUEST['reject']=='Reject')
   {
      include 'stage_reject.php';
   }
}
}
?>
</div>
</div>
</div></div>
</body>
<script type="text/javascript">
function val () {
  // body...
  if(document.form3.MD_comment.value=='')
  {
    alert('Please enter the comment');
    return false;
  }
else
  return true;
}

function val1() {
  // body...
  if(document.form4.St_comment.value=='')
  {
    alert('Please enter the comment');
    return false;
  }
else
  return true;
}

</script>
</html>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<?php
session_start();
include "connection.php";
?>

<script>
function confirm1()
{
  if(document.form4.vendor_name.value=='')
  {
    alert('Please Fill the name...');
    return false;
  }
  if(document.form4.contact_no.value=='')
  {
    alert('Please Fill the contact no...');
    return false;
  }
  else 
  {
    if(confirm("Are you Sure You want to continue!"))
    {
      return true;
    }
    else
    {
      return false;
    }
  }
}   
</script>

<script type="text/javascript">
function refresh()
{

  var u=document.URL;
  var sl=u.slice(-19);

  if(sl=="&po=click&wo=create")

    window.location="ps_page.php?op=quotation&search=click";
}

</script>




<script src="jquery-1.4.2.min.js"></script>

<!DOCTYPE html>
<html>

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

<script type="text/javascript" src="js/jquery_1.5.2.js"></script>
<script type="text/javascript" src="js/uploader.js"></script>


<link type="text/css" href="css/uploader.css" rel="stylesheet" />


<script type="text/javascript">
$(document).ready(function()
{
	new multiple_file_uploader
	({
		form_id: "fileUpload", 
		autoSubmit: true,
		server_url: "uploader.php" // PHP file for uploading the browsed files
	});
});
</script>



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


<meta charset="UTF-8">

<title>PS page</title>
</head>

<body onload="refresh()">

<div style="display:table; width:100%;">
<div style="display:table-row">
<div class="menu bar" style="display:table-cell;width:300px;  ">
  <table width="200" class="table-bordered table-hover">
  <tr>
    <td><span class="menu bar" style=" float:left"><span class="menu bar" style=" float:left"><img src="css/image/logo.png" width="300" height="83"></span></span></td>
  </tr>
  <tr>
    <td><div align="center"><a href="ps_page.php?op=quotation">Quotation</a></div></td>
  </tr>
    <tr>
    <td><div align="center"><a href="ps_page.php?op=wo_po">PO / WO Preparation</a></div></td>
  </tr>
  <tr>
    <td><div align="center"><a href="ps_page.php?op=approval">Approval</a></div></td>
  </tr>
    <tr>
    <td><div align="center"><a href="../logout.php">Logout</a></div></td>
  </tr>
</table>
</div>
<div class="top menu" style="display:table-cell;width:auto;">
  <div class="header" align="center">
  <table width="700" class="table-bordered">
    <tr>
      <td width="342">Employee Name :<?php echo $_SESSION['Employee'];?> </td>
      <td width="342" id="demo"> 
<script>
var d = new Date();
document.getElementById("demo").innerHTML = "Date : " + d.toDateString();
</script>
 </td>
    </tr>
    <tr>
      <td>Role : <?php echo $_SESSION['role'] ;?></td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
  </div>
 
 <?php
if($_REQUEST['op']=='quotation' || $_REQUEST['op']=='approval' || $_REQUEST['op']=='wo_po')
{

?> 
  
<div class="search" align="center">
  <form name="form2" method="post" action="ps_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click">
      <table width="700" class="table-bordered">
      <tr>
        <td width="612" height="33">Project Name : 
          <input type="text" placeholder="Project Name" name="project_name"></td>
        <td width="612"><label>
              <!--select name="status" id="status">
                <option value="">Choose</option>
                <option value="Project created">Project created</option>
                <option value="Request for quotation">Request for quotation</option>
                <option value="Create quotation">Create quotation</option>
                <option value="Quotation approval">Quotation approval</option>
                <option value="WO created">WO created</option>
                <option value="PO created">PO created</option>
              </select-->
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
  
  <?php }?>
<div class="search_table" align="center" >
  <p>&nbsp;</p>
  <table width="700" class="table-bordered table-hover">
    <tr>
      <td>Project Name </td>
      <td>Project ID </td>
      <td>Status</td>
      <td>Date</td>
      <td>Order </td>
    </tr>
    <?php 
    if($_REQUEST['op']=='quotation' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click')
    {
      include 'clicktable.php';
    }
    else if($_REQUEST['op']=='quotation' && @$_REQUEST['search']=='click')
    {
      include 'another.php';
    }
    if(@$_REQUEST['op']=='wo_po' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click')
    {
      include 'wopo_click.php';
    }
    elseif (@$_REQUEST['op']=='wo_po' && @$_REQUEST['search']=='click')
     {
        include 'wopo_table.php';
    }
    if($_REQUEST['op']=='approval' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click')
      {
          include 'approval_click.php';
      } 
    else if($_REQUEST['op']=='approval' && @$_REQUEST['search']=='click')
      {
          include 'approval_table.php';
      }
 ?>
    
</table>
</div>
<p>&nbsp;</p>

  <?php
  if($_REQUEST['op']=='quotation' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click')
  {
   
  
  if(isset($_REQUEST['quote']))
  {
    if(@$_REQUEST['wo']=='create')
    {
      include 'quote.php';     
    }  

    $quote_no=$_REQUEST['quote']+1;
  }
  else
  {
    $quote_no=1;
  }
  if($quote_no!=4)
  {
  ?>
  
  <div class="quote" align="center">
<p>Quote<?php echo $quote_no; ?></p>
  <form name="form4" method="post" action="ps_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=<?php echo $_SESSION['project_name'] ;?>&or=<?php echo $_SESSION['order'];?>&po=click&wo=create&quote=<?php echo $quote_no; ?>" onsubmit="return confirm1();">
    <p>Vendor Name : <input type="text" placeholder="Vendor Name" name="vendor_name"> Contact No : <input type="text" placeholder="Contact No" name="contact_no"></p>
	
	<table width="700" class="table-bordered table-hover" id="desc">
  <tr>
    <td>Sno</td>
    <td>Description</td>
    <td>Quantity</td>
    <td>Rate</td>
    <td>Total</td>
  </tr>
   <?php include 'description.php'; ?>
 </table>

    <input name="quote_submit" type="submit" class="style3" value="Submit" />
  </form>



</div>

<?php
}
if($quote_no==4)
{

?>

<div class="upload_box">
<form name="fileUpload" id="fileUpload" action="javascript:void(0);" enctype="multipart/form-data">
<div class="file_browser"><input type="file" name="multiple_files[]" id="_multiple_files" class="hide_broswe"  /></div>
<div class="file_upload"><input type="submit" value="Upload" class="upload_button" /> </div>
</form>
</div>	


<div class="file_boxes">

</div>
<span id="removed_files"></span>
<br>
<p>&nbsp;</p>
<p>&nbsp;</p>




<?php
}
}

if(@$_REQUEST['op']=='wo_po' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click')
{
?>

  <div class="wo_po" align="center">
  <form name="form5" method="post" action="ps_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=<?php echo $_SESSION['pn'];?>&or=<?php echo $_SESSION['order'];?>&po=click&wo=create" onSubmit="return confirm();">
    <p>Vendor Name : <input type="text" placeholder="Vendor Name" name="vendor_name"> Contact No : <input type="text" placeholder="Contact No" name="contact_no"></p>
	
	<table width="700" class="table-bordered">
  <tr>
    <td>Sno</td>
    <td>Description</td>
    <td>Quantity</td>
    <td>Rate</td>
    <td>Total</td>
  </tr>
 <?php include 'po_wodesc.php'; ?>
</table>


  <?php
    include 'dynamic_textfield1.php';
   ?>
</p>
    <input name="wo_po_submit" type="submit" class="style3" value="Submit" />
  </form>



</div>


<?php
}
?>
<?php

if(@$_REQUEST['op']=='wo_po' && @$_REQUEST['search']=='click'  && @$_REQUEST['po']=='click' && @$_REQUEST['wo']=='create')
{
   include 'stage.php'; 
    if(empty($insert))
      {
        echo "failed";
      }
      else
      {
         echo "<script>alert('stage table updated');</script>";
         
      }
}
if(@$_REQUEST['op']=='approval' && @$_REQUEST['search']=='click'  && @$_REQUEST['po']=='click')
{

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
            if($dir_list=opendir($path))
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
?>

 
<form method="POST" action="ps_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=<?php echo $_SESSION['project_name']; ?>&or=<?php echo $_SESSION['order'];?>&com=comment " onsubmit="return val();">
     <p>
      <textarea name="St_comment" cols="50" rows="4" maxlength="200" placeholder="Comment Here"></textarea>
    </p>
    
    <input type="submit" value="Approval" name="Approval"> 
    <input type="submit" value-"Reject" name="Reject">
</form>  
<?php
}
if(@$_REQUEST['com']=='comment')
{
  if($_REQUEST['Approval']=='Approval')
  {
    include 'Approval.php';
  }
  else if($_REQUEST['Reject']=='Reject')
  {
    include 'Reject.php';
  }
}
?>
</div>
</div></div>
</body>
<script type="text/javascript">
function val () {
  // body...
  if(document.comment.St_comment.value=='')
  {
    alert('Please enter the comment');
    return false;
  }
else
  return true;
}

</script>
</html>



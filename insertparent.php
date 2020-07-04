<?php 
// include_once 'db.php';

$server="localhost";
$username="root";
$password="";
$dbname="admission";

//Create connection
$conn=mysqli_connect($server,$username,$password,"$dbname");
//Check connection
if(!$conn){
	die("Connection failed:".mysql_connect_error());
}
if ($_SERVER['REQUEST_METHOD']=='POST') {
	
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];
    $facebook=$_POST['facebook'];
    $gstatus=$_POST['gstatus'];
    //for father variables
    if(isset($_POST['fname'])){
        $fname=$_POST['fname'];
        if(empty($fname))
        {
            $fname_error='Please fill name';
            $valid=false;
        }
    }

    if(isset($_POST['fnationality'])){
        $fnationality=$_POST['fnationality'];
        if(empty($fnationality))
        {
            $valid=false;
        }
    }

    if(isset($_POST['fcitizen'])){
        $fcitizen=$_POST['fcitizen'];
        if(empty($fcitizen))
        {
            $fcitizen_error='Please fill citizenship';
            $valid=false;
        }
    }

    if(isset($_POST['fstatus'])){
        $fstatus=$_POST['fstatus'];
        if(empty($fstatus))
        {
        $valid=false;
        }
    }

    if(isset($_POST['fage'])){
        $fage=$_POST['fage'];
        if(empty($fage))
        {
        $valid=false;
        }
    }
    if(isset($_POST['foccupation'])){
        $foccupation=$_POST['foccupation'];
        if(empty($foccupation))
        {
        $valid=false;
        }
    }
    if(isset($_POST['fposition'])){
        $fposition=$_POST['fposition'];
        if(empty($fposition))
        {
        $valid=false;
        }
    }
    if(isset($_POST['fstreet'])){
        $fstreet=$_POST['fstreet'];
        if(empty($fstreet))
        {
        $valid=false;
        }
    }
    if(isset($_POST['ftownship'])){
        $ftownship=$_POST['ftownship'];
        if(empty($ftownship))
        {
        $valid=false;
        }
    }
    if(isset($_POST['fzipcode'])){
        $fzipcode=$_POST['fzipcode'];
        if(empty($fzipcode))
        {
        $valid=false;
        }
    }
    if(isset($_POST['fcity'])){
        $fcity=$_POST['fcity'];
        if(empty($fcity))
        {
        $valid=false;
        }
    }
    if(isset($_POST['ftelephone'])){
        $ftelephone=$_POST['ftelephone'];
        if(empty($ftelephone))
        {
        $valid=false;
        }
    }
    if(isset($_POST['fmobile'])){
        $fmobile=$_POST['fmobile'];
        if(empty($fmobile))
        {
        $valid=false;
        }
    }
    
	if($fstatus=="fliving"){

    //to select applicant_id
	$select="SELECT applicant.id FROM applicant
    INNER JOIN address
    ON applicant.addressid=address.id WHERE address.email='$email' and address.mobile='$mobile' and address.facebook='$facebook' ";
    $sr=mysqli_query($conn,$select);
    $checkrows=mysqli_num_rows($sr);
    
    //to select addressid
    $select1="SELECT address.id FROM address WHERE mobile='$fmobile'";
	$sr1=mysqli_query($conn,$select1);
    $checkrows1=mysqli_num_rows($sr1);
	
        if($checkrows==1 && $checkrows1==1) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
	$row=$sr->fetch_assoc();
    $fapplicant_id=$row['id'];//applicant_id
    //echo $fapplicant_id;

    $row1=$sr1->fetch_assoc();
    $faddressid=$row1['id'];//addressid
    //echo $faddressid;	
		
		$sql="INSERT INTO parent(applicant_id,name,nationality,citizenship,status,age,occupation,position,addressid,parent_status,guardian_status) 
		VALUES('$fapplicant_id','$fname','$fnationality','$fcitizen','$fstatus','$fage','$foccupation','$fposition','$faddressid','father','$gstatus') ";
		$result=mysqli_query($conn,$sql);

		if($result){
			echo "Insert successfully";
		}
		else{
			echo "Error: " . $sql . "
			" . mysqli_error($conn);;
		}
		
    }else{
        echo "father's info exists";
    }
    }else{
        //to select applicant_id
	$select="SELECT applicant.id FROM applicant
    INNER JOIN address
    ON applicant.addressid=address.id WHERE address.email='$email' and address.mobile='$mobile' and address.facebook='$facebook' ";
    $sr=mysqli_query($conn,$select);
    $checkrows=mysqli_num_rows($sr);

    if($checkrows==1) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
        $row=$sr->fetch_assoc();
        $fapplicant_id=$row['id'];//applicant_id
        //echo $fapplicant_id;	
            
            $sql="INSERT INTO parent(applicant_id,name,nationality,citizenship,status,age,occupation,position,parent_status,guardian_status) 
            VALUES('$fapplicant_id','$fname','$fnationality','$fcitizen','$fstatus','','','','father','$gstatus') ";
            $result=mysqli_query($conn,$sql);
    
            if($result){
                echo "Insert successfully";
            }
            else{
                echo "Error: " . $sql . "
                " . mysqli_error($conn);;
            }
    }else{
        echo "father's info exists";
    }
    }

    //for mother variables
    if(isset($_POST['mname'])){
        $mname=$_POST['mname'];
        if(empty($fname))
        {
            $mname_error='Please fill name';
            $valid=false;
        }
    }

    if(isset($_POST['mnationality'])){
        $mnationality=$_POST['mnationality'];
        if(empty($mnationality))
        {
            $valid=false;
        }
    }

    if(isset($_POST['mcitizen'])){
        $mcitizen=$_POST['mcitizen'];
        if(empty($mcitizen))
        {
            $mcitizen_error='Please fill citizenship';
            $valid=false;
        }
    }

    if(isset($_POST['mstatus'])){
        $mstatus=$_POST['mstatus'];
        if(empty($mstatus))
        {
        $valid=false;
        }
    }

    if(isset($_POST['mage'])){
        $mage=$_POST['mage'];
        if(empty($mage))
        {
        $valid=false;
        }
    }
    if(isset($_POST['moccupation'])){
        $moccupation=$_POST['moccupation'];
        if(empty($moccupation))
        {
        $valid=false;
        }
    }
    if(isset($_POST['mposition'])){
        $mposition=$_POST['mposition'];
        if(empty($mposition))
        {
        $valid=false;
        }
    }
    if(isset($_POST['mstreet'])){
        $mstreet=$_POST['mstreet'];
        if(empty($mstreet))
        {
        $valid=false;
        }
    }
    if(isset($_POST['mtownship'])){
        $mtownship=$_POST['mtownship'];
        if(empty($mtownship))
        {
        $valid=false;
        }
    }
    if(isset($_POST['mzipcode'])){
        $mzipcode=$_POST['mzipcode'];
        if(empty($mzipcode))
        {
        $valid=false;
        }
    }
    if(isset($_POST['mcity'])){
        $mcity=$_POST['mcity'];
        if(empty($mcity))
        {
        $valid=false;
        }
    }
    if(isset($_POST['mtelephone'])){
        $mtelephone=$_POST['mtelephone'];
        if(empty($mtelephone))
        {
        $valid=false;
        }
    }
    if(isset($_POST['mmobile'])){
        $mmobile=$_POST['mmobile'];
        if(empty($mmobile))
        {
        $valid=false;
        }
    }
    if($mstatus=="mliving"){

        //to select applicant_id
        $select="SELECT applicant.id FROM applicant
        INNER JOIN address
        ON applicant.addressid=address.id WHERE address.email='$email' and address.mobile='$mobile' and address.facebook='$facebook' ";
        $sr=mysqli_query($conn,$select);
        $checkrows=mysqli_num_rows($sr);
        
        //to select addressid
        $select1="SELECT address.id FROM address WHERE mobile='$mmobile'";
        $sr1=mysqli_query($conn,$select1);
        $checkrows1=mysqli_num_rows($sr1);
        
            if($checkrows==1 || $checkrows1==1) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
        $row=$sr->fetch_assoc();
        $mapplicant_id=$row['id'];//applicant_id
        //echo $fapplicant_id;
    
        $row1=$sr1->fetch_assoc();
        $maddressid=$row1['id'];//addressid
        //echo $faddressid;	
            
            $sql="INSERT INTO parent(applicant_id,name,nationality,citizenship,status,age,occupation,position,addressid,parent_status,guardian_status) 
            VALUES('$mapplicant_id','$mname','$mnationality','$mcitizen,'$mstatus','$mage','$moccupation','$mposition','$maddressid','mother','$gstatus') ";
            $result=mysqli_query($conn,$sql);
    
            if($result){
                echo "Insert successfully";
            }
            else{
                echo "Error: " . $sql . "
                " . mysqli_error($conn);;
            }
            
        }else{
            echo "mother's info exists";
        }
        }else{
            //to select applicant_id
        $select="SELECT applicant.id FROM applicant
        INNER JOIN address
        ON applicant.addressid=address.id WHERE address.email='$email' and address.mobile='$mobile' and address.facebook='$facebook' ";
        $sr=mysqli_query($conn,$select);
        $checkrows=mysqli_num_rows($sr);
    
        if($checkrows==1) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
            $row=$sr->fetch_assoc();
            $mapplicant_id=$row['id'];//applicant_id
            //echo $fapplicant_id;	
                
                $sql="INSERT INTO parent(applicant_id,name,nationality,citizenship,status,age,occupation,position,parent_status,guardian_status) 
                VALUES('$mapplicant_id','$mname','$mnationality','$mcitizen','$mstatus','','','','mother','$gstatus') ";
                $result=mysqli_query($conn,$sql);
        
                if($result){
                    echo "Insert successfully";
                }
                else{
                    echo "Error: " . $sql . "
                    " . mysqli_error($conn);;
                }
        }else{
            echo "mother's info exists";
        }
        }

        //for guardian variables
        if(isset($_POST['gname'])){
            $gname=$_POST['gname'];
            if(empty($gname))
            {
                $gname_error='Please fill name';
                $valid=false;
            }
        }
    
        if(isset($_POST['gnationality'])){
            $gnationality=$_POST['gnationality'];
            if(empty($gnationality))
            {
                $valid=false;
            }
        }
    
        if(isset($_POST['gcitizen'])){
            $gcitizen=$_POST['gcitizen'];
            if(empty($gcitizen))
            {
                $valid=false;
            }
        }
    
        if(isset($_POST['gstatus'])){
            $gstatus=$_POST['gstatus'];
            if(empty($gstatus))
            {
            $valid=false;
            }
        }
    
        if(isset($_POST['gage'])){
            $gage=$_POST['gage'];
            if(empty($gage))
            {
            $valid=false;
            }
        }
        if(isset($_POST['goccupation'])){
            $moccupation=$_POST['goccupation'];
            if(empty($goccupation))
            {
            $valid=false;
            }
        }
        if(isset($_POST['gposition'])){
            $mposition=$_POST['gposition'];
            if(empty($gposition))
            {
            $valid=false;
            }
        }
        if(isset($_POST['gstreet'])){
            $gstreet=$_POST['gstreet'];
            if(empty($gstreet))
            {
            $valid=false;
            }
        }
        if(isset($_POST['gtownship'])){
            $gtownship=$_POST['gtownship'];
            if(empty($gtownship))
            {
            $valid=false;
            }
        }
        if(isset($_POST['gzipcode'])){
            $mzipcode=$_POST['gzipcode'];
            if(empty($gzipcode))
            {
            $valid=false;
            }
        }
        if(isset($_POST['gcity'])){
            $gcity=$_POST['gcity'];
            if(empty($gcity))
            {
            $valid=false;
            }
        }
        if(isset($_POST['gtelephone'])){
            $gtelephone=$_POST['gtelephone'];
            if(empty($gtelephone))
            {
            $valid=false;
            }
        }
        if(isset($_POST['gmobile'])){
            $gmobile=$_POST['gmobile'];
            if(empty($gmobile))
            {
            $valid=false;
            }
        }
        if(isset($_POST['guastatus'])){
            $guastatus=$_POST['guastatus'];
            if(empty($guastatus))
            {
            $valid=false;
            }
        }

        if(isset($_POST['gstatus']))
	    {
    
        if($_POST['gstatus']=="other")
        {

        if($guastatus=="gliving"){

            //to select applicant_id
            $select="SELECT applicant.id FROM applicant
            INNER JOIN address
            ON applicant.addressid=address.id WHERE address.email='$email' and address.mobile='$mobile' and address.facebook='$facebook' ";
            $sr=mysqli_query($conn,$select);
            $checkrows=mysqli_num_rows($sr);
            
            //to select addressid
            $select1="SELECT address.id FROM address WHERE mobile='$gmobile'";
            $sr1=mysqli_query($conn,$select1);
            $checkrows1=mysqli_num_rows($sr1);
            
                if($checkrows==1 || $checkrows1==1) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
            $row=$sr->fetch_assoc();
            $gapplicant_id=$row['id'];//applicant_id
            //echo $fapplicant_id;
        
            $row1=$sr1->fetch_assoc();
            $gaddressid=$row1['id'];//addressid
            //echo $faddressid;	
                
                $sql="INSERT INTO parent(applicant_id,name,nationality,citizenship,status,age,occupation,position,addressid,parent_status,guardian_status) 
                VALUES('$gapplicant_id','$gname','$gnationality','$gcitizen,'$gstatus','$gage','$goccupation','$gposition','$gaddressid','other','$gstatus') ";
                $result=mysqli_query($conn,$sql);
        
                if($result){
                    echo "Insert successfully";
                }
                else{
                    echo "Error: " . $sql . "
                    " . mysqli_error($conn);;
                }
                
            }else{
                echo "guardian's info exists";
            }
            }else{
                //to select applicant_id
            $select="SELECT applicant.id FROM applicant
            INNER JOIN address
            ON applicant.addressid=address.id WHERE address.email='$email' and address.mobile='$mobile' and address.facebook='$facebook' ";
            $sr=mysqli_query($conn,$select);
            $checkrows=mysqli_num_rows($sr);
        
            if($checkrows==1) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
                $row=$sr->fetch_assoc();
                $gapplicant_id=$row['id'];//applicant_id
                //echo $fapplicant_id;	
                    
                    $sql="INSERT INTO parent(applicant_id,name,nationality,citizenship,status,age,occupation,position,parent_status,guardian_status) 
                    VALUES('$gapplicant_id','$gname','$gnationality','$gcitizen','$gstatus','','','','other','$gstatus') ";
                    $result=mysqli_query($conn,$sql);
            
                    if($result){
                        echo "Insert successfully";
                    }
                    else{
                        echo "Error: " . $sql . "
                        " . mysqli_error($conn);;
                    }
            }else{
                echo "guardian's info exists";
            }
            }
        }
    }
    

    mysqli_close($conn);

}   
    
?>
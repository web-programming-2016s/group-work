<?php
	
	require_once("config.php");
		require_once("header.php"); 
	//start server session to store data
	//in every file you want to access session
	//you should require functions
	session_start();
	
	function login($user, $pass){
		
		//hash the password
		$pass = hash("sha512", $pass);
		
		$mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"], "webpr2016_qpelit");
		
		$stmt = $mysql->prepare("SELECT id FROM my_Data WHERE user_name=? and password=?");
		
		echo $mysql->error;
		
		$stmt->bind_param("ss", $user, $pass);
		
		$stmt->bind_result($id);
		
		$stmt->execute();
		
		//get the data
		if($stmt->fetch()){
			echo "user with id ".$id." logged in!";
			
			//create session variables 
			//redirect user
			$_SESSION["user_id"] = $id;
			$_SESSION["user_name"] = $user;
			
			header("Location: restrict.php");
			
			
		}else{
			// username was wrong or password was wrong or both
			echo $stmt->error;
			echo "wrong credentials";
		}
		
	}

	function signup($user, $mail, $gender, $phone, $pass){
		
		//hash the password
		$pass = hash("sha512", $pass);
		
		
		// GLOBALS - access outside variable in function
		$mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"], "webpr2016_qpelit");
		
		$stmt = $mysql->prepare("INSERT INTO my_Data (user_name, mail, gender, phone, password) VALUES (?,?,?,?,?)");
		
		echo $mysql->error;
		
		$stmt->bind_param("sssss", $user, $mail, $gender, $phone, $pass);
		
		if($stmt->execute()){
			echo "user saved successfully!";
		}else{
			echo $stmt->error;
		}
		
	}


	
	

function addTopic($topic_subject, $topic_content, $topic_cat, $topic_by,$topic_byName){
    
    
    $mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"], "webpr2016_qpelit");
    
    $stmt = $mysql->prepare("INSERT INTO topics (topic_subject,topic_content,topic_cat,topic_by,topic_byName) VALUES (?, ?,?,?,?)");
		
		echo $mysql->error;
		
		//$_SESSION["user_id"] logged in user ID
		$stmt->bind_param("ssiis", $topic_subject, $topic_content, $topic_cat, $topic_by,$topic_byName);
		
		if($stmt->execute()){
			 	?>
			<div class="alert alert-success" role="alert">"<b> Successfully Submitted!</b> </div>
			<?php
		}else{
			echo $stmt->error;
		}
    
    
    
    
    
    
}

function showTopics($topic_catNum){
     $mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"], "webpr2016_qpelit");
    
    $stmt = $mysql->prepare("SELECT id, topic_subject, topic_cat, topic_by,topic_byName, topic_date FROM topics WHERE topic_cat='".$topic_catNum."' ORDER BY topic_date ");
	
	//WHERE deleted IS NULL show only those that are not deleted
	
	//if error in sentence
	echo $mysql->error;
	
	//variables for data for each row we will get
	$stmt->bind_result($top_id, $topic_subject, $topic_cat, $topic_by, $topic_byName,$topic_date);
	
	//query
	$stmt->execute();
	if($topic_catNum==1){
        $topic_catName="PHP";
    }
    else if($topic_catNum==2){
         $topic_catName="IOS";
        
    }
      else if($topic_catNum==3){
         $topic_catName="ANDROID";
        
    }
 else if($topic_catNum==4){
          $topic_catName="Game Development";
    }
	$table_html = "";
	
 
         
	//add smth to string .=
    
  ?>  


<br>
  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading"><?php echo $topic_catName ?></div>
      <div class="panel-body">
     <?php
	$table_html .= "<table class='table table-hover'>";
		$table_html .= "<tr>";
			$table_html .= "<th>Topic</th>";
			$table_html .= "<th>User</th>";
			$table_html .= "<th>Created</th>";
		$table_html .= "</tr>";

	// GET RESULT 
	//we have multiple rows
	while($stmt->fetch()){
		
		//DO SOMETHING FOR EACH ROW
		//echo $id." ".$message."<br>";
		$table_html .= "<tr>"; //start new row
    
			$table_html .= "<td><a href='?topicid=$top_id'>".$topic_subject."</a></td>"; //add columns
			$table_html .= "<td>".$topic_byName."</td>";
			$table_html .= "<td>".$topic_date."</td>";

		
		$table_html .= "</tr>"; //end row

	}
	$table_html .= "</table>";
    $table_html .= "</div>";
    $table_html .= "</div>";
        $table_html .= "</div>";
		echo $table_html;
 


}
function showBadge($catNum){
    
    $mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"], "webpr2016_qpelit");
    $stmt=$mysql->prepare("SELECT COUNT(topic_content) FROM topics WHERE topic_cat='".$catNum."'");
    $stmt->bind_result($topicCount);
   
    echo $mysql->error;
    	$stmt->execute();
  $stmt -> fetch();
    echo  $topicCount;
}
function showContent($topic_id){
     if(isset($_GET["edit_content"])){
 
            editTopic($_GET["topic_subject"],$_GET["topic_content"], $_GET["topic_cat"], $topic_id);
        
        }
    
      $mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"], "webpr2016_qpelit");
    
    $stmt = $mysql->prepare("SELECT topic_subject,topic_content, topic_cat, topic_byName,topic_by, topic_date FROM topics WHERE id='".$topic_id."'");
	
	//WHERE deleted IS NULL show only those that are not deleted
	
	//if error in sentence
	echo $mysql->error;
	
	//variables for data for each row we will get
	$stmt->bind_result($topic_subject,$topic_content, $topic_cat, $topic_byName, $topic_by, $topic_date);
     $stmt->execute();
    $stmt->fetch();


   
          if(!isset($_GET["edit"])){ ?>
         
      <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading"><?php echo $topic_subject;?></div>
      <div class="panel-body"><?php echo "<h4>".$topic_byName."</h4>".$topic_content."<br></br>".$topic_date;
          
        if($topic_by==$_SESSION["user_id"]){         
             ?>
          <form method="GET">   <input class="btn btn-success " name="edit" id="edit" type="submit" value="edit"> </form>
        
        </div>
        <?php
                           }                }
    else{
      
        ?>
        	<form method="GET">
                   <div class="panel-group">
    <div class="panel panel-default">
        <div class="panel-heading">Edit</div>
        <div class="panel-body">
              <div class="row">
    <div class="col-md-5 col-sm-8">
        <h2>Subject</h2> 

	<input type="text" class="form-control" id="topic_subject" name="topic_subject" value="<?php  echo $topic_subject; ?>""> 
          </div> <br></div>
            <div class="row">
        <div class="form-group col-md-5 col-sm-8">
  
  <select class="form-control" name="topic_cat" id="topic_cat">
    <option value="1">Php</option>
      <option value="2">Ios</option>
    <option value="3">Android</option>
     <option value="4">Game Development</option>
  </select>
</div></div>
        
        
        
        
        
    <div class="row">
     <div class="col-md-11 col-sm-8">

  
        <h2>Content</h2>
        
    <textarea class="form-control" id="topic_content" name="topic_content"  rows="5"><?php echo $topic_content; ?></textarea>
             
         	<input class="btn btn-success " name="edit_content" id="edit_content" type="submit" value="submit">
         </div></div></div>
      </form>  <?php
        
       
    

    }}
    
    

function editTopic($topic_subject,$topic_content,$topic_cat,$topic_id){
    
                $mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"], "webpr2016_qpelit");
               $stmt = $mysql->prepare("UPDATE topics SET topic_subject=?, topic_content=?,topic_cat=? WHERE id=?");
			
			echo $mysql->error;
			
			$stmt->bind_param("ssii", $topic_subject,$topic_content, $topic_cat, $topic_id);
			
			if($stmt->execute()){
				
				echo "saved successfully"; 
                
   
       
			}else{
				echo $stmt->error;
			}
            
            
            
    
    
    
}
function editReply($reply_id,$reply_content){
    
        $mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"], "webpr2016_qpelit");
               $stmt = $mysql->prepare("UPDATE replies SET reply_content=? WHERE reply_id=?");
			
			echo $mysql->error;
			
			$stmt->bind_param("si", $reply_content,$reply_id);
			
			if($stmt->execute()){
				
				echo "saved successfully"; 
                
   
       
			}else{
				echo $stmt->error;
			}
    
    
    
}
function submitReply($user_id,$user_name,$reply_content,$topic_id){
    
       $mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"], "webpr2016_qpelit");
    
    $stmt = $mysql->prepare("INSERT INTO replies (topic_id,reply_content,reply_by,reply_byName) VALUES (?, ?,?,?)");
		
		echo $mysql->error;
		
		//$_SESSION["user_id"] logged in user ID
		$stmt->bind_param("isis",$topic_id,$reply_content,$user_id,$user_name);
		
		if($stmt->execute()){
			 	?>
			<div class="alert alert-success" role="alert">"<b> Successfully Submitted!</b> </div>
			<?php
		}else{
			echo $stmt->error;
		}
}
function showReplies($topic_id){
    
   
 
    
    
        $mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"], "webpr2016_qpelit");
    
    $stmt = $mysql->prepare("SELECT reply_id,reply_byName,reply_by,reply_content,reply_date FROM replies WHERE topic_id='".$topic_id."' ORDER BY reply_id");
	
	//WHERE deleted IS NULL show only those that are not deleted
	
	//if error in sentence
	echo $mysql->error;
	 $html_reply="";
	//variables for data for each row we will get
	$stmt->bind_result($reply_id,$reply_byName,$reply_by, $reply_content,$reply_date);
       if($stmt->execute()){
		
		}else{
			echo $stmt->error;
		}


	while($stmt->fetch()){
   
     $html_reply .="<div class='panel-group'>";
     $html_reply .="<div class='panel panel-primary'>";
      $html_reply .="<div class='panel-heading'> @ ".$reply_byName."</div>";
    $html_reply .="<div class='panel-body'>".$reply_content."<br>".$reply_date."</div>";
        if($reply_by==$_SESSION["user_id"]){
        $html_reply.="<a href='?reply_Eid=$reply_id&reply_eContent=$reply_content'>edit</a>";
}
     $html_reply .="</div>";
    $html_reply .="</div><br>";
    }
   
       
        if(isset($_GET["reply_eContent"])){
              $_SESSION["id"]=$_GET["reply_Eid"];
        ?>
           
 <form method="GET">
        <textarea class="form-control" id="reply_edited" name="reply_edited" rows="4"><?php echo $_GET["reply_eContent"]; ?></textarea>
             <div class="row_b">
         	<input class="btn btn-success " name="reply_edit" id="reply_edit" type="submit" value="submit">
        </form>
        <?php
            
     
     
        
         
        }    
     if(isset($_GET["reply_edit"])){

         editReply($_SESSION["id"],$_GET["reply_edited"]);
         header("Location: restrictTopic.php");
        
     }
   echo $html_reply;

}


?>

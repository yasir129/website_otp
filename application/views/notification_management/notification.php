<!DOCTYPE html>
<html lang="en">
<head>
  <title>Website</title>
   <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/stylesheet.css")?>">
   <title>Website</title>
  
  <style type="text/css">
  	
  	body, html {
		  height: 100%;
		}

	* {
	  box-sizing: border-box;
	}
	.box-item{
	position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
}
	.form-control {
        min-height: 41px;
		background: #fff;
		box-shadow: none !important;
		border-color: #e3e3e3;
	}
	.form-control:focus {
		border-color: #70c5c0;
	}
    .form-control, .btn {        
        border-radius: 2px;
    }
	.login-form {
		width: 350px;
		margin: 0 auto;
		padding: 100px 0 30px;		
	}
	.login-form .fix-box {
		color: #7a7a7a;
		border-radius: 2px;
    	margin-bottom: 15px;
    	height:600px;
    			overflow-y:scroll;
        font-size: 13px;
        background: #ececec;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;	
        position: relative;	
    }
	.login-form h2 {
		font-size: 22px;
        margin: 35px 0 25px;
    }
	.login-form .avatar {
		position: absolute;
		margin: 0 auto;
		left: 0;
		right: 0;
		top: -50px;
		width: 95px;
		height: 95px;
		border-radius: 50%;
		z-index: 9;
		background:#9932CC;
		padding: 15px;
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
	}
	.login-form .avatar img {
		width: 100%;
	}	
    .login-form input[type="checkbox"] {
        margin-top: 2px;
    }
    .login-form .btn {        
        font-size: 16px;
        font-weight: bold;
		background: #2481BF;
		border: none;
		margin-bottom: 20px;
    }
	.login-form .btn:hover, .login-form .btn:focus {
		background:#2591BF;
        outline: none !important;
	}    
	.login-form a {
		color: #fff;
		text-decoration: underline;
	}
	.login-form a:hover {
		text-decoration: none;
	}
	.login-form fix-box a {
		color: #7a7a7a;
		text-decoration: none;
	}
	.login-form fix-box a:hover {
		text-decoration: underline;
	}
  	
	.root_design{


	    width:100%;
		position: relative;
		margin-bottom: 10px;

	}
	.text-box{

		margin:10px;
		width:200px;
		margin-bottom: 0px;
	}
	.text-box dt{
		font-size: 15px;

	}
	.text-box dd{
		font-size: 12px;
		
	}
	hr{
	    width:100%;
	    background-color:grey;
	    margin: !important;
	    
	}
	.root_design button{
		position: absolute;
		top:0;
		right: 10;
		float: right;
	}
	input{
	
    -webkit-font-smoothing: antialiased;
    resize: none;
    display: inline !important;

}
input[type="radio"]{
    -webkit-appearance: radio;
    margin: 2px;
}
input[type="checkbox"]{
	margin:2px;
}
  </style>
}
}
</head>
<body>
		        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container dashboard-content">
                <form class="bg-white" action="<?php echo base_url("index.php/Admin_con/show_search_notification")?>" method="post">
                <div class="input-group">
				    <input type="text" class="form-control" name="search" placeholder="Search by Phone Number OR UTC">
				    <div class="input-group-append">
				      <button class="btn btn-primary" type="submit">
				        <i class="fa fa-search"></i>
				      </button>
				    </div>
				  </div>
				</form>
	    <?php if(isset($med_data)){?>	
	    <form style ="border-radius:20px;border:1px solid lightgrey;margin-top: 10px;padding:20px;" class="container bg-white" action="<?php echo base_url("index.php/Admin_con/update_data")?>" method="post">
	    	
	    	<?php
				
					echo "<h2 class='text-center'>UPDATE MEDICATION</h2>";
					foreach($med_data['medication'] as $row){
			?>
			<div class="form-group">
	       		<b>Medication</b>
	        	<input type="text" class="form-control" value = "<?php echo $row['medication_name'];?>" name="m_name" placeholder="Medication name" required="required">
	        </div>
	       <div class="form-group">
	       		<b>Dosage</b>
	        	<input type="text" class="form-control" value = "<?php echo $row['dosage'];?>" name="dosage" placeholder="Dosage" required="required">
	        </div>
	        <div class="form-group">
	        	<?php if($row['meal'] == "1"){?>
	        		<label class="checkbox-inline"><input type="checkbox" name="intake" value="meal" checked>Take With Meal</label>
	        	<?php }else{?>
	        		<label class="checkbox-inline"><input type="checkbox" name="intake" value="meal">Take With Meal</label>
	        	<?php }?>
	        </div>
	        <div class="form-group">
	      	<b>Time(s) per day</b>
		        <div>
				  <select id="days" name="intake_in_day">
				  	<?php for($i=1;$i<6;$i++){if((string)$i == sizeof($med_data['time'])){?>

					     <option value="<?php echo $i; ?>" selected><?php echo $i;?></option>  
					    <?php }else{?>
					    <option value="<?php echo $i; ?>"><?php echo $i;?></option>
					<?php 
				}
			}?>
				  </select>
  				</div>
			</div>
			<script type="text/javascript">
				$(document).ready(function(){
					$("#days").mouseup(function(){
						$('.dest').remove();
						var i = $("#days option:selected").val();
						for(var j = 0;j < i;j++){
							$("#dynamic").append('<div style="margin-top:5px;" class="dest" id="row'+j+'"><input type="time" id="'+j+'" name="appt[]" value="time'+j+'" required></div>');
						}
					})
				})
			</script>
			<div id="dynamic" class="form-group">
		        <?php 
		        	$count=0;
		        	foreach($med_data['time'] as $m){
		        		echo "<div style='margin-top:5px;' class='dest' id='row".$count."'><input type='time' id='row".$count."' name='appt[]' value='".$m['time']."' required></div>";
		        		$count++;
		        	}
		        ?>
			</div>
			<b>Recurrence</b>
			<div style="margin-top:10px;" class="form-group">
				<?php if($row['once_day'] != "NOP"){?>
				<label class="radio-inline m"><input type="radio" name="optradio" value="onceevery" checked>Once every</label>
				<select value= "<?php echo $row['once_day'];?>" name="once_day" class="">
					<?php for($i=1;$i<8;$i++){
						if($row['once_day'] == (string)$i){?>
						    <option value="<?php echo $i; ?>" selected><?php echo $i;?></option>  
				    <?php
					}
					else{
						?>
						 <option value="<?php echo $i; ?>"><?php echo $i;?></option>
						<?php
					}
				}
				?>
			  	</select>
			  	<label class="inline">Day</label>
				<?php }else{?>
				<label class="radio-inline "><input type="radio"  name="optradio" value="onceevery">Once every
				</label>
				<select name="once_day" class="">
				    <option value="1">1</option>
				    <option value="2">2</option>
				    <option value="3">3</option>
				    <option value="4">4</option>
				    <option value="5">5</option>
				    <option value="6">6</option>
				    <option value="7">7</option>
			  	</select>
			  	<label class="inline">Day</label>
			  	<?php } ?>

			</div>
            <hr>
            <?php if($row['once_month'] == "NOP" AND $row['once_day'] == "NOP"){?>
			<div class="form-group">
				<label class="radio-inline m"><input type="radio" name="optradio" value="weekly" checked>Days of Week</label>
			</div>
			<div style="margin-left:15px;" class="form-group">
				<?php 
				 $sam_week = array("mon","tues","wed","thurs","fri","sat","sun");
				 $count = 0;
				 $bool = 1;
				 for($i=0;$i<7;$i++){foreach($med_data['week'] as $m1){ if($m1['week'] == $sam_week[$i]){ $bool = 0?>

					<label class="checkbox-inline"><input name=week[] type="checkbox" value="<?php echo $sam_week[$i]; ?>" checked><?php  ?><?php echo $sam_week[$i]; ?></label>

					<?php }
					}
					if($bool){
						?>
						<label class="checkbox-inline"><input name=week[] type="checkbox" value="<?php echo $sam_week[$i]; ?>"><?php echo $sam_week[$i]; ?></label>

						<?php
					}
					$bool = 1;
				}


			?>
			</div>
		<?php }else{?>
			<div class="form-group">
				<label class="radio-inline m"><input type="radio" name="optradio" value="weekly">Days of Week</label>
			</div>
			<div style="margin-left:15px;" class="form-group">
				<label class="checkbox-inline"><input name=week[] type="checkbox" value="mon">Mon</label>
				<label class="checkbox-inline"><input name=week[] type="checkbox" value="tues">Tues</label>
				<label class="checkbox-inline"><input name=week[] type="checkbox" value="wed">Weds</label>
				<label class="checkbox-inline"><input name=week[] type="checkbox" value="thurs">Thurs</label>
			    <label class="checkbox-inline"><input name=week[] type="checkbox" value="fri">Fri</label>
				<label class="checkbox-inline"><input name=week[] type="checkbox" value="sat">Sat</label>
				<label class="checkbox-inline"><input name=week[] type="checkbox" value="sun">Sun</label>
			</div>
		<?php }?>
			<!--<hr>-->
			<!--<div class="form-group">-->
			<!--	<?php if($row['once_month'] != "NOP"){?>-->
			<!--	<label class="radio-inline m"><input type="radio" name="optradio"  value="oncemonth" checked>Once a month</label>-->
			<!--	<?php }else{?>-->
			<!--	<label class="radio-inline m"><input type="radio" name="optradio"  value="oncemonth">Once a month</label>-->
			<!-- 	<?php }?>-->
			<!--</div>	  -->
	        <div class="form-group">
	        	<input type="hidden" name="hidden_id" value="<?php echo $row['Id'];?>"/>
	            <input style="border-radius: 10px;" type="submit" value="Update" name="update" class="btn btn-primary btn-lg btn-block"/>
	        </div>

			<?php
					}

				}
			?> 
			<b style="color:green;text-align: center;width: 100% !important;"><?php echo $this->session->userdata('fail_insert');?></b>
    	        <?php $this->session->unset_userdata('fail_insert');?>
	        
	    </form>
		<div style ="margin-top: 20px;">
			<h2 style="text-align: center;">NOTIFICATION DATA</h2>
			
		  <b style="color:<?php echo $this->session->userdata('color'); ?>;text-align: center;width: 100%;"><?php echo $this->session->userdata('success_message');?></b>
    	        <?php $this->session->unset_userdata('success_message');?>      
		  <table class="table table-bordered ">
		    <?php
		    	foreach($all as $m){if($m['medication'] != null){
		    ?>
		    <thead class="thead-dark">
		      <tr class="success">
		      	<th scope="col">Id</th>
		        <th scope="col" colspan='4'>Phone Number</th>
		        <th scope="col" colspan='4'>UTC</th>
		      </tr>
		    </thead>
		    <tbody>
		    	<?php 
					
					echo "<tr >";
			    	echo "<td>".strtoupper($m['Id'])."</td>
			    	<td colspan='4'>".$m["phone_number"]."</td><td colspan='4'>
			    	UTC ".$m["UTC_val"]."</td> 
			    	";
			    	echo "</tr>"; 
			     ?>
		
		    </tbody>
		    <thead>
		      <tr class="bg-primary">
		      	<th class="text-white">Mid</th>
		        <th class="text-white">Medication Name</th>
		        <th class="text-white">Dosage</th>
		        <th class="text-white">Time</th>
		        <th class="text-white">Once every</th>
		        <th class="text-white">Week</th>
		        <!--<th class="text-white">Once a Month</th>-->
		        <th class="text-white">Delete</th>
		        <th class="text-white">Edit</th>
		      </tr>
		    </thead>
		    <tbody>
		    	<?php 
					foreach($m['medication'] as $m1){
						echo "<tr>";
				    	echo "<td>".strtoupper($m1['Id'])."</td>
				    	<td >".$m1["medication_name"]."</td><td >
				    	".$m1["dosage"]."</td> 
				    	";
				    	$temp = "";
				    	foreach($m1['time'] as $mt){
				    		if($mt >= "11:59:59"){
					            $temp=$temp.$mt." PM,";
					        }
					        else{
					            $temp=$temp.$mt." AM,";
					        }
				    	} 
				    	echo "<td >
				    	".$temp."</td>";
				    	echo "<td >
				    	".$m1['once_day']."</td>";
				    	$temp1 = "";
				    	foreach ($m1['week'] as $mw) {
				    		$temp1 = $temp1.$mw." ,";
				    	}
				    	if($temp1 == ""){
				    		echo "<td >NOP
				    	</td>";
				    	}
				    	else{
				    	echo "<td >
				    	".$temp1."</td>";
					    }	
				    // 	echo "<td >
				    // 	".$m1['once_month']."</td>";
				    	echo "<td> <a href='".base_url("index.php/Admin_con/medication_remove/". $m1['Id'])."'>Delete</a></td><td><a href='".base_url("index.php/Admin_con/notify_update/". $m1['Id'])."'>Edit</a></td><tr>";
				    	echo "</tr>";
				    }
			     ?>
		
		    </tbody>
		<?php }
		} ?>
		  </table>

	</div>	
</div></div></div>




</body>
</html>

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

  </style>
</head>
<body>

        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container dashboard-content ">
	    <form style ="margin-top: 10px;" action="<?php echo base_url("index.php/Admin_con/insert")?>" method="post">
	    	
	    	<?php
				if(isset($admin_data)){
					echo "<h2 class='text-center'>UPDATE ADMIN</h2>";
					foreach($admin_data as $row){
			?>
			<div class="form-group">
	        	<input type="text" class="form-control" name="username" value="<?php echo $row['username'];?>" placeholder="Username" required="required">
	        </div>
			<div class="form-group">
	        	<input type="password" class="form-control" value="<?php echo $row['password']; ?>" name="password" placeholder="Password" required="required">
	        </div>       
	        <div class="form-group">
	        	<input type="hidden" name="hidden_id" value="<?php echo $row['Id']; ?>"/>
	            <input style="border-radius: 10px;" type="submit" value="Update" name="update" class="btn btn-primary btn-lg btn-block"/>
	        </div>



			<?php
					}
				}
			else{
				echo "<h2 class='text-center'>ADD ADMIN</h2>";
			?>  
	       	<div class="form-group">
	        	<input type="text" class="form-control" name="username" placeholder="Username" required="required">
	        </div>
			<div class="form-group">
	        	<input type="text" class="form-control" name="password" placeholder="Password" required="required">
	        </div>       
	        <div class="form-group">
	            <button style="border-radius: 10px;" type="submit" class="btn btn-primary btn-lg btn-block">Insert</button>
	        </div>
	        <b style="color:green;text-align: center;width: 100% !important;"><?php echo $this->session->userdata('fail_insert');?></b>
    	        <?php $this->session->unset_userdata('fail_insert');?>
    	     <?php } ?>
	    </form>
			<h2>ADMIN DATA</h2>
			
		            
		  <table class="table table-bordered">
		    <thead class="thead-dark">
		      <tr>
		      	<th>Id</th>
		        <th>Username</th>
		        <th>Password</th>
		        <th>Delete</th>
		        <th>Edit</th> 
		      </tr>
		    </thead>
		    <tbody>
		    	<?php 
					foreach($all as $m){
						echo "<tr>";
				    	echo "<td>".strtoupper($m['Id'])."</td>
				    	<td>".$m["username"]."</td><td>
				    	".$m["password"]."</td> <td> <a href='".base_url("index.php/Admin_con/admin_remove/". $m['Id'])."'>Delete</a></td><td><a href='".base_url("index.php/Admin_con/admin_update/". $m['Id'])."'>Edit</a></td><tr>"; 

			    } ?>
		
		    </tbody>
		  </table>
	</div>	
</div></div>



</body>
</html>

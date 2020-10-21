<!DOCTYPE html>
<html lang="en">
<head>
  <title>Website</title>

  <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/stylesheet.css")?>">
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
	.login-form form {
		color: #7a7a7a;
		border-radius: 2px;
    	margin-bottom: 15px;
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
		background:#2481BF;
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
		background:#2481BF;
		border: none;
		margin-bottom: 20px;
    }
	.login-form .btn:hover, .login-form .btn:focus {
		background: #2591BF;
        outline: none !important;
	}    
	.login-form a {
		color: #fff;
		text-decoration: underline;
	}
	.login-form a:hover {
		text-decoration: none;
	}
	.login-form form a {
		color: #7a7a7a;
		text-decoration: none;
	}
	.login-form form a:hover {
		text-decoration: underline;
	}
	hr{
	    background-color:white;
	    width:100%;
	    height:2px;
	}
  	.bg-image {
	  /* The image used */
	  background-image: url("<?php echo base_url("assets/images/background.jpeg");?>");

	  /* Add the blur effect */
	  filter: blur(2px);
	  -webkit-filter: blur(2px);

	  /* Full height */
	  height: 100%;

	  /* Center and scale the image nicely */
	  background-position: center;
	  background-repeat: no-repeat;
	  background-size: cover;
	}
  </style>
</head>
<body>
	<div class="bg-image"></div>
	<div class="login-form box-item">
	    <form>
	    	<h3 style="text-align: center;">-ABOUT-</h3>
	    	<p>
We had this idea stemming from the fact that it’s so easy to forget to take your medications, but we all have cell phones today. Anyone can check when they get a text to remind themselves to take their medications—the name and dosage too! We hope this tool is helpful for you in the future!
	    	</p>
	    </form>
	</div>




</body>
</html>

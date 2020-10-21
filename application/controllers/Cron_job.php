<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Twilio\Rest\Client;
class Cron_job extends CI_Controller {
	public function message_generator($phone_number,$message){

			// Update the path below to your autoload.php,
			// see https://getcomposer.org/doc/01-basic-usage.md
			require_once 'vendor/autoload.php';

			

			// Find your Account Sid and Auth Token at twilio.com/console
			// DANGER! This is insecure. See http://twil.io/secure
			$sid    = "AC4474a12ece60444185210af5afbc778c";
			$token  = "1de02df2da9d03412a3834488fd0cc62";
			$twilio = new Client($sid, $token);

			$message = $twilio->messages
			                  ->create($phone_number, 
			                           [
			                               "body" => "{$message}",
			                               "from" => "+14425001455"
			                           ]
			                  );

	}
// 	public function message_generator($phone_number,$message){

// 			// Update the path below to your autoload.php,
// 			// see https://getcomposer.org/doc/01-basic-usage.md
// 			require_once 'vendor/autoload.php';

			

// 			// Find your Account Sid and Auth Token at twilio.com/console
// 			// DANGER! This is insecure. See http://twil.io/secure
// 			$sid    = "ACd265d029e293e2012668df011941c0d7";
// 			$token  = "a7ecc531bef776f45000ccd00b6d4b7b";
// 			$twilio = new Client($sid, $token);

// 			$message = $twilio->messages
// 			                  ->create($phone_number, 
// 			                           [
// 			                               "body" => "{$message}",
// 			                               "from" => "+13345084187"
// 			                           ]
// 			                  );

// 	}
	public function croning(){
		$this->load->model('Handler_db');	
		$original = new DateTime("now", new DateTimeZone('GMT'));
		$data = $this->Handler_db->medication_data();
		foreach($data as $v){
			$phone_number = $this->Handler_db->user_data($v['user_id']);
			$timezoneName = timezone_name_from_abbr("",((int)$phone_number[0]['UTC_val'])*3600, false);
			$modified = $original->setTimezone(new DateTimezone($timezoneName));
			$meal =$v['meal'];
			if($v['once_month'] != "NOP"){
				$data1 = $this->Handler_db->fetch_time($v['Id']);
				foreach($data1 as $v1){
					if($modified->format('H:i:s') >= $v1["time"] && $modified->format('H:i:s') <= date('H:i:s',strtotime($v1['time'])+120) && $modified->format('Y-m-d') == $modified->format('Y-m-01')){
								if($meal == 1){
									$message = "Your medicine intake time alert and have to take with meal: MEDICINE NAME = ".$v['medication_name']." DOSAGE = ".$v['dosage'];
									$this->message_generator($phone_number[0]['phone_number'],$message);
								}
								else{
									$message = "Your medicine intake time alert and have to take without meal: MEDICINE NAME = ".$v['medication_name']." DOSAGE = ".$v['dosage'];
									$this->message_generator($phone_number[0]['phone_number'],$message);
								}
					}
				}
			}
			else if($v['once_day'] != "NOP"){
				if( date('Y-m-d', strtotime($v['once_date']. ' + '.$v['once_day'].' days')) == $modified->format('Y-m-d')){
					$data1 = $this->Handler_db->fetch_time($v['Id']);
					$count=0;
					foreach($data1 as $v1){
					    $count = $count +1;
						if($modified->format('H:i:s') >= $v1["time"] && $modified->format('H:i:s') <= date('H:i:s',strtotime($v1['time'])+60)){
								if($meal == 1){
									$message = "Your medicine intake time alert and have to take with meal: MEDICINE NAME = ".$v['medication_name']." DOSAGE = ".$v['dosage'];
									if($count == count($data1)){
									    $this->Handler_db->update_date($v['Id'],$modified->format('Y-m-d'));
									}
									print_r("sdas");
									$this->message_generator($phone_number[0]['phone_number'],$message);
								}
								else{
									$message = "Your medicine intake time alert and have to take without meal: MEDICINE NAME = ".$v['medication_name']." DOSAGE = ".$v['dosage'];
									print_r("sdas");
									if($count == count($data1)){
									    $this->Handler_db->update_date($v['Id'],$modified->format('Y-m-d'));
									}
									$this->message_generator($phone_number[0]['phone_number'],$message);
								}
						}
					}
					$count = 0;
				}

			}
			else{
				$data1 = $this->Handler_db->fetch_week($v['Id']);
				foreach($data1 as $v1){
					foreach($v1 as $e){
						switch($e){
							case "mon":
							    if($e == "mon" && "Monday" == date('l')){
    								$data1 = $this->Handler_db->fetch_time($v['Id']);
    								foreach($data1 as $v1){
    									if($modified->format('H:i:s') >= $v1["time"] && $modified->format('H:i:s') <= date('H:i:s',strtotime($v1['time'])+60)){
    												if($meal == 1){
    													$message = "Your medicine intake time alert and have to take with meal: MEDICINE NAME = ".$v['medication_name']." DOSAGE = ".$v['dosage'];
    													$this->message_generator($phone_number[0]['phone_number'],$message);
    												}
    												else{
    													$message = "Your medicine intake time alert and have to take without meal: MEDICINE NAME = ".$v['medication_name']." DOSAGE = ".$v['dosage'];
    													$this->message_generator($phone_number[0]['phone_number'],$message);
    												}
    									}
    								}
							    }
								break;
							case "tues":
							    if($e == "tues" && "Tuesday" == date('l')){
								$data1 = $this->Handler_db->fetch_time($v['Id']);
								foreach($data1 as $v1){
									if($modified->format('H:i:s') >= $v1["time"] && $modified->format('H:i:s') <= date('H:i:s',strtotime($v1['time'])+60)){
												
												if($meal == 1){
													$message = "Your medicine intake time alert and have to take with meal: MEDICINE NAME = ".$v['medication_name']." DOSAGE = ".$v['dosage'];
													$this->message_generator($phone_number[0]['phone_number'],$message);
												}
												else{
													$message = "Your medicine intake time alert and have to take without meal: MEDICINE NAME = ".$v['medication_name']." DOSAGE = ".$v['dosage'];
													$this->message_generator($phone_number[0]['phone_number'],$message);
												}
									}
								}
							    }
								break;
							case "wed":
							    if($e == "wed" && "Wednesday" == date('l')){
								$data1 = $this->Handler_db->fetch_time($v['Id']);
								foreach($data1 as $v1){
									if($modified->format('H:i:s') >= $v1["time"] && $modified->format('H:i:s') <= date('H:i:s',strtotime($v1['time'])+60)){
												
												if($meal == 1){
													$message = "Your medicine intake time alert and have to take with meal: MEDICINE NAME = ".$v['medication_name']." DOSAGE = ".$v['dosage'];
													$this->message_generator($phone_number[0]['phone_number'],$message);
												}
												else{
													$message = "Your medicine intake time alert and have to take without meal: MEDICINE NAME = ".$v['medication_name']." DOSAGE = ".$v['dosage'];
													$this->message_generator($phone_number[0]['phone_number'],$message);
												}
									}
								}
							    }
								break;
							case "thurs":
							    if($e == "thurs" && "Thursday" == date('l')){
								$data1 = $this->Handler_db->fetch_time($v['Id']);
								foreach($data1 as $v1){
									if($modified->format('H:i:s') >= $v1["time"] && $modified->format('H:i:s') <= date('H:i:s',strtotime($v1['time'])+60)){
												if($meal == 1){
													$message = "Your medicine intake time alert and have to take with meal: MEDICINE NAME = ".$v['medication_name']." DOSAGE = ".$v['dosage'];
													$this->message_generator($phone_number[0]['phone_number'],$message);
												}
												else{
													$message = "Your medicine intake time alert and have to take without meal: MEDICINE NAME = ".$v['medication_name']." DOSAGE = ".$v['dosage'];
													$this->message_generator($phone_number[0]['phone_number'],$message);
												}
									}
								}
							    }
								break;
							case "fri":
							    if($e == "fri" && "Friday" == date('l')){
								$data1 = $this->Handler_db->fetch_time($v['Id']);
								foreach($data1 as $v1){
									if($modified->format('H:i:s') >= $v1["time"] && $modified->format('H:i:s') <= date('H:i:s',strtotime($v1['time'])+60)){
												
												if($meal == 1){
													$message = "Your medicine intake time alert and have to take with meal: MEDICINE NAME = ".$v['medication_name']." DOSAGE = ".$v['dosage'];
													$this->message_generator($phone_number[0]['phone_number'],$message);
												}
												else{
													$message = "Your medicine intake time alert and have to take without meal: MEDICINE NAME = ".$v['medication_name']." DOSAGE = ".$v['dosage'];
													$this->message_generator($phone_number[0]['phone_number'],$message);
												}
									}
								}
							    }
								break;
							case "sat":
							    if($e == "sat" && "Saturday" == date('l')){
								$data1 = $this->Handler_db->fetch_time($v['Id']);
								foreach($data1 as $v1){
									if($modified->format('H:i:s') >= $v1["time"] && $modified->format('H:i:s') <= date('H:i:s',strtotime($v1['time'])+60)){
												
												if($meal == 1){
													$message = "Your medicine intake time alert and have to take with meal: MEDICINE NAME = ".$v['medication_name']." DOSAGE = ".$v['dosage'];
													$this->message_generator($phone_number[0]['phone_number'],$message);
												}
												else{
													$message = "Your medicine intake time alert and have to take without meal: MEDICINE NAME = ".$v['medication_name']." DOSAGE = ".$v['dosage'];
													$this->message_generator($phone_number[0]['phone_number'],$message);
												}
									}
								}
							    }
								break;
							case "sun":	
							    if($e == "sun" && "Sunday" == date('l')){
								$data1 = $this->Handler_db->fetch_time($v['Id']);
								foreach($data1 as $v1){
									if($modified->format('H:i:s') >= $v1["time"] && $modified->format('H:i:s') <= date('H:i:s',strtotime($v1['time'])+60)){
												
												if($meal == 1){
													$message = "Your medicine intake time alert and have to take with meal: MEDICINE NAME = ".$v['medication_name']." DOSAGE = ".$v['dosage'];
													$this->message_generator($phone_number[0]['phone_number'],$message);
												}
												else{
													$message = "Your medicine intake time alert and have to take without meal: MEDICINE NAME = ".$v['medication_name']." DOSAGE = ".$v['dosage'];
													$this->message_generator($phone_number[0]['phone_number'],$message);
												}
									}
								}
							    }
								break;
							
						}
					}
				}
			}
		}

		
	}
}
?>
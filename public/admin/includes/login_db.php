<?php
	
	function hash_password($password) {
		$secure = md5(SHA1($password));
		return $secure;
	}	

	class login_class {
		protected $db;
		function __construct() {
			$this->db = new mysqli(LOGIN_DB_HOST,LOGIN_DB_USER,LOGIN_DB_PASS,LOGIN_DB_NAME);
			/*if(mysqli_connect_errno()) {
				echo 'Error: Could not connect to the database';
				exit;
			}*/
		}

		function clean($array) {
			foreach($array as &$element) {
				$element = $this->db->real_escape_string($element);			
			}
			return  $array;
		}
		
		function register($redirect) {
			$table_name = 'users';

			if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
				
				$values = $this->clean($_POST);
				//$values = $_POST;

				$username = $values['username'];
				$fname = $values['fname'];
				$lname = $values['lname'];
				$sex = $values['sex'];
				$date_dob = $values['date_dob'];
				$month_dob = $values['month_dob'];
				$year_dob = $values['year_dob'];
				$father = $values['father'];
				$mother = $values['mother'];
				$contact_number = $values['contact_number'];
				$address_1 = $values['address_1'];
				$address_2 = $values['address_2'];
				$address_3 = $values['address_3'];
				$category = $values['category'];
				$department = $values['department'];
				$programme = $values['programme'];
				$batch = $values['batch'];
				$semester = $values['semester'];
				$password = $values['password'];
				$regdate = $values['date'];
				
				//echo $username." ".$name." ".$password." ".$regdate."here<br />";

				//users is the table name
				$query = "select * from $table_name
							where username = '".$username."'";
				$result = $this->db->query($query);
				if($result) {
					$num_results = $result->num_rows;
					if($num_results > 0) {
						die("This Username already exists.");
					}
					if(!ctype_alnum($username)) {
						die("Username can only contain numbers and alphabetical characters.");
					}
					if(strlen($username)>20) {
						die("Username cannot contain more than 20 characters.");
					}
				}
				$password = hash_password($password);
				$query = "insert into $table_name
							values ( '".$username."', '".$fname."', '".$lname."', '".$sex."', '".
									$date_dob."', '".$month_dob."', '".$year_dob."', '".$father."', '".
									$mother."', '".$contact_number."', '".$address_1."', '".$address_2."', '".$address_3."', '".$category."', '".
									$department."', '".$programme."', '".$batch."', '".
									$semester."', '".$password."', '".$regdate."')";
				
				$result = $this->db->query($query);
	
				if($result) {
					//$url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
					//$redirect = str_replace('pages/register.php', $redirect, $url);
					$url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];
					$redirect = str_replace('pages/register.php', $redirect, $url);
					header("Location: $redirect?register=success");
					exit;
				}
				else {
					die("Unable to register.");
				}
			}
		}
		function insert_course($redirect) {
			$table_name = 'course';
			if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
				$values = $this->clean($_POST);
				//$values = $_POST;
				$course_id = isset($values['course_id'])?$values['course_id']:"";
				$instructor_id = isset($values['instructor_id'])?$values['instructor_id']:"";
				$course_name = isset($values['course_name'])?$values['course_name']:"";
				$course_details = isset($values['course_details'])?$values['course_details']:"";
				$department_id = isset($values['department_id'])?$values['department_id']:"";
				$college_id = isset($values['college_id'])?$values['college_id']:"";
				//Course is the table name
				$query = "select * from $table_name
							where course_id = '".$course_id."'";
				$result = $this->db->query($query);
				if($result) {
					$num_results = $result->num_rows;
					if($num_results > 0) {
						die("This Course already exists.");
					}
				}
				$password = hash_password($password);
				$query = "insert into $table_name
							values ( '".$course_id."', '".$instructor_id."', '".$course_name."', '".$course_details."', '".
									$department_id."', '".$college_id."')";
				$result = $this->db->query($query);
				if($result) {
					$url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];
					$redirect = str_replace('pages/register.php', $redirect, $url);
					header("Location: $redirect?\=success");
					exit;
				}
				else {
					die("Unable to create course.");
				}
			}
		}
		function update_course($redirect) {
			$table_name = 'course';
			if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
				$values = $this->clean($_POST);
				//$values = $_POST;
				$course_id = isset($values['course_id'])?$values['course_id']:"";
				$instructor_id = isset($values['instructor_id'])?$values['instructor_id']:"";
				$course_name = isset($values['course_name'])?$values['course_name']:"";
				$course_details = isset($values['course_details'])?$values['course_details']:"";
				$department_id = isset($values['department_id'])?$values['department_id']:"";
				$college_id = isset($values['college_id'])?$values['college_id']:"";
				$query = "update $table_name set instructor_id='".$instructor_id."',course_name= '".$course_name."',course_details='".$course_details."', department_id='". $department_id."', college_id='".$college_id."' where course_id='".$course_id."'";
				$result = $this->db->query($query);
				if($result) {
					$url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];
					$redirecturl = str_replace('pages/course_edit.php', $redirect, $url);
					header("Location: $redirecturl?update=success");
					exit;
				}
				else {
					die("Unable to edit course.");
				}
			}
		}
		function insert_department($redirect) {
			$table_name = 'department';
			if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
				$values = $this->clean($_POST);
				//$values = $_POST;
				$name = isset($values['name'])?$values['name']:"";
				$college_id = isset($values['college_id'])?$values['college_id']:"";
				$manager_id = isset($values['manager_id'])?$values['manager_id']:"";
				//Course is the table name
				$query = "select * from $table_name
							where name = '".$name."'";
				$result = $this->db->query($query);
				if($result) {
					$num_results = $result->num_rows;
					if($num_results > 0) {
						die("This Course already exists.");
					}
				}
				$password = hash_password($password);
				$query = "insert into $table_name
							values ( '".$name."', '".$college_id."', '".$manager_id."')";
				$result = $this->db->query($query);
				if($result) {
					$url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];
					$redirect = str_replace('pages/register.php', $redirect, $url);
					header("Location: $redirect?\=success");
					exit;
				}
				else {
					die("Unable to create course.");
				}
			}
		}

		
		function login($redirect) {
			//echo "here";
			$table_name = 'users';
			if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
				$values = $this->clean($_POST);

				$username = $values['username'];
				$password = $values['password'];
			
				$query = "select * from $table_name
					where username = '".$username."'";
				$results = $this->db->query($query);
				if(!$results) {
					return 'invalid';				
				}
				$num_results = $results->num_rows;
				if($num_results == 0) {
					return 'invalid';
				}
				else if($num_results > 1) {
					die("Error while logging in.");
				}
			
				$row = $results->fetch_assoc();

				$nonce = md5('very secure'.$row['username'].$row['regdate'].NONCE_SALT);

				$check_pass = hash_password($password, $nonce);

				if($check_pass == $row['password']) {
					$cookie_password = hash_password($check_pass);
					if(isset($_POST['remember'])) {         //logs in users for 30 days
						setcookie('College_enrol_sys[username]', $username, time()+60*60*24*30, '/', '', '', true);
						setcookie('College_enrol_sys[password]', $cookie_password, time()+60*60*24*30, '/', '', '', true);
					}
					else {
						setcookie('College_enrol_sys[username]', $username, 0, '/', '', '', true);
						setcookie('College_enrol_sys[password]', $cookie_password, 0, '/', '', '', true);
					}
					$url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];
					$redirect = str_replace('pages/login.php', $redirect, $url);
					header("Location: $redirect");
					exit;
				}
				else {
					return 'invalid';
				}
			}
			else {
				return 'empty';
			}
		}

		function logout() {
			$roll_out = setcookie('College_enrol_sys[username]', '', time()-3600,'/','','',true);
			$pass_out = setcookie('College_enrol_sys[password]', '', time()-3600, '/', '', '', true);

			unset($_COOKIE['College_enrol_sys']);   //very important

			if($roll_out == true && $pass_out == true) {
				return true;
			}
			else {
				return false;
			}
		}

		function redirect_login($current) {
			$url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];
			$redirect = str_replace($current, 'pages/login.php', $url);
			header("Location: $redirect?msg=login");
			exit;
		}

		function check_login() {
			if(isset($_COOKIE['College_enrol_sys'])) {
				$cookie = $_COOKIE['College_enrol_sys'];
				if(isset($cookie['username']) && isset($cookie['password'])) {
					$table_name = 'users';
					$username = $cookie['username'];
					$password = $cookie['password'];
				
					$query = "select * from $table_name
	        	            where username = '".$username."'";
        	        
					$results = $this->db->query($query);
					if(!$results) {
						return false;				
					}
					$num_results = $results->num_rows;
					if($num_results == 0) {
						die("Username doesn't exist.");
					}
                			else if($num_results > 1) {
						die("Error while logging in.");
					}

					$row = $results->fetch_assoc();
					$check_password = hash_password($row['password']);
					if($password == $check_password) {
						return true;
					}
					else {
						return false;
					}
				}
				else {
					return false;
				}
			}
			else {
				return false;
			}
		}
		function get_row($value,$key,$table_name) {
			$query = "select * from $table_name where $key = $value";
			$results = $this->db->query($query);
			$row = $results->fetch_assoc();
			return $row;
		}

		function give_row() {
			$cookie = $_COOKIE['College_enrol_sys'];
			$table_name = 'users';
			$username = $cookie['username'];
			$password = $cookie['password'];
			
			$query = "select * from $table_name
	                    where username = '".$username."'";
                
			$results = $this->db->query($query);
			$row = $results->fetch_assoc();
			return $row;
		}

		function give_courses() {
			$course_table = "course";
			$allocated_table = "course_allotted";
			$instructor_table = "instructor";
			
			$row = $this->give_row();
			$semester = $row['semester'];
			$department = $row['department'];
			$programme = $row['programme'];

			$query = "select $course_table.course_id, $course_table.course_name, $instructor_table.instructor_name, $course_table.course_details
					from $allocated_table natural join $course_table natural join $instructor_table
					where $allocated_table.programme = '".$programme."' and $allocated_table.semester = '".$semester."' and $allocated_table.department = '".$department."'";
			$results = $this->db->query($query);
			return $results;
		}
		function getDepartments() {
			$query = "SELECT * FROM `department`";
			$results = $this->db->query($query);
			return $results;
		}
		function getInstructors() {
			$query = "SELECT * FROM `instructor`";
			$results = $this->db->query($query);
			return $results;
		}
		function getColleges() {
			$query = "SELECT college_id,name,prefix FROM `college`";
			$results = $this->db->query($query);
			return $results;
		}
		function getUsers() {
			$query = "SELECT id,CONCAT(fname,\" \",lname) as name,username,email FROM `users`";
			$results = $this->db->query($query);
			return $results;
		}

		function give_instructors() {
			$course_table = "course";
			$allocated_table = "course_allotted";
			$instructor_table = "instructor";
			
			$row = $this->give_row();
			$semester = $row['semester'];
			$department = $row['department_id'];
			$programme = $row['programme'];

			$query = "select distinct $instructor_table.instructor_name, $instructor_table.contact_email, $instructor_table.profile_link
					from $instructor_table natural join $course_table";
			$results = $this->db->query($query);
			return $results;
		}

		function give_all_courses() {
			$course_table = "course";
			$instructor_table = "instructor";

			$query = "select $course_table.course_id, $course_table.course_name, $instructor_table.instructor_name, $course_table.course_details, department.name
					from $course_table inner join department on $course_table.department_id=department.id natural join $instructor_table";
			$results = $this->db->query($query);
			return $results;
		}
		function give_all_departments() {
			$departments_table = "department";
			$college_table = "college";

			$query = "select $departments_table.id, $departments_table.name, $college_table.name as college_name,CONCAT(users.fname,\" \",users.lname)
					from $departments_table inner join users on users.id=$departments_table.manager_id  inner join college on college.college_id=department.college_id";
			$results = $this->db->query($query);
			return $results;
		}

		function give_all_instructors() {
			$course_table = "course";
			$allocated_table = "course_allotted";
			$instructor_table = "instructor";

			$query = "select distinct $instructor_table.instructor_name, $instructor_table.contact_email, $instructor_table.profile_link
					from $allocated_table natural join $course_table natural join $instructor_table";
			$results = $this->db->query($query);
			return $results;
		}
		function update_personal($username) {
			$table_name = "users";
			if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
				$values = $this->clean($_POST);
				
				$fname = $values['fname'];
				$lname = $values['lname'];
				$sex = $values['sex'];
				$date_dob = $values['date_dob'];
				$month_dob = $values['month_dob'];
				$year_dob = $values['year_dob'];
				$father = $values['father'];
				$mother = $values['mother'];
				$contact_number = $values['contact_number'];
				$address_1 = $values['address_1'];
				$address_2 = $values['address_2'];
				$address_3 = $values['address_3'];
				$category = $values['category'];
				$department = $values['department'];
				$programme = $values['programme'];
				$batch = $values['batch'];
				$semester = $values['semester'];
				
				$query = "UPDATE $table_name SET fname = '".$fname."', lname = '".$lname."', sex = '".$sex."', date_dob = '".$date_dob."', month_dob= '".$month_dob."', year_dob = '".$year_dob."', father='".$father."', mother='".$mother."', contact_number='".$contact_number."', address_1='".$address_1."', address_2='".$address_2."', address_3='".$address_3."', category='".$category."', department='".$department."', programme='".$programme."', batch='".$batch."', semester='".$semester."' WHERE username = '".$username."'";
				$result = $this->db->query($query);
				if ($result) {
					$url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];
					$redirect = str_replace('pages/edit_profile.php', 'pages/profile.php', $url);
					header("Location: $redirect?update=success");
					exit;
				} else {
					die("failure");
				}
			}
		}

		function change_password() {
			$table_name = "users";
			if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {


				$row = $this->give_row();
				
				$values = $this->clean($_POST);

				$current_password = $values['current_password'];
				$new_password = $values['new_password'];
				$confirm_password = $values['confirm_password'];
				$regdate = $values['date'];
				$current_password = hash_password($current_password);

				if($current_password != $row['password']) {
					return 'invalid';
				}
				if($new_password != $confirm_password) {
					return 'match_error';
				}
				$new_password = hash_password($new_password);
				
				$query = "UPDATE $table_name SET password = '".$new_password."', regdate = '".$regdate."' where username = '".$row['username']."'";
				$result = $this->db->query($query);
				if($result) {
					$url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];
					$redirect = str_replace('pages/change_password.php', 'pages/login.php', $url);
					header("Location: $redirect?action=change_password");
					exit;
				} else {
					die("failure");
				}
			} else {
				return "no_data";
			}
		}
				
	}

	//Instantiating the class
	$obj = new login_class;
?>

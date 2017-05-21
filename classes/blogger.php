<?php
	class Blogger
	{
		private $_username;
		private $_email;
		private $_password;
		private $_portrait;
		private $_bio;
		private $_blog_count;
		
		public function __construct($username, $email, $password) {
			$this->_username = $username;
			$this->_email = $email;
			$this->_password = $password;
		}
		
		public function setUsername($username) {
			$this->_username = $username;
		}
		
		public function setEmail($email) {
			$this->_email = $email;
		}
		
		public function setPassword($password) {
			$this->_password = $password;
		}
		
		public function setPortrait($portrait) {
			$this->_portrait = $portrait;
		}
		
		public function setBio($bio) {
			$this->_bio = $bio;
		}
		
		public function setBlogCount($count) {
			$this->setBlogCount = $count;
		}
		
		public function getUsername() {
			return $this->_username;
		}
		
		public function getEmail() {
			return $this->_email;
		}
		
		public function getPassword() {
			return $this->_password;
		}
		
		public function getPortrait() {
			return $this->_portrait;
		}
		
		public function getBio() {
			return $this->_bio;
		}
		
		public function getBlogCount() {
			return $this->_blog_count;
		}
		
		public static function getBloggerInstance($row) {
			$blogger = new Blogger($row['username'],$row['email'],$row['password']);
			$blogger->setBio($row['bio']);
			$blogger->setPortrait($row['portrait']);
			return $blogger;
		}
	}
?>
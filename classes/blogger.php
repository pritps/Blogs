<?
	/**
	 * The Blogger class represents a member of the blogging website.
	 *
	 * The Blogger class represents a Blogger with its username,
	 * password, email, portrait, biography, and a blog count.
	 * 
	 * @author Pritpal Singh <psingh50@mail.greenriver.edu>
	 * @copyright 2017
	*/
	class Blogger
	{
		/**
		 *@var int The blogger's id 
		*/
		private $_id;
		
		/**
		 *@var string The blogger's login username
		*/
		private $_username;
		
		/**
		 *@var string The blogger's email
		*/
		private $_email;
		
		/**
		 *@var string The blogger's login password
		*/
		private $_password;
		
		/**
		 *@var string The blogger's portrait name
		*/
		private $_portrait = "generic-user.png";
		
		/**
		 *@var string The blogger's biography
		*/
		private $_bio;
		
		/**
		 *@var int The number of blogs this blogger has.
		*/
		private $_blog_count;
		
		/**
		 * Instantiate the Blogger object with its username, email,and password.
		 * @param string $username login username of the blogger
		 * @param string $email email of the blogger
		 * @param string $password login password of the blogger
		 * @return void
		*/
		public function __construct($username, $email, $password)
		{
			$this->_username = $username;
			$this->_email = $email;
			$this->_password = $password;
		}
		
		/**
		 * Defines the Id of the blogger
		 * 
		 * @param int $id Id of the blogger.
		 * @return void
		*/
		public function setId($id)
		{
			$this->_id = $id;
		}
		
		/**
		 * Defines the username of the blogger
		 * 
		 * @param string $username login username of the blogger.
		 * @return void
		*/
		public function setUsername($username)
		{
			$this->_username = $username;
		}
		
		/**
		 * Defines the email of the blogger
		 * 
		 * @param string $email email address of the blogger.
		 * @return void
		*/
		public function setEmail($email)
		{
			$this->_email = $email;
		}
		
		/**
		 * Defines the password of the blogger
		 * 
		 * @param string $password login password of the blogger.
		 * @return void
		*/
		public function setPassword($password)
		{
			$this->_password = $password;
		}
		
		/**
		 * Defines the name of the portrait of the blogger if one uploaded, or default otherwise
		 * 
		 * @param string $portrait uploded portrait of the blogger or default
		 * @return void
		*/
		public function setPortrait($portrait="generic-user.png")
		{
			$this->_portrait = $portrait;
		}
		
		/**
		 * Defines the biography of the blogger
		 * 
		 * @param string $bio biography of the blogger.
		 * @return void
		*/
		public function setBio($bio)
		{
			$this->_bio = $bio;
		}
		
		/**
		 * Defines the number of blog posts of the blogger
		 * 
		 * @param int $count number of blogs of the blogger.
		 * @return void
		*/
		public function setBlogCount($count)
		{
			$this->_blog_count = $count;
		}
		
		/**
		 * Returns the blogger's username
		 * @return string The blogger's login username
		*/
		public function getUsername()
		{
			return $this->_username;
		}
		
		/**
		 * Returns the blogger's email
		 * @return string The blogger's email
		*/
		public function getEmail()
		{
			return $this->_email;
		}
		
		/**
		 * Returns the blogger's login password
		 * @return string The blogger's password
		*/
		public function getPassword()
		{
			return $this->_password;
		}
		
		/**
		 * Returns the blogger's uploded portrait name or default 
		 * @return string The blogger's portrait name
		*/
		public function getPortrait()
		{
			return $this->_portrait;
		}
		
		/**
		 * Returns the blogger's bio
		 * @return string The blogger's bio
		*/
		public function getBio()
		{
			return $this->_bio;
		}
		
		/**
		 * Returns the blogger's blog count
		 * @return int The blogger's blog count
		*/
		public function getBlogCount()
		{
			return $this->_blog_count;
		}
		
		/**
		 * Returns the blogger's id
		 * @return int The blogger's id
		*/
		public function getId()
		{
			return $this->_id;
		}
		
		/**
		 * Returns a Blogger instance given a database row represented by associative array
		 * @param $row[] an associative array representing a database row of blogger
		 * @return Blogger The blogger instance
		*/
		public static function getBloggerInstance($row)
		{
			$blogger = new Blogger($row['username'],$row['email'],$row['password']);
			$blogger->setId($row['id']);
			$blogger->setBio($row['bio']);
			$blogger->setPortrait($row['portrait']);
			return $blogger;
		}
	}
?>
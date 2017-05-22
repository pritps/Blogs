<?php
    /**
     * Provides CRUD access to blogger table for the Blogging website database
     *
     * PHP Version 5
     *
     * @author Pritpal Singh <psingh50@mail.greenriver.edu>
     * @version 1.0
     */
    class BloggerDAO
    {
        private $_pdo;
        
        public function __construct()
        {
            //Require configuration file
            require_once '/home/psingh50/blogging_db_config.php';
            
            try {
                //Establish database connection
                $this->_pdo = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
                
                //Keep the connection open for reuse to improve performance
                $this->_pdo->setAttribute( PDO::ATTR_PERSISTENT, true);
                
                //Throw an exception whenever a database error occurs
                $this->_pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch (PDOException $e) {
                die( "Error!: " . $e->getMessage());
            }
        }
        
        /**
         * Create a new Blogger, member of the Blogging website
         *
         * @access public
         * @param Blogger
         *
         * @return the id of the blogger inserted or sequence value
         */
        public function createBlogger(Blogger $blogger)
        {
            $insert = 'INSERT INTO blogger (username, password, email, bio, portrait)
										VALUES (:username, :pwd, :email, :bio, :portrait)';
										
            $statement = $this->_pdo->prepare($insert);
			
            $statement->bindValue(':username', $blogger->getUsername(), PDO::PARAM_STR);
            $statement->bindValue(':pwd', $blogger->getPassword(), PDO::PARAM_STR);
            $statement->bindValue(':email', $blogger->getEmail(), PDO::PARAM_STR);
			$statement->bindValue(':bio', $blogger->getBio(), PDO::PARAM_STR);
			$statement->bindValue(':portrait', $blogger->getPortrait(), PDO::PARAM_STR);
            $statement->execute();
            
            //Return ID of inserted row
            return $this->_pdo->lastInsertId();
        }
		
         
        /**
         * Returns a Blogger that has the given id.
         *
         * @access public
         * @param int $id the id of the Blogger
         *
         * @return 
         */
        public function getBloggerById($id)
        {
            $select = "SELECT id, username, password, email, bio, portrait
						FROM blogger WHERE id=:bloggerId";
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':bloggerId', $id, PDO::PARAM_INT);
            $statement->execute();
             
            $row = $statement->fetch(PDO::FETCH_ASSOC);
			
			if($row) {
				return Blogger::getBloggerInstance($row);
			} else {
				return NULL;
			}
        }
		
		/**
         * Returns a Blogger that has the given username and password.
         *
         * @access public
         * @param string $username username of the user trying to login
         * @param string $pwd password of the user trying to login
         * @return Blogger instance if valid user, and NULL otherwise
         */
        public function validateLoginUser($username, $pwd)
        {
            $select = "SELECT id, username, password, email, bio, portrait
						FROM blogger WHERE username = :username and password = :password";
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':username', $username, PDO::PARAM_STR);
            $statement->bindValue(':password', $pwd, PDO::PARAM_STR);
			$statement->execute();
             
            $row = $statement->fetch(PDO::FETCH_ASSOC);
			
			if($row) {
				return Blogger::getBloggerInstance($row);
			} else {
				return NULL;
			}
        }
		
		/**
         * Return all bloggers registered for the Blogging website
         *
         * @return 
         */
        public function getAllBloggers()
        {
             $select = "SELECT * FROM blogger";
			 $selectBlogCount = 'SELECT count(*) FROM blog_post where blogger_id = :bloggerId';
             
            $statement = $this->_pdo->prepare($select);
            $statement->execute();
             
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
			
			$statement = $this->_pdo->prepare($selectBlogCount);
			
			$bloggers = array();
			foreach($rows as $row) {
				$blogger = Blogger::getBloggerInstance($row);
				$statement->bindValue(':bloggerId', $blogger->getId(), PDO::PARAM_INT);
				$statement->execute();
				$count = $statement->fetchColumn();
				$blogger->setBlogCount($count);
				$bloggers[] = $blogger;				
			}           
			
			return $bloggers;
        }
        
    }
	?>
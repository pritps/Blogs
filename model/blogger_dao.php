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
        
        function __construct()
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
        function createBlogger(Blogger $blogger)
        {
            $insert = 'INSERT INTO blogger (username, password, email, bio, excerpt, portrait)
										VALUES (:username, :pwd, :email, :bio, :excerpt, :portrait)';
										
            $statement = $this->_pdo->prepare($insert);
			
            $statement->bindValue(':username', $blogger->getUsername(), PDO::PARAM_STR);
            $statement->bindValue(':pwd', $blogger->getPassword(), PDO::PARAM_STR);
            $statement->bindValue(':email', $blogger->getEmail(), PDO::PARAM_STR);
			$statement->bindValue(':bio', $blogger->getBio(), PDO::PARAM_STR);       
			$statement->bindValue(':excerpt', $blogger->getExcerpt(), PDO::PARAM_STR);
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
        function getBlogger($id)
        {
            $select = "SELECT id, username, password, email, bio, excerpt, portrait
						FROM blogger WHERE id=:bloggerId";
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':bloggerId', $id, PDO::PARAM_INT);
            $statement->execute();
             
            return $statement->fetch(PDO::FETCH_ASSOC);
        }
		
		/**
         * Return all bloggers registered for the Blogging website
         *
         * @return 
         */
        function getAllBloggers()
        {
             $select = "SELECT * FROM blogger";
             
            $statement = $this->_pdo->prepare($select);
            $statement->execute();
             
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        
    }
	?>
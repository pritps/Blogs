<?php
    /**
     * Provides CRUD access to blog_post table for the Blogging website database
     *
     * PHP Version 5
     *
     * @author Pritpal Singh <psingh50@mail.greenriver.edu>
     * @version 1.0
     */
    class BlogPostDAO
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
                $this->_pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            }
            catch (PDOException $e) {
                die( "Error!: " . $e->getMessage());
            }
        }
        
        /**
         * Create a new blog post for a blogger
         *
         * @access public
         * @param BlogPost $blogPost the BlogPost object to create
         *
         * @return the id of the blog post inserted or sequence value
         */
        function createBlogPost(BlogPost $blogPost)
        {
            $insert = 'INSERT INTO blog_post (blogger_id, blog_content, title, created_date)
										VALUES (:bloggerId, :blogContent, :title, :createdDate)';
										
            $statement = $this->_pdo->prepare($insert);
			
            $statement->bindValue(':bloggerId', $blogPost->getBloggerId(), PDO::PARAM_INT);
            $statement->bindValue(':blogContent', $blogPost->getBlogContent(), PDO::PARAM_STR);
            $statement->bindValue(':title', $blogPost->getTitle(), PDO::PARAM_STR);
			$statement->bindValue(':createdDate', $blogPost->getCreatedDate(), PDO::PARAM_STR);       
			
            $statement->execute();
            
            //Return ID of inserted row
            return $this->_pdo->lastInsertId();
        }
		
		/**
         * Update a blog post
         *
         * @access public
         * @param BlogPost $blogPost the BlogPost object to update
         */
        function updateBlogPost(BlogPost $blogPost)
        {
            $update = 'UPDATE blog_post
				SET blog_content=:blogContent, title=:title
				WHERE id=:blogId';
										
            $statement = $this->_pdo->prepare($update);
			
            $statement->bindValue(':blogContent', $blogPost->getBlogContent(), PDO::PARAM_STR);
            $statement->bindValue(':title', $blogPost->getTitle(), PDO::PARAM_STR);
			$statement->bindValue(':blogId', $blogPost->getId(), PDO::PARAM_STR);       
			
            $statement->execute();
        }
         
        /**
         * Returns a BlogPost that has the given id.
         *
         * @access public
         * @param int $id the id of the BlogPost
         *
         * @return 
         */
        function getBlogPost($id)
        {
            $select = "SELECT id, blogger_id, title, blog_content, created_date
						FROM blog_post WHERE id=:blogId";
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':blogId', $id, PDO::PARAM_INT);
            $statement->execute();
             
            return $statement->fetch(PDO::FETCH_ASSOC);
        }
		
		/**
         * Return all BlogPost(s) for a given blogger id.
         *
         * @access public
         * @param int $id the id of the Blogger
         *
         * @return 
         */
        function getBlogPosts($id)
        {
            $select = "SELECT id, blogger_id, title, blog_content, created_date
						FROM blog_post WHERE id=:bloggerId";
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':bloggerId', $id, PDO::PARAM_INT);
            $statement->execute();
             
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        
    }
	?>
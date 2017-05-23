<?php
	/**
	 * The BlogPost class represents a blog post of Blogger in the blogging website.
	 *
	 * The BlogPost class represents a blog post with its id,
	 * the blogger, title, it's content, excerpt, and a created date.
	 * 
	 * @author Pritpal Singh <psingh50@mail.greenriver.edu>
	 * @copyright 2017
	*/
	class BlogPost
	{
		/**
		 *@var int The blog post id 
		*/
		private $_id;
		
		/**
		 *@var int The blogger's id who created this blog post
		*/
		private $_blogger_id;
		
		/**
		 *@var string The title of the blog
		*/
		private $_title;
		
		/**
		 *@var string The content of the blog 
		*/
		private $_blog_content;
		
		/**
		 *@var int The number of words in the blog post
		*/
		private $_word_count;
		
		/**
		 *@var datetime The date this post was created 
		*/
		private $_created_date;
		
		/**
		 *@var string The excerpt
		*/
		private $_excerpt;
		
		/**
		 * Instantiate the BlogPost object with its blogger id, title,and content.
		 * @param string $bloggerId id of the blogger who created this blog post
		 * @param string $title title of this blog post
		 * @param string $blogContent content of this blog post
		 * @return void
		*/
		public function __construct($bloggerId, $title, $blogContent)
		{
			$this->_blogger_id = $bloggerId;
			$this->_title = $title;
			$this->_blog_content = $blogContent;
		}
		
		/**
		 * Defines the Id of this BlogPost
		 * 
		 * @param int $id Id of the blog post.
		 * @return void
		*/
		public function setId($id)
		{
			$this->_id = $id;
		}
		
		/**
		 * Defines the Id of the blogger who created this blog post
		 * 
		 * @param int $id Id of the blogger.
		 * @return void
		*/
		public function setBloggerId($bloggerId)
		{
			$this->_blogger_id = $bloggerId;
		}
		
		/**
		 * Defines the title of this blog post
		 * 
		 * @param string $title title of the blog post
		 * @return void
		*/
		public function setTitle($title)
		{
			$this->_title = $title;
		}
		
		/**
		 * Defines the content of this blog post
		 * 
		 * @param string $blogContent content of the blog post
		 * @return void
		*/
		public function setBlogContent($blogContent)
		{
			$this->_blog_content = $blogContent;
		}
		
		/**
		 * Defines the number of words this blog post has.
		 * 
		 * @param int $count number of words of the blog post content
		 * @return void
		*/
		public function setWordCount($count)
		{
			$this->_word_count = $count;
		}
		
		/**
		 * Defines the date this blog post was created
		 * 
		 * @param datetime $date created date of the blog post
		 * @return void
		*/
		public function setCreatedDate($date)
		{
			$this->_created_date = $date;
		}
		
		/**
		 * Defines the excerpt of this blog post
		 * 
		 * @param string $excerpt excerpt of the blog post
		 * @return void
		*/
		public function setExcerpt($excerpt)
		{
			$this->setExcerpt = $excerpt;
		}
		
		/**
		 * Returns the id of the blog post
		 * @return int The blog post id
		*/
		public function getId()
		{
			return $this->_id;
		}
		
		/**
		 * Returns the id of the blogger who created this blog post
		 * @return int The blogger's id
		*/
		public function getBloggerId()
		{
			return $this->_blogger_id;
		}
		
		/**
		 * Returns the title of the blog psot
		 * @return string The title of the blog post
		*/
		public function getTitle()
		{
			return $this->_title;
		}
		
		/**
		 * Returns the content of the blog post
		 * @return string The content of the blog post
		*/
		public function getBlogContent()
		{
			return $this->_blog_content;
		}
		
		/**
		 * Returns the number of words in the blog post content
		 * @return int The word count of the blog post
		*/
		public function getWordCount()
		{
			return str_word_count($this->_blog_content);
		}
		
		/**
		 * Returns the created date of the blog post
		 * @return string the date this blog post was created.
		*/
		public function getCreatedDate()
		{
			return date('m/d/Y', strtotime($this->_created_date));
		}
		
		/**
		 * Returns the excerpt of the blog post
		 * @return string The excerpt of the blog post
		*/
		public function getExcerpt()
		{
			return $this->_excerpt;$this->_created_date;
		}
		
		/**
		 * Returns a BlogPost instance given a database row represented by associative array
		 * @param $row[] an associative array representing a database row of BlogPost
		 * @return BlogPost The blog post instance
		*/
		public static function getBlogPostInstance($row)
		{
			$blogPost = new BlogPost($row['blogger_id'],$row['title'],$row['blog_content']);
			$blogPost->setId($row['id']);
			$blogPost->setCreatedDate($row['created_date']);
			return $blogPost;
		}
		
	}
?>
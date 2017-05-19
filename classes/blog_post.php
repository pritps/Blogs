<?php
	class BlogPost
	{
		private $_id;
		private $_blogger_id;
		private $_title;
		private $_blog_content;
		private $_word_count;
		private $_created_date;
		
		public function __construct($bloggerId, $title, $blogContent) {
			$this->_blogger_id = $bloggerId;
			$this->_title = $title;
			$this->_blog_content = $blogContent;
		}
		
		public function setId($id) {
			$this->_id = $id;
		}
		
		public function setBloggerId($bloggerId) {
			$this->_blogger_id = $bloggerId;
		}
		
		public function setTitle($title) {
			$this->_title = $title;
		}
		
		public function setBlogContent($blogContent) {
			$this->_blog_content = $blogContent;
		}
		
		public function setWordCount($count) {
			$this->_word_count = $count;
		}
		
		public function setCreatedDate($date) {
			$this->_created_date = $date;
		}
		
		public function getId($id) {
			return $this->_id;
		}
		
		public function getBloggerId() {
			return $this->_blogger_id;
		}
		
		public function getTitle() {
			return $this->_title;
		}
		
		public function getBlogContent() {
			return $this->_blog_content;
		}
		
		public function getWordCount() {
			return str_word_count($this->_blog_content);
		}
		
		public function getCreatedDate() {
			return $this->_created_date;
		}
		
	}
?>
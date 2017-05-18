<?php
	class BlogPost
	{
		private $_title;
		private $_blog_entry;
		private $_word_count;
		private $_created_date;
		
		public function __construct($title, $blogEntry) {
			$this->_title = $title;
		}
		
		public function setTitle($title) {
			$this->_title = $title;
		}
		
		public function setBlogEntry($blogEntry) {
			$this->_blog_entry = $blogEntry;
		}
		
		public function setWordCount($count) {
			$this->_word_count = $count;
		}
		
		public function setCreatedDate($date) {
			$this->_created_date = $date;
		}
		
		public function getTitle() {
			return $this->_title;
		}
		
		public function getBlogEntry() {
			return $this->_blog_entry;
		}
		
		public function getWordCount() {
			return 10;
		}
		
		public function getCreatedDate() {
			return $this->_created_date''
		}
		
	}
?>
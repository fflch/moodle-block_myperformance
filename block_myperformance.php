<?php

class block_myperformance extends block_base {
	public function init () {
		$this->title = 'my performance';
	}
	
	public function get_content () {	
		$this->content = new stdClass;
		$this->content->text = "Acesse a área de desempenho dos alunos";
		
		return $this->content;
		
	}
}


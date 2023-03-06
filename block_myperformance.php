<?php

class block_myperformance extends block_base {
	public function init () {
		$this->title = 'Desempenho dos Estudantes';
	}
	
	public function get_content () {	
		$this->content = new stdClass;
		$this->content->text =
		"Acesse a área de desempenho dos alunos";
		
		$url = new moodle_url('/blocks/myperformance/view.php');
		$this->content->text .= html_writer::link($url, ' Clique aqui!');

		return $this->content;
		
	}
}
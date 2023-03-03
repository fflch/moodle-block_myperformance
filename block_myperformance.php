<?php

class block_desempenho extends block_base {
	public function init () {
		$this->title = get_string('Desempenho', 'Desempenho');
	}
	
	public function get_content () {	
		$this->content = new stdClass;
		$this->content->text = 
		"Acesse a área de desempenho dos alunos";
		
		$url = new moodle_url('/blocks/desempenho/view.php');
		$this->content->text .= html_writer::link($url, ' Clique aqui!');

		return $this->content;
		
	}
}


<?php
interface Command {
	function onCommand($name, $args);
}

class CommandChain {
	private $commands = array();

	public function addCommand( $cmd ) {
		$this->commands[] = $cmd;
	}

	public function runCommand ( $name, $args ) {
		foreach ( $this->commands as $cmd ) {
			if ( $cmd->onCommand($name, $args) ) {
				return ;
			}
		}
	}
}
?>
<?php
class WeightWords_Filter {
	private $filters;
	private $data;
	private $tokens;
	private $tokensEvaluated = array();
	private $tokensWeight = array();
	private $numTokens = 5;
	
	public function __construct() {
		$this->filters->stopWords = new StopWords_Filter(false);
		$this->filters->stemmer = new Stemmer_Filter();
	}
	
	public function setData($data) {
		if ( !empty ( $data['num'] ) ) {
			$this->numTokens = $data['num'];
		}
		
		if ( !empty ( $data['text'] ) ) {
			if ( !is_array($data['text']) ) {
				// we have to tokenize this phrase to an array
				$this->data = $data['text'];
				$this->tokenize();
				$this->processTokens();
				if ( !empty ( $this->tokens ) ) {
					$this->evaluateTokens();
				}
			}
		}
	}
	
	public function returnData() {
		$numTokens = count($this->tokensWeight);
		$totalTokens = ($this->numTokens < $numTokens ) ? $this->numTokens : $numTokens;

		if ( is_array ( $this->tokensWeight ) ) {
			$i = 0; $tmp_arr = array();
			foreach ( $this->tokensWeight as $key=>$value ) {
				array_push($tmp_arr, $key);
				$i++;
				
				if ( $i == $totalTokens ) {
					break;
				}
			}
		}
		
		if ( !empty ( $tmp_arr ) ) {
			return $tmp_arr;
		}
		
		return null;
	}
	
	private function evaluateTokens() {
		if ( !empty ( $this->tokens ) ) {
			foreach ( $this->tokens as $token ) {
				if ( in_array($token, $this->tokensEvaluated ) ) {
					$this->tokensWeight[$token] += 1;
				} else {
					array_push ( $this->tokensEvaluated, $token );
					$this->tokensWeight[$token] = 1;
				}
			}
		}
		
		asort($this->tokensWeight);
	}
	
	private function processTokens() {
		if ( is_array ( $this->tokens ) ) {
			$this->filters->stopWords->setData($this->tokens);
			$this->tokens = $this->filters->stopWords->returnData();
			// now stemming this tokens
			$this->filters->stemmer->setData($this->tokens);
			$this->tokens = $this->filters->stemmer->returnData();
		}
	}
	
	private function tokenize() {
		$tokens = new Token_Iterator($this->data, " ");
		$this->tokens = array();
		foreach ( $tokens as $count => $token ) {
			$token = $this->cleanToken($token);
			if ( !is_numeric($token) ) {
				array_push($this->tokens, $token );
			}
		}
	}
	
	private function cleanToken($token) {
		$token = str_replace(",", "", $token);
		$token = str_replace("'", "", $token);
		$token = str_replace("-", "", $token);
		$token = str_replace(".", "", $token);
		$token = strtolower($token);
		return $token;
	}
}
?>
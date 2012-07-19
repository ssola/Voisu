<?php
	class Benchmarking {
		private $time_init;
		private $time_end;
		private $time_result;
		private $zone;
		private $date;
		private $where;
		
		public function Benchmarking($zone="",$where="") {
			$this->zone = $zone;
			$this->where = $where;
			$this->date = time();
		}
		
		public function startTime() {
			$this->time_init = microtime();
		}
		
		public function endTime() {
			$this->time_end = microtime();
		}
		
		public function timeResult() {
			$this->diff_microtime();
			return $this->time_result;
		}
		
		private function diff_microtime() {
			list($old_usec, $old_sec) = explode(' ',$this->time_init);
			list($new_usec, $new_sec) = explode(' ',$this->time_end);
			$old_mt = ((float)$old_usec + (float)$old_sec);
			$new_mt = ((float)$new_usec + (float)$new_sec);
			$this->time_result = $new_mt - $old_mt;
		}
	}
?>
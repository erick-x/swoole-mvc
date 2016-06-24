<?php

@session_start();
class Onload_Device_Event implements EventInterface {

    public function run() {
        $this->load();
    }

    private function load() {
        load_config('define');
      
        //$_POST && Helper_Lib::strip_string($_POST);
        //$_GET && Helper_Lib::strip_string($_GET);
       //$_REQUEST && Helper_Lib::strip_string($_REQUEST);
      
		$path = APPLICATION_FOLDER.'extends';
		set_include_path(get_include_path() . PATH_SEPARATOR . $path);

    }


}

?>

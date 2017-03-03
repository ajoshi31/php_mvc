<?php

class Bootstrap {

    private $_url = null;
    private $_controller = null;
    private $_controllerPath = 'controllers/';
    private $_modelPath = 'models/';
    private $_errorFile = 'error.php';
    private $_defaultFile = 'index.php';

    /**
     * Starts the Bootstrap
     *
     * @return bool
     */
    public function init(){
        $this->_getUrl();

        //Load the default controller if no url is set
        if (empty($this->_url[0])) {
            $this->_loadDefaultController();
            return false;
        }
        $this->_loadExistingController();
        $this->_callControllerMethod();
    }

    /**
     * Optional set a custom path to the controllers
     * @param $path|string
     */
    public function  setControllerPath($path){
        $this->_controllerPath = trim($path , '/') . '/' ;
    }

    /**
     * Optional set a custom path to the models
     * @param $path|string
     */
    public function setModelPath($path){
        $this->_modelPath = trim($path , '/') . '/' ;
    }

    /**
     * Optional set a custom path to the error file
     * @param $path|string  Use the file name of your controller, eg: index.php
     */
    public function  setErrorFile($file){
        $this->_errorFile = trim($file, '/') ;
    }

    public function  setDefaultFile($file){
        $this->_defaultFile = trim($file, '/') ;
    }

    /**
     * Fetches the $_GET from url
     */
    private function _getUrl(){
        $this->_url = isset($_GET['url']) ? $_GET['url'] : null;
        $this->_url = rtrim($this->_url, '/');
        $this->_url = filter_var($this->_url, FILTER_SANITIZE_URL);
        $this->_url = explode('/', $this->_url);

    }

    /**
     * This loads if there is no $_GET parameter passed
     */
    private  function _loadDefaultController(){

        echo $this->_controllerPath . $this->_defaultFile;
        require $this->_controllerPath . $this->_defaultFile;
        $this->_controller = new Index();
        $this->_controller->index();
    }

    /**
     * Loads an existing url if there is  $_GET parameter passed
     * @return bool
     */
    private  function _loadExistingController(){
        $file = $this->_controllerPath . $this->_url[0] . '.php';
        if (file_exists($file)) {
            require $file;
            $this->_controller = new $this->_url[0];
            $this->_controller->loadModel($this->_url[0], $this->_modelPath);
        } else {
            $this->_error();
            return false;
        }

    }

    /**
     * If a method is passed in the GET url paremter
     *
     *  http://localhost/controller/method/(param)/(param)/(param)
     *  url[0] = Controller
     *  url[1] = Method
     *  url[2] = Param
     *  url[3] = Param
     *  url[4] = Param
     */
    private  function _callControllerMethod(){

        $length = count($this->_url);
        //Make sure the method we are calling exists
        if($length > 1) {
            if(!method_exists($this->_controller, $this->_url[1])) {
                $this->_error();
            }
        }

        //Determine what to load
        switch ($length){

            case 5:
                //Controller->Method(Param1,Param2,Param3)
                $this->_controller->{$this->_url[1]}($this->_url[2],$this->_url[3],$this->_url[4]);
                break;

            case 4:
                //Controller->Method(Param1,Param2)
                $this->_controller->{$this->_url[1]}($this->_url[2],$this->_url[3]);
                break;

            case 3:
                //Controller->Method(Param1)
                $this->_controller->{$this->_url[1]}($this->_url[2]);
                break;

            case 2:
                //Controller->Method()
                $this->_controller->{$this->_url[1]}();
                break;

            default:
                $this->_controller->index();
                break;

        }
    }

    private function _error() {
        require $this->_controllerPath . $this->_errorFile ;
        $this->_controller = new Error();
        $this->_controller->index();
        return false;
    }

}

?>
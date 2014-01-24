<?php

/**
 * Database logger
 * @author Nick Baker
 * @version 1.0
 * @license MIT
 * 
 */
App::uses('ClassRegistry', 'Utility');
App::uses('CakeLogInterface', 'Log');

class DatabaseLog implements CakeLogInterface {

    /**
     * Model name placeholder
     */
    public $model = null;

    /**
     * Model object placeholder
     */
    public $Log = null;

    /**
     * Contruct the model class
     */
    public function __construct($options = array()) {
        $this->model = isset($options['model']) ? $options['model'] : 'DatabaseLog.Log';
        $this->Log = ClassRegistry::init($this->model);
    }

    /**
     * Write the log to database
     *
     * @return boolean Success
     */
    public function write($type, $message) {
        $this->Log->create();
        return (bool) $this->Log->save(array(
                    'type' => $type,
                    'message' => $message
        ));
    }

}

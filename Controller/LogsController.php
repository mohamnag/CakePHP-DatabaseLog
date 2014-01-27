<?php

App::uses('DatabaseLogAppController', 'DatabaseLog.Controller');

class LogsController extends DatabaseLogAppController {

    public $helpers = array('Time');
    public $paginate = array(
        'order' => array('Log.id' => 'DESC'),
        'fields' => array(
            'Log.created',
            'Log.type',
            'Log.message',
            'Log.id'
        )
    );

    public function index($filter = null) {
        if (!empty($this->data)) {
            $filter = $this->data['Log']['filter'];
        }
        $conditions = $this->Log->textSearch($filter);
        if ($type = $this->request->query('type')) {
            $conditions['type'] = $type;
        }

        $this->set('logs', $this->paginate($conditions));
        $this->set('types', $this->Log->getTypes());
        $this->set('filter', $filter);
    }

    public function view($id) {
        $log = $this->Log->read(null, $id);
        if (!$log) {
            $this->Session->setFlash(__('Referenced log could not be found'));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('log', $log);
    }

    public function delete($id) {
        if ($this->Log->delete($id)) {
            $this->Session->setFlash(__('Log deleted'));
        }
        else {
            $this->Session->setFlash(__('Log could not be deleted'));
        }
        
        $this->redirect(array('action' => 'index'));
    }

    public function reset() {
        $this->Log->deleteAll('1 = 1');
        
        $this->redirect(array('action' => 'index'));
    }

    public function removeDuplicates() {
        $this->Log->removeDuplicates();

        $this->Session->setFlash(__('Duplicates have been removed.'));
        $this->redirect(array('action' => 'index'));
    }

}

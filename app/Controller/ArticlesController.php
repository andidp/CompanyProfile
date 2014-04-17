<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 * @property PaginatorComponent $Paginator
 */
class ArticlesController extends AppController {

	public $uses = array('Post');

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$limit = 10;
		$this->Post->recursive = 0;

		$this->paginate = array(
			'conditions' => array(
				'Post.post_type' => 'article'
				),
			'limit'		 => $limit
			);

		$this->set('posts', $this->paginate());
		$this->set('paginationLimit', $limit);
		$this->set('status', $this->Post->status);
		$this->render('../Posts/admin_index');
		
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		$this->set('post', $this->Post->read(null, $id));
		$this->set('status', $this->Post->status);
		$this->render('../Posts/admin_view');
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->request->data[$this->modelClass]['slug'] = $this->Post->createSlug($this->request->data[$this->modelClass]['title']);
			$this->request->data['Post']['post_type'] = 'article';
			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('The article has been saved'), 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The article could not be saved. Please, try again.'), 'error');
			}
		}
        $postType = $this->Post->postType;
        $status = $this->Post->status;
        $this->set(compact('postType', 'status'));
        $this->render('../Posts/admin_add');
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Post->id = $id;

		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {

			$this->request->data['Post']['post_type'] = 'article';

			// Pada saat edit, jika title nya diedit, maka buat slug lagi.
            if ($this->Session->read('title') != $this->request->data[$this->modelClass]['title']) {
                $this->request->data[$this->modelClass]['slug'] = $this->Post->createSlug($this->request->data[$this->modelClass]['title']);
            }

			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('The article has been saved'), 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The article could not be saved. Please, try again.'), 'error');
			}

		} else {
			$this->request->data = $this->Post->read(null, $id);
			$this->Session->write('title', $this->request->data[$this->modelClass]['title']);
		}

		$postType = $this->Post->postType;
        $status = $this->Post->status;
        $referer = $this->referer();
        $this->set(compact('postType', 'status', 'referer'));
        $this->render('../Posts/admin_add');
	}

/**
 * admin_delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		if ($this->Post->delete()) {
			$this->Session->setFlash(__('Article deleted'), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Article was not deleted'), 'error');
		$this->redirect(array('action' => 'index'));
	}
        
    
    /**
 * admin_status method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @param string $status
 * @return void
 */
	public function admin_status($id = null, $status = 1) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		if ($this->Post->saveField('status', $status)) {
            if ($status == 1) {
                $this->Session->setFlash(__('Article was set to publish'), 'success');
			} else {
                $this->Session->setFlash(__('Article was set to draft'), 'error');
            }
            $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Article status was not change'), 'error');
		$this->redirect(array('action' => 'index'));
	}
}

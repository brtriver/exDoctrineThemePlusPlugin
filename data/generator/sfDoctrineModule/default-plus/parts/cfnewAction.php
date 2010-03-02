  public function executeCfnew(sfWebRequest $request)
  {
<?php if (isset($this->params['with_doctrine_route']) && $this->params['with_doctrine_route']): ?>
<?php else: ?>
    $this->forward404Unless($request->isMethod(sfRequest::POST));
<?php endif; ?>
    $this->form = new <?php echo $this->getModelClass().'Form' ?>();

    $this->setTemplate('new');
    $this->cfprocessForm($request, $this->form, '<?php echo $this->getModuleName() ?>', 'create');

  }

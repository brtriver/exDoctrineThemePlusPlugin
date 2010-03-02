  public function executeNew(sfWebRequest $request)
  {
    $this->form = $this->configuration->getForm();
    $this-><?php echo $this->getSingularName() ?> = $this->form->getObject();
    if ($request->isMethod('post')) {
      $key = $this->_getAttributeKey('<?php echo $this->getModuleName() ?>', 'create');
      $params = ($request->hasParameter($this->form->getName()))? $request->getParameter($this->form->getName()) : $this->getUser()->getAttribute($key);
      $this->form->bind($params);
    }
  }

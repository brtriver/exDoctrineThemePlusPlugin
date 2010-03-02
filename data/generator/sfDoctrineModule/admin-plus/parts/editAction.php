  public function executeEdit(sfWebRequest $request)
  {
    $this-><?php echo $this->getSingularName() ?> = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this-><?php echo $this->getSingularName() ?>);
    // method == post => return from confirm
    if ($request->isMethod('post')) {
      $key = $this->_getAttributeKey('<?php echo $this->getModuleName() ?>', 'update');
      $params = ($request->hasParameter($this->form->getName()))? $request->getParameter($this->form->getName()) : $this->getUser()->getAttribute($key);
      $this->form->bind($params);
    }
  }

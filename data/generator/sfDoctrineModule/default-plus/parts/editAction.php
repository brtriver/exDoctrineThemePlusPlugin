  public function executeEdit(sfWebRequest $request)
  {
<?php if (isset($this->params['with_doctrine_route']) && $this->params['with_doctrine_route']): ?>
    $this->form = new <?php echo $this->getModelClass().'Form' ?>($this->getRoute()->getObject());
<?php else: ?>
    $this->forward404Unless($<?php echo $this->getSingularName() ?> = Doctrine::getTable('<?php echo $this->getModelClass() ?>')->find(array(<?php echo $this->getRetrieveByPkParamsForAction(43) ?>)), sprintf('Object <?php echo $this->getSingularName() ?> does not exist (%s).', <?php echo $this->getRetrieveByPkParamsForAction(43) ?>));
    $this->form = new <?php echo $this->getModelClass().'Form' ?>($<?php echo $this->getSingularName() ?>);
<?php endif; ?>
    // method == post => return from confirm
    if ($request->isMethod('post')) {
      $key = $this->_getAttributeKey('<?php echo $this->getModuleName() ?>', 'update');
      $params = ($request->hasParameter($this->form->getName()))? $request->getParameter($this->form->getName()) : $this->getUser()->getAttribute($key);
      $this->form->bind($params);
    }
  }

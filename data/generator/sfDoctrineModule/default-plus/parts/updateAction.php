  public function executeUpdate(sfWebRequest $request)
  {
<?php if (isset($this->params['with_doctrine_route']) && $this->params['with_doctrine_route']): ?>
    $this->form = new <?php echo $this->getModelClass().'Form' ?>($this->getRoute()->getObject());
<?php else: ?>
<?php   if (isset($this->params['with_separated_confirm']) && $this->params['with_separated_confirm']): ?>
    $this->forward404Unless($request->isMethod(sfRequest::PUT));
<?php   else: ?>
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
<?php   endif ?>
    $this->forward404Unless($<?php echo $this->getSingularName() ?> = Doctrine::getTable('<?php echo $this->getModelClass() ?>')->find(array(<?php echo $this->getRetrieveByPkParamsForAction(43) ?>)), sprintf('Object <?php echo $this->getSingularName() ?> does not exist (%s).', <?php echo $this->getRetrieveByPkParamsForAction(43) ?>));
    $this->form = new <?php echo $this->getModelClass().'Form' ?>($<?php echo $this->getSingularName() ?>);
<?php endif; ?>

    $this->setTemplate('edit');
    $this->processForm($request, $this->form, '<?php echo $this->getModuleName() ?>', 'update');
  }
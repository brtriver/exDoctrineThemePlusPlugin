  public function executeCreate(sfWebRequest $request)
  {
<?php if (isset($this->params['with_doctrine_route']) && $this->params['with_doctrine_route']): ?>
<?php else: ?>
<?php   if (isset($this->params['with_separated_confirm']) && $this->params['with_separated_confirm']): ?>
    $this->forward404Unless($request->isMethod(sfRequest::PUT));
<?php   else: ?>
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
<?php   endif ?>

<?php endif; ?>
    $this->form = new <?php echo $this->getModelClass().'Form' ?>();

    $this->setTemplate('new');
    $this->processForm($request, $this->form, '<?php echo $this->getModuleName() ?>', 'create');

  }

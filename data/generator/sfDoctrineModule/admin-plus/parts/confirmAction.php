  public function executeConfirm(sfWebRequest $request)
  {
    if ($request->getParameter('id')) {
      $this-><?php echo $this->getSingularName() ?> = $this->getRoute()->getObject();
      $this->form = $this->configuration->getForm($this-><?php echo $this->getSingularName() ?>);
      $action = 'update';
      $template_for_error = "edit";
    } else {
      $this->form = $this->configuration->getForm();
      $this-><?php echo $this->getSingularName() ?> = $this->form->getObject();
      $action = 'create';
      $template_for_error = "new";
    }
    // if has 'confirm' submit, this process is "confirm", otherwise "save(create/update)" process.
    if ($request->hasParameter('confirm')) {
      $this->processFormConfirm($request, $this->form, '<?php echo $this->getModuleName() ?>', $action);
    } else {
      $this->processForm($request, $this->form);
    }
    // for error
    if (!$this->form->isValid()) {
      $this->setTemplate($template_for_error);
    }
  }

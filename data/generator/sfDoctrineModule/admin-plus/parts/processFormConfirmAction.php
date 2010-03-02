  protected function processFormConfirm(sfWebRequest $request, sfForm $form, $module, $action)
  {
    $key = $this->_getAttributeKey($module, $action);
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
        $this->form = sfFormPlus::setSessionAll($form, $request, $this->getUser(), $key);
    }
  }

protected function processForm(sfWebRequest $request, sfForm $form, $module, $action)
  {
    $key = $this->_getAttributeKey($module, $action);
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
       // post => confirm
      if ($request->isMethod('post')) {
        $this->form = sfFormPlus::setSessionAll($form, $request, $this->getUser(), $key);
        return sfView::SUCCESS;
      }
      // put => update
      if ($request->isMethod('put')) {
        $<?php echo $this->getSingularName() ?> = $form->save();

<?php if (isset($this->params['route_prefix']) && $this->params['route_prefix']): ?>
        $this->redirect('@<?php echo $this->getUrlForAction('edit') ?>?<?php echo $this->getPrimaryKeyUrlParams() ?>);
<?php else: ?>
        $this->redirect('<?php echo $this->getModuleName() ?>/edit?<?php echo $this->getPrimaryKeyUrlParams() ?>);
<?php endif; ?>
      }
    }
  }

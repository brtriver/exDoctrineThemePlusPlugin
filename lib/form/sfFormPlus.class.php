<?php
class sfFormPlus {
  public static function setHiddenAll($form)
  {
    foreach ($form->getWidgetSchema()->getFields() as $id => $v) {
      // CSRF token is set by automate, so except !
      if ($form->getCSRFFieldName() == $id) continue;
      $form->setWidget($id, new sfWidgetFormInputHidden(array(), array('value' => $form->getValue($id))));
    }
    return $form;
  }
  public static function setSessionAll($form, $request, $user, $key)
  {
    $form = self::setHiddenAll($form);
    $user->setAttribute($key, $request->getParameter($form->getName()));
    return $form;
  }
}
?>

<?php
function url_for_form_confirm(sfForm $form, $routePrefix)
{
  $format = '%s/%s';
  if ('@' == $routePrefix[0])
  {
    $format = '%s_%s';
    $routePrefix = substr($routePrefix, 1);
  }
  $uri = sprintf($format, $routePrefix, $form->getObject()->isNew() ? 'cfnew' : 'cfedit');

  return url_for($uri, $form->getObject());
}

function form_tag_for_confirm(sfForm $form, $routePrefix, $attributes = array())
{
  return $form->renderFormTag(url_for_form_confirm($form, $routePrefix), array_merge(array('method' => 'post'), $attributes));
}

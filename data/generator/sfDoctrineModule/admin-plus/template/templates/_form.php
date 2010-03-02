[?php use_helper('UrlPlus') ?]
[?php use_stylesheets_for_form($form) ?]
[?php use_javascripts_for_form($form) ?]

<div class="sf_admin_form">

[?php if ($sf_context->getActionName() == 'confirm' && $form->isValid()): ?]
[?php   echo form_tag_for($form, '@<?php echo $this->params['route_prefix'] ?>', array('method' => 'put')) ?]
[?php elseif (!$sf_context->getRouting()->hasRouteName('<?php echo $this->params['route_prefix'] ?>_cfnew') || !$sf_context->getRouting()->hasRouteName('<?php echo $this->params['route_prefix'] ?>_cfedit')): ?]
[?php   echo form_tag_for($form, '@<?php echo $this->params['route_prefix'] ?>', array('method' => 'put')) ?]
[?php else: ?]
[?php   echo form_tag_for_confirm($form, '@<?php echo $this->params['route_prefix'] ?>') ?]
[?php endif ?]
    [?php echo $form->renderHiddenFields(false) ?]

    [?php if ($form->hasGlobalErrors()): ?]
      [?php echo $form->renderGlobalErrors() ?]
    [?php endif; ?]

    [?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?]
      [?php include_partial('<?php echo $this->getModuleName() ?>/form_fieldset', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?]
    [?php endforeach; ?]

[?php if ($sf_context->getActionName() == 'confirm' && $form->isValid()): ?]
    [?php include_partial('<?php echo $this->getModuleName() ?>/form_confirm_actions', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?]
[?php else: ?]
    [?php include_partial('<?php echo $this->getModuleName() ?>/form_actions', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?]
[?php endif ?]
  </form>
</div>

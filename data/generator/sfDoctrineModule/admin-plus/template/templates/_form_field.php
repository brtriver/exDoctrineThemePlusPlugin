[?php $is_confirm = ($sf_context->getActionName() == 'confirm' && $form->isValid())? true: false; ?]

[?php if ($field->isPartial()): ?]
[?php include_partial('<?php echo $this->getModuleName() ?>/'.$name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes, 'name' => $name, 'label' => $label, 'class' => $class, 'help' => $help, 'i18n_catalogue' => '<?php echo $this->getI18nCatalogue() ?>', 'is_confirm' => $is_confirm)) ?]
[?php elseif ($field->isComponent()): ?]
[?php include_component('<?php echo $this->getModuleName() ?>', $name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes, 'name' => $name, 'label' => $label, 'class' => $class, 'help' => $help, 'i18n_catalogue' => '<?php echo $this->getI18nCatalogue() ?>', 'is_confirm' => $is_confirm)) ?]
[?php else: ?]
  <div class="[?php echo $class ?][?php $form[$name]->hasError() and print ' errors' ?]">
    [?php echo $form[$name]->renderError() ?]
    <div>
      [?php echo $form[$name]->renderLabel($label) ?]

      <div class="content">
      [?php if ($is_confirm): ?]
[?php if (file_exists(sfConfig::get('sf_app_module_dir'). "/<?php echo $this->getModuleName() ?>/templates/_confirm_" . $name . ".php")): ?]
[?php   include_partial('<?php echo $this->getModuleName() ?>/confirm_' . $name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes, 'name' => $name, 'label' => $label, 'class' => $class, 'help' => $help, 'i18n_catalogue' => '<?php echo $this->getI18nCatalogue() ?>', 'is_confirm' => $is_confirm, 'value' => $form->getValue($name))); ?]
[?php else: ?]
        [?php if (is_bool($form->getValue($name))): ?]
          [?php include_partial('<?php echo $this->getModuleName() ?>/list_field_boolean', array('value' => $form->getValue($name))); ?]
        [?php else: ?]
          [?php echo $form->getValue($name) ?]
        [?php endif ?]
[?php endif ?]
      [?php else: ?]
        [?php echo $form[$name]->render($attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes) ?]
      [?php endif ?]
      </div>

      [?php if ($help): ?]
        <div class="help">[?php echo __($help, array(), '<?php echo $this->getI18nCatalogue() ?>') ?]</div>
      [?php elseif ($help = $form[$name]->renderHelp()): ?]
        <div class="help">[?php echo $help ?]</div>
      [?php endif; ?]
    </div>
  </div>
[?php endif; ?]

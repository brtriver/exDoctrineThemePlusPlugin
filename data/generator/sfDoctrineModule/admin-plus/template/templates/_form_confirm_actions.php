<ul class="sf_admin_actions">
<?php foreach ($this->configuration->getValue('confirm.actions') as $name => $params): ?>
<?php if ('_delete' == $name): ?>
  <?php echo $this->addCredentialCondition('[?php echo $helper->linkToDelete($form->getObject(), '.$this->asPhp($params).') ?]', $params) ?>

<?php elseif ('_list' == $name): ?>
  <?php echo $this->addCredentialCondition('[?php echo $helper->linkToList('.$this->asPhp($params).') ?]', $params) ?>

<?php elseif ('_back' == $name): ?>
[?php if ($form->isNew()): ?]
<?php echo $this->addCredentialCondition('[?php echo $helper->linkToRenew('.$this->asPhp($params).') ?]', $params) ?>
[?php else: ?]
<?php echo $this->addCredentialCondition('[?php echo $helper->linkToReedit($form->getObject(), '.$this->asPhp($params).') ?]', $params) ?>
[?php endif ?]

<?php elseif ('_save_and_list' == $name): ?>
  <?php echo $this->addCredentialCondition('[?php echo $helper->linkToSaveAndList($form->getObject(), '.$this->asPhp($params).') ?]', $params) ?>

<?php elseif ('_save' == $name): ?>
  <?php echo $this->addCredentialCondition('[?php echo $helper->linkToSave($form->getObject(), '.$this->asPhp($params).') ?]', $params) ?>


<?php elseif ('_save_and_add' == $name): ?>
  <?php echo $this->addCredentialCondition('[?php echo $helper->linkToSaveAndAdd($form->getObject(), '.$this->asPhp($params).') ?]', $params) ?>

<?php elseif ('_confirm' == $name): ?>
<?php echo $this->addCredentialCondition('[?php echo $helper->linkToConfirm($form->getObject(), '.$this->asPhp($params).') ?]', $params) ?>


<?php else: ?>
  <li class="sf_admin_action_<?php echo $params['class_suffix'] ?>">
[?php if (method_exists($helper, 'linkTo<?php echo $method = ucfirst(sfInflector::camelize($name)) ?>')): ?]
  <?php echo $this->addCredentialCondition('[?php echo $helper->linkTo'.$method.'($form->getObject(), '.$this->asPhp($params).') ?]', $params) ?>

[?php else: ?]
  <?php echo $this->addCredentialCondition($this->getLinkToAction($name, $params, true), $params) ?>

[?php endif; ?]
  </li>
<?php endif; ?>
<?php endforeach; ?>
</ul>

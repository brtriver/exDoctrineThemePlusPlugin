[?php use_stylesheets_for_form($form) ?]
[?php use_javascripts_for_form($form) ?]

<?php $form = $this->getFormObject() ?>

[?php if ($form->isValid() && ($sf_request->isMethod('post') && ($sf_request->getParameter('action') === "update") || $sf_request->getParameter('action') === "create")): ?]
[?php $sf_method = "put" ?]
[?php $submit_value = ($sf_request->getParameter('action') === "create")? "追加": "更新" ?]
[?php else: ?]
[?php $sf_method = "post" ?]
[?php $submit_value = "確認" ?]
[?php endif ?]

<?php if (isset($this->params['route_prefix']) && $this->params['route_prefix']): ?>
[?php echo form_tag_for($form, '@<?php echo $this->params['route_prefix'] ?>', array('method' => 'post')) ?]
<?php else: ?>
<form action="[?php echo url_for('<?php echo $this->getModuleName() ?>/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?<?php echo $this->getPrimaryKeyUrlParams('$form->getObject()', true) ?> : '')) ?]" method="post" [?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?]>
<input type="hidden" name="sf_method" value="[?php echo $sf_method ?]" />
<?php endif;?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
<?php if (!isset($this->params['non_verbose_templates']) || !$this->params['non_verbose_templates']): ?>
          [?php echo $form->renderHiddenFields(false) ?]
<?php endif; ?>
<?php if (isset($this->params['route_prefix']) && $this->params['route_prefix']): ?>
          &nbsp;<a href="[?php echo url_for('<?php echo $this->getUrlForAction('list') ?>') ?]">一覧に戻る</a>
<?php else: ?>
          &nbsp;<a href="[?php echo url_for('<?php echo $this->getModuleName() ?>/index') ?]">一覧に戻る</a>
<?php endif; ?>
          [?php if (!$form->getObject()->isNew()): ?]
[?php if ($sf_method != "put"): ?]
<?php if (isset($this->params['route_prefix']) && $this->params['route_prefix']): ?>
            &nbsp;[?php echo link_to('削除', '<?php echo $this->getUrlForAction('delete') ?>', $form->getObject(), array('method' => 'delete', 'confirm' => '削除してもよろしいですか?')) ?]
<?php else: ?>
            &nbsp;[?php echo link_to('削除', '<?php echo $this->getModuleName() ?>/delete?<?php echo $this->getPrimaryKeyUrlParams('$form->getObject()', true) ?>, array('method' => 'delete', 'confirm' => '削除してもよろしいですか?')) ?]
<?php endif; ?>
[?php else: ?]
<?php if (isset($this->params['route_prefix']) && $this->params['route_prefix']): ?>
            &nbsp;[?php echo link_to('戻る', '<?php echo $this->getUrlForAction('reedit') ?>', $form->getObject(), array('method' => 'post')) ?]
<?php else: ?>
            &nbsp;[?php echo link_to('戻る', '<?php echo $this->getModuleName() ?>/reedit?<?php echo $this->getPrimaryKeyUrlParams('$form->getObject()', true) ?>, array('method' => 'post')) ?]
<?php endif; ?>
[?php endif; ?]
         [?php else: ?]
[?php if ($sf_method == "put"): ?]
<?php if (isset($this->params['route_prefix']) && $this->params['route_prefix']): ?>
            &nbsp;[?php echo link_to('戻る', '<?php echo $this->getUrlForAction('renew') ?>', $form->getObject(), array('method' => 'post')) ?]
<?php else: ?>
            &nbsp;[?php echo link_to('戻る', '<?php echo $this->getModuleName() ?>/renew?<?php echo $this->getPrimaryKeyUrlParams('$form->getObject()', true) ?>, array('method' => 'post')) ?]
<?php endif; ?>
[?php endif; ?]
          [?php endif; ?]
          <input type="submit" value="[?php echo $submit_value ?]" />
        </td>
      </tr>
    </tfoot>
    <tbody>
[?php if ($sf_method == "post"): ?]

<?php if (isset($this->params['non_verbose_templates']) && $this->params['non_verbose_templates']): ?>
      [?php echo $form ?]
<?php else: ?>
      [?php echo $form->renderGlobalErrors() ?]
<?php foreach ($form as $name => $field): if ($field->isHidden()) continue ?>
      <tr>
        <th>[?php echo $form['<?php echo $name ?>']->renderLabel() ?]</th>
        <td>
          [?php echo $form['<?php echo $name ?>']->renderError() ?]
          [?php echo $form['<?php echo $name ?>'] ?]
        </td>
      </tr>
<?php endforeach; ?>
<?php endif; ?>

[?php else: ?]

[?php echo $form->renderGlobalErrors() ?]
<?php foreach ($form as $name => $field): if ($field->isHidden()) continue ?>
      <tr>
        <th>[?php echo $form['<?php echo $name ?>']->renderLabel() ?]</th>
        <td>
          [?php echo $form->getValue('<?php echo $name ?>'); ?>
        </td>
      </tr>
<?php endforeach; ?>

[?php endif ?]

    </tbody>
  </table>
</form>

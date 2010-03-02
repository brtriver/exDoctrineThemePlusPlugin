  protected function compile()
  {
    parent::compile();
    $config = $this->getConfig();
    $this->configuration['confirm'] = array(
        'fields'  => array(),
        'title'   => $this->getConfirmTitle(),
        'actions' => $this->getConfirmActions() ? $this->getConfirmActions() : $this->getConfirmActions(),
    );
    foreach (array_keys($config['default']) as $field)
    {
      $formConfig = array_merge($config['default'][$field], isset($config['form'][$field]) ? $config['form'][$field] : array());
      $this->configuration['confirm']['fields'][$field]   = new sfModelGeneratorConfigurationField($field, array_merge($formConfig, isset($config['confirm'][$field]) ? $config['confirm'][$field] : array()));
    }
    // form actions
    foreach ($this->configuration['confirm']['actions'] as $action => $parameters) {
      $this->configuration['confirm']['actions'][$action] = $this->fixActionParameters($action, $parameters);
    }
    $this->parseVariables('confirm', 'title');
    $this->configuration['credentials']['confirm'] = array();
  }
  protected function getConfig()
  {
    return array_merge(parent::getConfig(), array('confirm' => $this->getFieldsConfirm()));
  }


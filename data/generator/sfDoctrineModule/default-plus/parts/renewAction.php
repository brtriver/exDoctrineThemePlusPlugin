  public function executeRenew(sfWebRequest $request)
  {
    $this->setTemplate('new');
    $this->executeNew($request);
  }

  public function executeReedit(sfWebRequest $request)
  {
    $this->setTemplate('edit');
    $this->executeEdit($request);
  }

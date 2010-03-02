<?php
/**
 * sfObjectRouteCollectionPlus represents a collection of routes bound to Doctrine objects with a comfirm proccess.
 *
 * @package    symfony
 * @subpackage doctrine
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @author     Jonathan H. Wage <jonwage@gmail.com>
 * @author     Masao Maeda <brt.river@gmail.com>
 */
class sfDoctrineRouteCollectionPlus extends sfObjectRouteCollection
{
  protected
    $routeClass = 'sfDoctrineRoute';
  public function __construct(array $options)
  {
     $this->options = array_merge(array(
      'with_separated_confirm' => false,
    ), $this->options);
    parent::__construct($options);
    if (isset($this->options['with_separated_confirm']) && $this->options['with_separated_confirm'])
    {
      // with confirm
      $this->routes[$this->getRoute('cfnew')] = new $this->routeClass(
        sprintf('%s/confirm.:sf_format', $this->options['prefix_path']),
        array_merge($this->options['default_params'], array('module' => $this->options['module'], 'action' => $this->getActionMethod('confirm'), 'sf_format' => 'html')),
        array_merge($this->options['requirements'], array('sf_method' => 'post')),
        array('model' => $this->options['model'], 'type' => 'object')
        );
      $this->routes[$this->getRoute('cfedit')] = new $this->routeClass(
        sprintf('%s/confirm/:%s.:sf_format', $this->options['prefix_path'], $this->options['column']),
        array_merge($this->options['default_params'], array('module' => $this->options['module'], 'action' => $this->getActionMethod('confirm'), 'sf_format' => 'html')),
        array_merge($this->options['requirements'], array('sf_method' => 'post')),
        array('model' => $this->options['model'], 'type' => 'object', 'method' => $this->options['model_methods']['object'])
        );
    }
  }
  protected function getRouteForEdit()
  {
    return new $this->routeClass(
      sprintf('%s/:%s/%s.:sf_format', $this->options['prefix_path'], $this->options['column'], $this->options['segment_names']['edit']),
      array_merge($this->options['default_params'], array('module' => $this->options['module'], 'action' => $this->getActionMethod('edit'), 'sf_format' => 'html')),
      array_merge($this->options['requirements'], array('sf_method' => 'get')),
      array('model' => $this->options['model'], 'type' => 'object', 'method' => $this->options['model_methods']['object'])
    );
  }
  protected function getRouteForReedit()
  {
    return new $this->routeClass(
      sprintf('%s/:%s/%s.:sf_format', $this->options['prefix_path'], $this->options['column'], $this->options['segment_names']['edit']),
      array_merge($this->options['default_params'], array('module' => $this->options['module'], 'action' => $this->getActionMethod('edit'), 'sf_format' => 'html')),
      array_merge($this->options['requirements'], array('sf_method' => 'post')),
      array('model' => $this->options['model'], 'type' => 'object', 'method' => $this->options['model_methods']['object'])
    );
  }
  protected function getRouteForRenew()
  {
    return new $this->routeClass(
      sprintf('%s.:sf_format', $this->options['prefix_path']),
      array_merge($this->options['default_params'], array('module' => $this->options['module'], 'action' => $this->getActionMethod('new'), 'sf_format' => 'html')),
      array_merge($this->options['requirements'], array('sf_method' => 'post')),
      array('model' => $this->options['model'], 'type' => 'object', 'method' => $this->options['model_methods']['object'])
    );
  }
  protected function getRouteForCreate()
  {
    return new $this->routeClass(
      sprintf('%s.:sf_format', $this->options['prefix_path']),
      array_merge($this->options['default_params'], array('module' => $this->options['module'], 'action' => $this->getActionMethod('create'), 'sf_format' => 'html')),
      array_merge($this->options['requirements'], array('sf_method' => ((isset($this->options['with_separated_confirm']) && $this->options['with_separated_confirm'])? 'put': array('put', 'post')))),
      array('model' => $this->options['model'], 'type' => 'object')
    );
  }
  protected function getRouteForUpdate()
  {
    return new $this->routeClass(
      sprintf('%s/:%s.:sf_format', $this->options['prefix_path'], $this->options['column']),
      array_merge($this->options['default_params'], array('module' => $this->options['module'], 'action' => $this->getActionMethod('update'), 'sf_format' => 'html')),
      array_merge($this->options['requirements'], array('sf_method' => ((isset($this->options['with_separated_confirm']) && $this->options['with_separated_confirm'])? 'put': array('put', 'post')))),
      array('model' => $this->options['model'], 'type' => 'object', 'method' => $this->options['model_methods']['object'])
      );
  }
  protected function getDefaultActions()
  {
    $actions = parent::getDefaultActions();
    $actions[] = 'reedit';
    $actions[] = 'renew';
    return $actions;
  }


}
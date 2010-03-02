[?php

/**
 * <?php echo $this->getModuleName() ?> module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage <?php echo $this->getModuleName()."\n" ?>
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class Base<?php echo ucfirst($this->getModuleName()) ?>GeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? '<?php echo $this->params['route_prefix'] ?>' : '<?php echo $this->params['route_prefix'] ?>_'.$action;
  }
  public function linkToConfirm($object, $params)
  {
    return '<li class="sf_admin_action_confirm"><input type="submit" value="'.__($params['label'], array(), 'sf_admin').'" name="confirm" /></li>';
  }
  public function linkToReedit($object, $params)
  {
    return '<li class="sf_admin_action_reedit">'.link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('reedit'), $object, array('method' => 'post')).'</li>';
  }
  public function linkToRenew($params)
  {
    return '<li class="sf_admin_action_renew">'.link_to(__($params['label'], array(), 'sf_admin'), '@'.$this->getUrlForAction('renew'), array('method' => 'post')).'</li>';
  }
  public function linkToSaveAndList($object, $params)
  {
    return '<li class="sf_admin_action_save"><input type="submit" value="'.__($params['label'], array(), 'sf_admin').'" name="save_and_list" /></li>';
  }
}

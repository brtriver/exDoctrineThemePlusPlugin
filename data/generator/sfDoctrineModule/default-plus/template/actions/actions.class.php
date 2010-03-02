[?php

/**
 * <?php echo $this->getModuleName() ?> actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage <?php echo $this->getModuleName()."\n" ?>
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class <?php echo $this->getGeneratedModuleName() ?>Actions extends <?php echo $this->getActionsBaseClass() ?>

{
<?php include dirname(__FILE__).'/../../parts/indexAction.php' ?>

<?php if (isset($this->params['with_show']) && $this->params['with_show']): ?>
<?php include dirname(__FILE__).'/../../parts/showAction.php' ?>

<?php endif; ?>

<?php if (isset($this->params['with_separeted_confirm']) && $this->params['with_separated_confirm']): ?>
<?php include dirname(__FILE__).'/../../parts/cfnewAction.php' ?>
<?php include dirname(__FILE__).'/../../parts/cfeditAction.php' ?>
<?php include dirname(__FILE__).'/../../parts/cfprocessAction.php' ?>

<?php endif; ?>

<?php include dirname(__FILE__).'/../../parts/reeditAction.php' ?>

<?php include dirname(__FILE__).'/../../parts/renewAction.php' ?>

<?php include dirname(__FILE__).'/../../parts/newAction.php' ?>

<?php include dirname(__FILE__).'/../../parts/createAction.php' ?>

<?php include dirname(__FILE__).'/../../parts/editAction.php' ?>

<?php include dirname(__FILE__).'/../../parts/updateAction.php' ?>

<?php include dirname(__FILE__).'/../../parts/deleteAction.php' ?>

<?php include dirname(__FILE__).'/../../parts/processFormAction.php' ?>

<?php include dirname(__FILE__).'/../../parts/_getAttributeKey.php' ?>
}

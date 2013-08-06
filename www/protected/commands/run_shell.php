<?php 

$curPath = dirname(__FILE__);
$commandPath = $curPath.DIRECTORY_SEPARATOR.'shell';

$yii = $curPath.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'yii'.DIRECTORY_SEPARATOR.'framework'.DIRECTORY_SEPARATOR.'yii.php';

chdir(dirname(__FILE__).'/../../');
require_once(dirname(__FILE__).'/../../protected/includes/functions.inc.php');

require_once($yii);
$config = getConsoleCfg();

$console = Yii::createConsoleApplication($config);
//set command path to commands/cron
$console->setCommandPath($commandPath);
$console->getCommandRunner()->addCommands($console->getCommandPath());

$console->run();

?>

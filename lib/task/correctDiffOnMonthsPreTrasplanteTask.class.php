<?php

class correctDiffOnMonthsPreTrasplanteTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine'),
      // add your own options here
    ));

    $this->namespace        = 'loading';
    $this->name             = 'correctDiffOnMonthsPreTrasplante';
    $this->briefDescription = '';
    $this->detailedDescription = <<<EOF
The [correctDiffOnMonthsPreTrasplante|INFO] task does things.
Call it with:

  [php symfony correctDiffOnMonthsPreTrasplante|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

    // add your code here
    $datos = Doctrine::getTable('Consulta')->retrieveDiffOfMonthPreTrasplante();
    $updateSql = 'paciente_pre_trasplante set meses_en_lista = ? where id = ?';
    foreach($datos as $dato)
    {
      $month = (int) $dato['months'];
      $meses = (int) $dato['meses_en_lista'];
      if($month != $meses)
      {
        Doctrine::getTable("Pacientepretrasplante")->updatePreTrasplanteMesesLista($dato['id'], $month);
        //$connection->execute($updateSql, array($month, $dato['id']));
      } 
    }
    //transplanteConvertorHandler::cargarMesesEnListaPaciente();
  }
}

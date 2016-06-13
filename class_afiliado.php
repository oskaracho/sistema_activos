<?php
class afiliado
{ 
public $idafiliado; 
public $nombre_afi;
public $app_afi;
public $apm_afi;

	/*Constructor*/
	public function __construct($id, $nom, $app, $apm)
	{
		$this -> $idafiliado = $id;
		$this -> $nombre_afi = $nom;
		$this -> $app_afi = $app;
		$this -> $apm_afi = $apm;
	}

	/*GET - SET Idafiliado*/
	public function setIdafiliado($idafiliado) 
	{
	  $this->idafiliado = $idafiliado;
	}

	public function getIdafilado() 
	{
	  return $this->idafiliado;
	}
	/*GET - SET nombre_afi*/
	public function setNombre_afi($nombre_afi) 
	{
	  $this->nombre_afi = $nombre_afi;
	}

	public function getNombre_afi() 
	{
	  return $this->nombre_afi;
	}
	/*GET - SET app_afi*/
	public function setApp_afi($app_afi) 
	{
	  $this->app_afi = $app_afi;
	}

	public function getApp_afi() 
	{
	  return $this->app_afi;
	}
	/*GET - SET apm_afi*/	
	public function setApm_afi($apm_afi) 
	{
	  $this->apm_afi = $apm_afi;
	}

	public function getApm_afi() 
	{
	  return $this->apm_afi;
	}
}
?>
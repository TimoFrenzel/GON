<?php
class OsDownloader {
	/*
	 * 	$oD = new OsDownloader();
		$oD->setMFileName("downloaded.pdf");
		$oD->setMNewFileName("downloaded.pdf"); #optional
		$oD->setMType("pdf");
		$oD->sendDownload();
	 */
	protected $mFileName;
	protected $mNewFileName;
	protected $mHeader;
	protected $mType;
	protected $mVersion		="v0.1";
	
	

	public function getMHeader()
	{
	    return $this->mHeader;
	}

	public function setMHeader($mHeader)
	{
	    $this->mHeader = $mHeader;
	}
	
	/**
	 * 
	 * @return 
	 */
	public function getMFileName()
	{
	    return $this->mFileName;
	}

	/**
	 * 
	 * @param $mFileName
	 */
	public function setMFileName($mFileName)
	{
	    $this->mFileName = $mFileName;
	}
	
	/**
	 * 
	 * @param $mFileName
	 */
	public function sendDownload(){
		// Wir werden eine PDF Datei ausgeben
			header('Content-type: application/'.$this->mType);
			
		// Es wird downloaded.pdf benannt
			if($this->mNewFileName){
				header('Content-Disposition: attachment; filename="'.$this->mNewFileName.'"');
			}else{
				header('Content-Disposition: attachment; filename="'.$this->mFileName.'"');
			}
			
			
		// Die originale PDF Datei heißt original.pdf
			readfile($this->mFileName);
	}

	public function getMType()
	{
	    return $this->mType;
	}

	public function setMType($mType)
	{
	    $this->mType = $mType;
	}

	public function getMNewFileName()
	{
	    return $this->mNewFileName;
	}

	public function setMNewFileName($mNewFileName)
	{
	    $this->mNewFileName = $mNewFileName;
	}
}

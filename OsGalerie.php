<?php

error_reporting(0);

class OsGalerie {
	protected $mVersion			="v0.1";
	protected $mTitle 			= "GON-Galerie";
	protected $mImagePerRow 	= 5;
	protected $mImagePerSite 	= 25;
	protected $mSort;
	protected $mThumbHeight 	= 100;
	protected $mThumbWidth 		= 100;
	protected $mShowDebug 		= 0;
	protected $mStartDate;
	protected $mEndDate;
	protected $mShortTitle		= "GON - Galerie ohne Namen";
	protected $mSite;
	protected $mAllowTypes		= array('.jpg');
	protected $mPictureList;
	protected $mCurrentSite 	= 0;
	
	public function __construct($title = null){
		if($title != null){
			
		}
		if($this->mShowDebug==1){
			$this->setMStartDate(microtime());
		}
	}
	
	/**
	 * 
	 * @return 
	 */
	public function getMTitle()
	{
	    return $this->mTitle;
	}

	/**
	 * 
	 * @param $mTitle
	 */
	public function setMTitle($mTitle)
	{
	    $this->mTitle = $mTitle;
	}

	/**
	 * 
	 * @return 
	 */
	public function getMImagePerRow()
	{
	    return $this->mImagePerRow;
	}

	/**
	 * 
	 * @param $mImagePerRow
	 */
	public function setMImagePerRow($mImagePerRow)
	{
	    $this->mImagePerRow = $mImagePerRow;
	}

	/**
	 * 
	 * @return 
	 */
	public function getMImagePerSite()
	{
	    return $this->mImagePerSite;
	}

	/**
	 * 
	 * @param $mImagePerSite
	 */
	public function setMImagePerSite($mImagePerSite)
	{
	    $this->mImagePerSite = $mImagePerSite;
	}

	/**
	 * 
	 * @return 
	 */
	public function getMSort()
	{
	    return $this->mSort;
	}

	/**
	 * 
	 * @param $mSort
	 */
	public function setMSort($mSort)
	{
	    $this->mSort = $mSort;
	}

	/**
	 * 
	 * @return 
	 */
	public function getMThumbHeight()
	{
	    return $this->mThumbHeight;
	}

	/**
	 * 
	 * @param $mThumbHeight
	 */
	public function setMThumbHeight($mThumbHeight)
	{
	    $this->mThumbHeight = $mThumbHeight;
	}

	/**
	 * 
	 * @return 
	 */
	public function getMThumbWidth()
	{
	    return $this->mThumbWidth;
	}

	/**
	 * 
	 * @param $mThumbWidth
	 */
	public function setMThumbWidth($mThumbWidth)
	{
	    $this->mThumbWidth = $mThumbWidth;
	}

	/**
	 * 
	 * @return 
	 */
	public function getMShowDebug()
	{
	    return $this->mShowDebug;
	}

	/**
	 * 
	 * @param $mShowDebug
	 */
	public function setMShowDebug($mShowDebug)
	{
	    $this->mShowDebug = $mShowDebug;
	}

	/**
	 * 
	 * @return 
	 */
	public function getMStartDate()
	{
	    return $this->mStartDate;
	}

	/**
	 * 
	 * @param $mStartDate
	 */
	public function setMStartDate($mStartDate)
	{
	    $this->mStartDate = $mStartDate;
	}

	/**
	 * 
	 * @return 
	 */
	public function getMEndDate()
	{
	    return $this->mEndDate;
	}

	/**
	 * 
	 * @param $mEndDate
	 */
	public function setMEndDate($mEndDate)
	{
	    $this->mEndDate = $mEndDate;
	}

	/**
	 * 
	 * @return 
	 */
	public function getMShortTitle()
	{
	    return $this->mShortTitle;
	}

	/**
	 * 
	 * @param $mShortTitle
	 */
	public function setMShortTitle($mShortTitle)
	{
	    $this->mShortTitle = $mShortTitle;
	}
	/**
	 * 
	 * @return 
	 */
	public function getMSite()
	{
	    return $this->mSite;
	}
	/**
	 * 
	 * @return 
	 */
	public function setMSite($mSite)
	{
	    $this->mSite = $mSite;
	}
	/**
	 * 
	 * @return 
	 */
	public function readOrder($path){
		// Öffnet ein Unterverzeichnis mit dem Namen "daten"
		$verzeichnis = openDir($path);
		// Verzeichnis lesen
		while ($file = readDir($verzeichnis)) {
		// Höhere Verzeichnisse nicht anzeigen!
		 if ($file != "." && $file != "..") {
		  	$aFiles[] = $file;
		 }
		}
		closeDir($verzeichnis); // Verzeichnis schließen
		$this->mPictureList = $this->clearFiles($aFiles);
		
	}
	/**
	 * 
	 * @return 
	 */
	public function clearFiles($aFiles){
		foreach($aFiles As $key => $value){
			$tmp = strtolower(strrchr($value, '.'));
			if(array_search($tmp,$this->mAllowTypes)===false){
				unset ($aFiles[$key]);
			}
		}
		sort($aFiles);
		return $aFiles;
	}
	public function createOne(){
		echo "<div>
				<div><a href=\"".$_SERVER['PHP_SELF']."?page=".$_GET['page']."\">zur&uuml;ck</a></div><br>
			<img border=\"0\" src=\"OsThumbnailer.php?filename=".$_GET['filename']."&width=400\" alt=\"\">
			</div>";
	}
	/**
	 * 
	 * @return 
	 */
	public function create(){
				
				$x4 = $this->getMPictureList();
				$x4 = $this->IncArrayKeys($x4);
				$sGalerie='<div>'.$this->getMTitle().' '.$this->getMVersion().'<br>'.$this->getMShortTitle().'</div><table border="0">'."\r\n";
				$nCountFiles = count($x4);
				if(!$_GET['page']){
					$_GET['page'] = 1;
				}
				$this->setMCurrentSite($_GET['page']);

				$iCurrentSite = $this->getMCurrentSite();
				
				for($d=$iCurrentSite-1;$d<$iCurrentSite;$d++){

					for($i1=($this->getMImagePerSite()*$d)+1;
						$i1<$this->getMImagePerSite()*$iCurrentSite;
							$i1+=$this->getMImagePerRow()){
						$sGalerie.='<tr>'."\r\n";
						for($i2=0;$i2<$this->getMImagePerRow();$i2++){
							$sGalerie.='<td style="background-color:#fff;width:100px;height:100px">';
							if($x4[$i1+$i2])
								$sGalerie.="<a href=\"".$_SERVER['PHP_SELF']."?filename=".$x4[$i1+$i2]."&amp;page=".$_GET['page']."&amp;show=1\">
									<img border=\"0\" src=\"OsThumbnailer.php?filename=".$x4[$i1+$i2]."\" alt=\"\">\n
									</a>";
							else 
								$sGalerie.='&nbsp;';
								$sGalerie.='</td>'."\r\n";
							}#end if($i2...
						$sGalerie.='</tr>'."\r\n";					
					}#end if($i1...
					
					
				}#end seite
		
		
				$sGalerie.='<tr><td colspan="'.$this->getMImagePerRow().'">
				<a href="index.php?page='.($iCurrentSite-1).'">zur&uuml;ck</a> | 
				<a href="index.php?page='.($iCurrentSite+1).'">weiter</a>
				</td></tr></table>'."\r\n";
				
				if($this->mShowDebug==1){
					$this->setMEndDate(microtime());
					$timeDiff = $this->getMEndDate()-$this->getMStartDate();
					$timeDiff = "<div>".$timeDiff." mSecs parse time</div>";
					$sGalerie = $sGalerie.$timeDiff;
				}
				
				return $sGalerie;
	}

	public function getMAllowTypes()
	{
	    return $this->mAllowTypes;
	}

	public function setMAllowTypes($mAllowTypes)
	{
	    $this->mAllowTypes = $mAllowTypes;
	}

	public function getMPictureList()
	{
	    return $this->mPictureList;
	}

	public function setMPictureList($mPictureList)
	{
	    $this->mPictureList = $mPictureList;
	}

	/**
	 * 
	 * @return 
	 */
	public function getMCurrentSite()
	{
	    return $this->mCurrentSite;
	}

	/**
	 * 
	 * @param $mCurrentSite
	 */
	public function setMCurrentSite($mCurrentSite)
	{
	    $this->mCurrentSite = $mCurrentSite;
	}
	
/**
 * Erhöht die Keys eines Arrays um 1
 */
function IncArrayKeys($array)
{
    krsort($array); //1
    $new_array = array(); //2
    foreach($array as $key => $value) //3
    {
      $new_array[$key + 1] = $value; //4
    }
    ksort($new_array); //5
    return $new_array; //6
}

	/**
	 * 
	 * @return 
	 */
	public function getMVersion()
	{
	    return $this->mVersion;
	}

	/**
	 * 
	 * @param $mVersion
	 */
	public function setMVersion($mVersion)
	{
	    $this->mVersion = $mVersion;
	}
}

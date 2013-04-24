<?php
error_reporting(0);
	$thumbnail = new OsThumbnailer();
	$thumbnail->create($_GET['filename']);

	if(!isset($_GET['width']) && empty($_GET['width'])){
		$thumbnail->resize($thumbnail->getMProperSize());
		$thumbnail->autocut(100,100,5);
	}else{
		$thumbnail->resize($_GET['width']);
	}
	
	$thumbnail->output(true,true);


class OsThumbnailer {
	protected $mVersion		="v0.1";
	protected $mNewImage	="";
	protected $mFileInfo;
	protected $mFullName	="";
	protected $mNewX		= 100;
	protected $mNewY		= 100;
	protected $mQuality 	= 90;
	protected $mOrgY;
	protected $mOrgX;
	protected $mModi 		= 5;
	protected $mOverride 	= false;
	protected $mCube 		= 100;
	protected $mCubePos 	= 5;
	protected $mProper 		= 1;
	protected $mProperSize 	= 100;
	protected $mProperProzW = 50;
	protected $mProperProzH = 50;
	protected $mMinSizePx 	= 100;
	protected $mMaxSizePx 	= 100;
	protected $mMaxSize 	= 0;
	protected $mMinSize 	= 1;
	protected $mAutoCutW 	= 100;
	protected $mAutoCutH 	= 100;
	protected $mAutoCutPos 	= 5;
	protected $mSave 		= 0;
	public $img;



	/**
	 * 
	 * @return 
	 */
	public function getMNewImage()
	{
	    return $this->mNewImage;
	}

	/**
	 * 
	 * @param $mNewImage
	 */
	public function setMNewImage($mNewImage)
	{
	    $this->mNewImage = $mNewImage;
	}

	/**
	 * 
	 * @return 
	 */
	public function getMFileInfo()
	{
	    return $this->mFileInfo;
	}

	/**
	 * 
	 * @param $mFileInfo
	 */
	public function setMFileInfo($mFileInfo)
	{
	    $this->mFileInfo = $mFileInfo;
	}

	/**
	 * 
	 * @return 
	 */
	public function getMFullName()
	{
	    return $this->mFullName;
	}

	/**
	 * 
	 * @param $mFullName
	 */
	public function setMFullName($mFullName)
	{
	    $this->mFullName = $mFullName;
	}

	/**
	 * 
	 * @return 
	 */
	public function getMNewX()
	{
	    return $this->mNewX;
	}

	/**
	 * 
	 * @param $mNewX
	 */
	public function setMNewX($mNewX)
	{
	    $this->mNewX = $mNewX;
	}

	/**
	 * 
	 * @return 
	 */
	public function getMNewY()
	{
	    return $this->mNewY;
	}

	/**
	 * 
	 * @param $mNewY
	 */
	public function setMNewY($mNewY)
	{
	    $this->mNewY = $mNewY;
	}

	/**
	 * 
	 * @return 
	 */
	public function getMQuality()
	{
	    return $this->mQuality;
	}

	/**
	 * 
	 * @param $mQuality
	 */
	public function setMQuality($mQuality)
	{
	    $this->mQuality = $mQuality;
	}

	/**
	 * 
	 * @return 
	 */
	public function getMOrgY()
	{
	    return $this->mOrgY;
	}

	/**
	 * 
	 * @param $mOrgY
	 */
	public function setMOrgY($mOrgY)
	{
	    $this->mOrgY = $mOrgY;
	}

	/**
	 * 
	 * @return 
	 */
	public function getMOrgX()
	{
	    return $this->mOrgX;
	}

	/**
	 * 
	 * @param $mOrgX
	 */
	public function setMOrgX($mOrgX)
	{
	    $this->mOrgX = $mOrgX;
	}

	/**
	 * 
	 * @return 
	 */
	public function getMModi()
	{
	    return $this->mModi;
	}

	/**
	 * 
	 * @param $mModi
	 */
	public function setMModi($mModi)
	{
	    $this->mModi = $mModi;
	}

	/**
	 * 
	 * @return 
	 */
	public function getMOverride()
	{
	    return $this->mOverride;
	}

	/**
	 * 
	 * @param $mOverride
	 */
	public function setMOverride($mOverride)
	{
	    $this->mOverride = $mOverride;
	}

	/**
	 * 
	 * @return 
	 */
	public function getMCube()
	{
	    return $this->mCube;
	}

	/**
	 * 
	 * @param $mCube
	 */
	public function setMCube($mCube)
	{
	    $this->mCube = $mCube;
	}

	/**
	 * 
	 * @return 
	 */
	public function getMCubePos()
	{
	    return $this->mCubePos;
	}

	/**
	 * 
	 * @param $mCubePos
	 */
	public function setMCubePos($mCubePos)
	{
	    $this->mCubePos = $mCubePos;
	}

	/**
	 * 
	 * @return 
	 */
	public function getMProper()
	{
	    return $this->mProper;
	}

	/**
	 * 
	 * @param $mProper
	 */
	public function setMProper($mProper)
	{
	    $this->mProper = $mProper;
	}

	/**
	 * 
	 * @return 
	 */
	public function getMProperSize()
	{
	    return $this->mProperSize;
	}

	/**
	 * 
	 * @param $mProperSize
	 */
	public function setMProperSize($mProperSize)
	{
	    $this->mProperSize = $mProperSize;
	}

	/**
	 * 
	 * @return 
	 */
	public function getMProperProzW()
	{
	    return $this->mProperProzW;
	}

	/**
	 * 
	 * @param $mProperProzW
	 */
	public function setMProperProzW($mProperProzW)
	{
	    $this->mProperProzW = $mProperProzW;
	}

	/**
	 * 
	 * @return 
	 */
	public function getMProperProzH()
	{
	    return $this->mProperProzH;
	}

	/**
	 * 
	 * @param $mProperProzH
	 */
	public function setMProperProzH($mProperProzH)
	{
	    $this->mProperProzH = $mProperProzH;
	}

	/**
	 * 
	 * @return 
	 */
	public function getMMinSizePx()
	{
	    return $this->mMinSizePx;
	}

	/**
	 * 
	 * @param $mMinSizePx
	 */
	public function setMMinSizePx($mMinSizePx)
	{
	    $this->mMinSizePx = $mMinSizePx;
	}

	/**
	 * 
	 * @return 
	 */
	public function getMMaxSizePx()
	{
	    return $this->mMaxSizePx;
	}

	/**
	 * 
	 * @param $mMaxSizePx
	 */
	public function setMMaxSizePx($mMaxSizePx)
	{
	    $this->mMaxSizePx = $mMaxSizePx;
	}

	/**
	 * 
	 * @return 
	 */
	public function getMMaxSize()
	{
	    return $this->mMaxSize;
	}

	/**
	 * 
	 * @param $mMaxSize
	 */
	public function setMMaxSize($mMaxSize)
	{
	    $this->mMaxSize = $mMaxSize;
	}

	/**
	 * 
	 * @return 
	 */
	public function getMMinSize()
	{
	    return $this->mMinSize;
	}

	/**
	 * 
	 * @param $mMinSize
	 */
	public function setMMinSize($mMinSize)
	{
	    $this->mMinSize = $mMinSize;
	}

	/**
	 * 
	 * @return 
	 */
	public function getMAutoCutW()
	{
	    return $this->mAutoCutW;
	}

	/**
	 * 
	 * @param $mAutoCutW
	 */
	public function setMAutoCutW($mAutoCutW)
	{
	    $this->mAutoCutW = $mAutoCutW;
	}

	/**
	 * 
	 * @return 
	 */
	public function getMAutoCutH()
	{
	    return $this->mAutoCutH;
	}

	/**
	 * 
	 * @param $mAutoCutH
	 */
	public function setMAutoCutH($mAutoCutH)
	{
	    $this->mAutoCutH = $mAutoCutH;
	}

	/**
	 * 
	 * @return 
	 */
	public function getMAutoCutPos()
	{
	    return $this->mAutoCutPos;
	}

	/**
	 * 
	 * @param $mAutoCutPos
	 */
	public function setMAutoCutPos($mAutoCutPos)
	{
	    $this->mAutoCutPos = $mAutoCutPos;
	}

	/**
	 * 
	 * @return 
	 */
	public function getMSave()
	{
	    return $this->mSave;
	}

	/**
	 * 
	 * @param $mSave
	 */
	public function setMSave($mSave)
	{
	    $this->mSave = $mSave;
	}
	
	public function create($data){
		$this->destroy();
		if (file_exists($data)) {
	        $this->setMNewImage(@ImageCreateFromJpeg($data));
	       	$this->setMFileInfo(basename($data));
	        $this->setMFullName($data);
	    } else {
	        $this->setMNewImage(@ImageCreateFromString($data));
	    }
	    if (!$this->getMNewImage()) {
	        $this->destroy();
	        return false;
	    } else {
	        $this->setMOrgX(ImageSX($this->getMNewImage()));
	        $this->setMOrgY(ImageSY($this->getMNewImage()));
	        return true;
        }
	}
	
	public function resize($newX = false,$newY = false){
	 	if ($this->getMNewImage()) {
			$X = ImageSX($this->getMNewImage());
			$Y = ImageSY($this->getMNewImage());
			$newY = $this->_convert($newY,$Y);
			if (!$newX && !$newY) {
				$newX = $X;
				$newY = $Y;
			}
			if (!$newX) {
				$newX = round($X / ($Y / $newY));
			}
			if (!$newY) {
				$newY = round($Y / ( $X / $newX));
			}
			if ( ! $newimg = ImageCreateTruecolor($newX,$newY)) {
				$newimg = ImageCreate($newX,$newY);
			}
			if ( ! ImageCopyResampled ($newimg, $this->getMNewImage(), 0, 0, 0, 0, $newX, $newY,$X,$Y)) {
				ImageCopyResized ($newimg, $this->getMNewImage(), 0, 0, 0, 0, $newX, $newY,$X,$Y);
			}
				$this->setMNewImage($newimg);
				return true;
		} else {
			return false;
		}
	}
	
	public function output($sendHeader = true,$destroy = true){
	 if ($this->getMNewImage()) {
		if ($sendHeader) {
			header("Content-type: image/jpeg");
		}
		ImageJPEG($this->getMNewImage(),null,$this->getMQuality());

		if ($destroy) {
			$this->destroy();
		}
	 } else {
		return false;
	 }
	}
	
	public function destroy(){
		if ($this->getMNewImage()) {
          ImageDestroy($this->getMNewImage());
        }
          $this->setMNewImage("");
          $this->setMFileInfo(false);
          $this->setMFullName("");
          $this->setMNewX(false);
          $this->setMNewY(false);
          $this->setMQuality(90);
          $this->setMOrgX(false);
          $this->setMOrgY(false);
	}
	
	function _convert($value,$full = false){
		if (strstr($value,"%")) {
			$value = trim(str_replace ("%", "", $value));
			$value = ($full / 100) * $value;
		}
		if ($value < 1 && $value !== false) {
			$value = 1;
		}
		return $value;
	}
	
function autocut($newX = null,$newY = null,$pos = null)
        {
     
        $this->img = $this->getMNewImage();
        
        if ($this->img) {
 
                        $X = ImageSX($this->img);
                        $Y = ImageSY($this->img);
 
                        $newX = $this->_convert($newX,$X);
                        $newY = $this->_convert($newY,$Y);
 
                        if (!$newX) {
                                $newX = $X;
                        }
 
                        if (!$newY) {
                                $newY = $Y;
                        }
 
                        switch ($pos) {
                            case 1:
                                $srcX = 0;
                                $srcY = 0;
                        break;
 
                            case 2:
                                $srcX = round(($X / 2)-($newX/2));
                                $srcY = 0;
                        break;
 
                            case 3:
                                $srcX = ImageSX($this->img) - $newX;
                                $srcY = 0;
                        break;
 
                            case 4:
                                $srcX = 0;
                                $srcY = round(($Y / 2)-($newY/2));
                        break;
 
                            case 5:
                                $srcX = round(($X / 2)-($newX/2));
                                $srcY = round(($Y / 2)-($newY/2));
                        break;
 
                            case 6:
                                $srcX = $X-$newX;
                                $srcY = round(($Y / 2)-($newY/2));
                        break;
 
                            case 7:
                                $srcX = 0;
                                $srcY = $Y - $newY;
                        break;
 
                            case 8:
                                $srcX = round(($X / 2)-($newX/2));
                                $srcY = $Y-$newY;
                        break;
 
                            case 9:
                                $srcX = $X- $newX;
                                $srcY = $Y - $newY;
                        break;
 
                            default:
                                $srcX = round(($X / 2)-($newX/2));
                                $srcY = round(($Y / 2)-($newY/2));
                        }
 						$this->setMNewImage($this->img);
                        return $this->cut($newX,$newY,$srcX,$srcY);
                } else {
                        return false;
                }
        }
        
		function cut($newX=null,$newY=null,$srcX = 0,$srcY = 0)
        {
  
        	$this->img = $this->getMNewImage();
        if ($this->img) {
 
                        $X = ImageSX($this->img);
                        $Y = ImageSY($this->img);
 
                        $newX = $this->_convert($newX,$X);
                        $newY = $this->_convert($newY,$Y);
 
                        if (!$newX) {
                                $newX = $X;
                        }
 
                        if (!$newY) {
                                $newY = $Y;
                        }
 
                        if ( ! $newimg = ImageCreateTruecolor($X,$Y)) {
                                $newimg = ImageCreate($X,$Y);
                        }
                        ImageCopy ($newimg,$this->img,0, 0, 0, 0,$X,$Y);
                        ImageDestroy($this->img);
                        if ( ! $this->img = ImageCreateTruecolor($newX, $newY)) {
                                $this->img = ImageCreate($newX, $newY);
                        }
                        imagecopy ($this->img,$newimg, 0, 0,$srcX, $srcY, $newX, $newY);
                        ImageDestroy($newimg);
 
                       	$this->setMNewImage($this->img);
                        return true;
 
                } else {
                        return false;
                }
        }
}
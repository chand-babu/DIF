<?php
/**
 * Created by PhpStorm.
 * User: rkd35
 * Date: 12-07-2017
 * Time: 15:33
 */

namespace services;

class CommonService
{
    private $session = null;
    private $constants = null;
    private $compress = null;
    private $setting = array(
        'directory' => './../../../images/compress/', // directory file compressed output
        'file_type' => array( // file format allowed
            'image/jpeg',
            'image/png',
            'image/gif'
        )
    );
    function __construct()
    {
        $this->session = new SessionService();
        $this->constants = new ConstantsKey();
        $this->compress = new ImgCompressor($this->setting);
    }

    public function uploadFilesToDirectory($files, $madule_name) {
        if ($files) {
            $imageName = explode(".", $files['name']);
            $fileUniqueName = $this->getUniqueTimeCode('IMGHD').'.'.$imageName[sizeof($imageName)-1];
            $upload = move_uploaded_file($files['tmp_name'],'./../../../images/'.$madule_name.'/'.$fileUniqueName);
            if ($upload) {
                $fileUniqueNameSm = $this->getUniqueTimeCode('IMGSM').'.'.$imageName[sizeof($imageName)-1];
                header('Content-type: image/png');
                $image = new \Imagick(realpath('./../../../images/'.$madule_name.'/'.$fileUniqueName));
                $image->adaptiveResizeImage(800, 800);
                $image->setImageFormat ($imageName[sizeof($imageName)-1]);
                file_put_contents ('./../../../images/'.$madule_name.'/'.$fileUniqueNameSm, $image);
                //$this->compress->run('./../../../images/category/'.$fileUniqueNameSm, $imageName[sizeof($imageName)-1], 2);
                $big = '/admin-panel/images/'.$madule_name.'/'.$fileUniqueName;
                $small = '/admin-panel/images/'.$madule_name.'/'.$fileUniqueNameSm;
                return [$big, $small];
            } else {
                return '';
            }
        } else {
            return '';
        }
    }

    private function getUniqueTimeCode($prefix='') {
        return $prefix.date("mdYHis");
    }

    public function getUniqueIdentityCode($prefix, $shortCode) {
        $code = (!$this->isEmpty($shortCode) && $shortCode) ? $this->getShotCode() :
            $this->getLongCode();
        $finalCode = ($this->isEmpty($prefix)) ? $code : strtoupper($prefix) . $code;
        return $finalCode;
    }

    private function getLongCode() {
        return md5(uniqid(rand(), true));
    }

    private function getShotCode() {
        return rand(0, 999999);
    }

    public function isEmpty($value) {
        if (empty($value)) {
            return true;
        } else {
            return false;
        }
    }
}
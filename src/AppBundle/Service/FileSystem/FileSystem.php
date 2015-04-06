<?php
/**
 * User: carlos
 * Date: 15/03/2015
 * Time: 19:33
 */

namespace AppBundle\Service\FileSystem;


class FileSystem {
    /** @var  \Symfony\Component\Filesystem\Filesystem */
    private $fileSystem;
    private $rootDir;

    public function __construct($fileSystem,$rootDir){
        $this->fileSystem = $fileSystem;
        $this->rootDir = $rootDir;
    }

    public function createChannelDir($channelName){
        $this->fileSystem->mkdir("{$this->rootDir}/{$channelName}/",0777);
    }
    public function removeChannelDir($channelName){
        $this->fileSystem->remove("{$this->rootDir}/{$channelName}/");
    }


    public function createVersionDir($channelName,$versionName){
        $this->fileSystem->mkdir("{$this->rootDir}/{$channelName}/{$versionName}",0777);
    }
    public function removeVersionDir($channelName,$versionName){
        $this->fileSystem->remove("{$this->rootDir}/{$channelName}/{$versionName}",0777);
    }

    public function createFile($channelName,$versionName,$fileName){

    }


    public function deleteChannel(){

    }

    public function deleteVersion(){

    }

    public function deleteFile(){

    }

    private function createName($object){

    }

}
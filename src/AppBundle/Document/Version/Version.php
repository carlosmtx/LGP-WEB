<?php
/**
 * User: carlos
 * Date: 09/03/2015
 * Time: 21:08
 */

namespace AppBundle\Document\Version;

use AppBundle\Document\Channel\Channel;
use AppBundle\Document\File\File;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class Version {
    /**
     * @MongoDB\Id()
     */
    public $id;
    /**
     * @MongoDB\String()
     */
    public $name;
    /**
     * @MongoDB\ReferenceMany(targetDocument="AppBundle\Document\File\File")
     */
    private $files;
    /**
     * @MongoDB\ReferenceOne(targetDocument="AppBundle\Document\Channel\Channel")
     */
    public $channel;

    public function toArray(){

        $retVal = [
            'id'  => $this->getId(),
            'name'=> $this->getName(),
        ];
        /**
         * @var $file File
         */
        $retVal['files'] = [];
        foreach ( $this->files ?: [] as $file ){
            $retVal['files'][] = [
                'id'   => $file->getId(),
                'name' => $file->getName(),
            ];
        }

        return $retVal;
    }

    public function __construct()
    {
        $this->files = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add file
     *
     * @param \AppBundle\Document\File\File $file
     */
    public function addFile(File $file)
    {
        $this->files[] = $file;
    }

    /**
     * Remove file
     *
     * @param File $file
     */
    public function removeFile(File $file)
    {
        $this->files->removeElement($file);
    }

    /**
     * Get files
     *
     * @return \Doctrine\Common\Collections\Collection $files
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * Set channel
     *
     * @param Channel $channel
     * @return self
     */
    public function setChannel(Channel $channel)
    {
        $this->channel = $channel;
        return $this;
    }

    /**
     * Get channel
     *
     * @return Channel $channel
     */
    public function getChannel()
    {
        return $this->channel;
    }
}

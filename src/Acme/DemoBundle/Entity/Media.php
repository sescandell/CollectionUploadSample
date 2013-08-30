<?php

namespace Acme\DemoBundle\Entity;

use Avocode\FormExtensionsBundle\Form\Model\UploadCollectionFileInterface;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Media
 * @Vich\Uploadable
 */
class Media implements UploadCollectionFileInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @Vich\UploadableField(mapping="upload_image", fileNameProperty="path")
     * @var \Symfony\Component\HttpFoundation\File\File
     */
    protected $file;

    /**
     * @var string
     */
    private $path;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Media
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set file
     *
     * @param Symfony\Component\HttpFoundation\File\File $file
     * @return Media
     */
    public function setFile(\Symfony\Component\HttpFoundation\File\File $file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return Symfony\Component\HttpFoundation\File\File
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Get size
     *
     * @return string
     */
    public function getSize()
    {
        return $this->file->getFileInfo()->getSize();
    }

    /**
     * @inheritDoc
     */
    public function setParent($parent)
    {
        // Don't do anything
        // Just check it, but I think $parent is a Library
    }

    /**
     * @inheritDoc
     */
    public function getPreview()
    {
        return (preg_match('/image\/.*/i', $this->file->getMimeType()));
    }
}

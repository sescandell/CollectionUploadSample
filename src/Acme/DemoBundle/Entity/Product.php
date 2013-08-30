<?php

namespace Acme\DemoBundle\Entity;

use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Product
 * @Vich\Uploadable
 */
class Product
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $picture;

    /**
     * @Vich\UploadableField(mapping="upload_image", fileNameProperty="picture")
     *
     * @var File pictureFile
     */
    protected $pictureFile;

    /**
     * @var \Acme\DemoBundle\Entity\Library
     */
    private $library;

    /**
     * Default constructor
     */
    public function __construct()
    {
        $this->library = new Library();
    }


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
     * Set name
     *
     * @param string $name
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

   /**
    * Get Picture File
    *
    * @return File
    */
    public function getPictureFile()
    {
        return $this->pictureFile;
    }

    /**
     * Set picture file as $file
     *
     * @param  File    $file
     * @return Product
     */
    public function setPictureFile(File $file = null)
    {
        $this->pictureFile = $file;

        if ($file) {
            $this->picture = uniqid();
        }

        return $this;
    }

    /**
     * Set picture
     *
     * @param string $picture
     * @return Product
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set library
     *
     * @param \Acme\DemoBundle\Entity\Library $library
     * @return Product
     */
    public function setLibrary(\Acme\DemoBundle\Entity\Library $library)
    {
        $this->library = $library;

        return $this;
    }

    /**
     * Get library
     *
     * @return \Acme\DemoBundle\Entity\Library
     */
    public function getLibrary()
    {
        return $this->library;
    }
}

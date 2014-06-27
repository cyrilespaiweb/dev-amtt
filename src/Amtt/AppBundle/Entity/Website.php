<?php

namespace Amtt\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Website
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Amtt\AppBundle\Entity\Repository\WebsiteRepository")
 */
class Website
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="uri", type="string", length=255)
     */
    private $uri;

    /**
     * @var string
     *
     * @ORM\Column(name="internal_code", type="string", length=80)
     */
    private $internalCode;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean")
     */
    private $enabled;

    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=150, nullable=true)
     */
    private $logo;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=25)
     */
    private $phone;


    /**
     * @var integer
     *
     * @ORM\Column(name="internal_id", type="integer")
     */
    private $internalId;


    /**
     * @var integer
     *
     * @ORM\Column(name="voxreflex_key", type="string", length=255, nullable=true)
     */
    private $voxreflexKey;

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
     * @return Website
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
     * Set uri
     *
     * @param string $uri
     * @return Website
     */
    public function setUri($uri)
    {
        $this->uri = $uri;

        return $this;
    }

    /**
     * Get uri
     *
     * @return string 
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * Set internalCode
     *
     * @param string $internalCode
     * @return Website
     */
    public function setInternalCode($internalCode)
    {
        $this->internalCode = $internalCode;

        return $this;
    }

    /**
     * Get internalCode
     *
     * @return string 
     */
    public function getInternalCode()
    {
        return $this->internalCode;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return Website
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set logo
     *
     * @param string $logo
     * @return Website
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string 
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Website
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set internalId
     *
     * @param integer $internalId
     * @return Website
     */
    public function setInternalId($internalId)
    {
        $this->internalId = $internalId;

        return $this;
    }

    /**
     * Get internalId
     *
     * @return integer 
     */
    public function getInternalId()
    {
        return $this->internalId;
    }

    /**
     * Set voxreflexKey
     *
     * @param string $voxreflexKey
     * @return Website
     */
    public function setVoxreflexKey($voxreflexKey)
    {
        $this->voxreflexKey = $voxreflexKey;

        return $this;
    }

    /**
     * Get voxreflexKey
     *
     * @return string 
     */
    public function getVoxreflexKey()
    {
        return $this->voxreflexKey;
    }

    public function __toString()
    {
        return ($this->getName().' ('.$this->getUri().')') ? : '';
    }
}

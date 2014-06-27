<?php

namespace Amtt\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Block
 *
 * @ORM\Table(name="cms_block")
 * @ORM\Entity(repositoryClass="Amtt\AppBundle\Entity\Repository\BlockRepository")
 */
class Block
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
     * @ORM\ManyToOne(targetEntity="Amtt\AppBundle\Entity\Page")
     * @ORM\JoinColumn(nullable=false)
     */
    private $page;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var integer
     *
     * @ORM\Column(name="position", type="integer")
     */
    private $position;

    /**
     * @var integer
     *
     * @ORM\Column(name="column_width", type="integer")
     */
    private $columnWidth;


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
     * Set title
     *
     * @param string $title
     * @return Block
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Block
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Block
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set columnWidth
     *
     * @param integer $columnWidth
     * @return Block
     */
    public function setColumnWidth($columnWidth)
    {
        $this->columnWidth = $columnWidth;

        return $this;
    }

    /**
     * Get columnWidth
     *
     * @return integer 
     */
    public function getColumnWidth()
    {
        return $this->columnWidth;
    }

    /**
     * Set page
     *
     * @param \Amtt\AppBundle\Entity\Page $page
     * @return Block
     */
    public function setPage(\Amtt\AppBundle\Entity\Page $page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return \Amtt\AppBundle\Entity\Page 
     */
    public function getPage()
    {
        return $this->page;
    }
}

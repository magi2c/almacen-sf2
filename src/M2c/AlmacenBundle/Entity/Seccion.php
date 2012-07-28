<?php

namespace M2c\AlmacenBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * M2c\AlmacenBundle\Entity\Seccion
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Seccion
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $nombre
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\ManyToMany(targetEntity="M2c\AlmacenBundle\Entity\Categoria", inversedBy="secciones")
     */
    private $categorias;


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
     * Set nombre
     *
     * @param string $nombre
     * @return Seccion
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    public function __construct()
    {
        $this->categorias = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add categorias
     *
     * @param M2c\AlmacenBundle\Entity\Categoria $categorias
     * @return Seccion
     */
    public function addCategoria(\M2c\AlmacenBundle\Entity\Categoria $categorias)
    {
        $this->categorias[] = $categorias;
        return $this;
    }

    /**
     * Remove categorias
     *
     * @param <variableType$categorias
     */
    public function removeCategoria(\M2c\AlmacenBundle\Entity\Categoria $categorias)
    {
        $this->categorias->removeElement($categorias);
    }

    /**
     * Get categorias
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getCategorias()
    {
        return $this->categorias;
    }
}
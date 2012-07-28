<?php

namespace M2c\AlmacenBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * M2c\AlmacenBundle\Entity\Categoria
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Categoria
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
     * @ORM\ManyToMany(targetEntity="M2c\AlmacenBundle\Entity\Seccion", inversedBy="categorias")
     */
    private $secciones;


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
     * @return Categoria
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
        $this->secciones = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add secciones
     *
     * @param M2c\AlmacenBundle\Entity\Seccion $secciones
     * @return Categoria
     */
    public function addSeccione(\M2c\AlmacenBundle\Entity\Seccion $secciones)
    {
        $this->secciones[] = $secciones;
        return $this;
    }

    /**
     * Remove secciones
     *
     * @param <variableType$secciones
     */
    public function removeSeccione(\M2c\AlmacenBundle\Entity\Seccion $secciones)
    {
        $this->secciones->removeElement($secciones);
    }

    /**
     * Get secciones
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getSecciones()
    {
        return $this->secciones;
    }
}
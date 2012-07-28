<?php

namespace M2c\AlmacenBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * M2c\AlmacenBundle\Entity\Caja
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Caja
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
     * @var string $referencia
     *
     * @ORM\Column(name="referencia", type="string", length=255)
     */
    private $referencia;

    /**
     * @var decimal $base
     *
     * @ORM\Column(name="base", type="decimal")
     */
    private $base;

    /**
     * @var decimal $ancho
     *
     * @ORM\Column(name="ancho", type="decimal")
     */
    private $ancho;

    /**
     * @var decimal $alto
     *
     * @ORM\Column(name="alto", type="decimal")
     */
    private $alto;

    /**
     * @var string $categoria
     *
     * @ORM\ManyToOne(targetEntity="M2c\AlmacenBundle\Entity\Categoria")
     */
    private $categoria;


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
     * Set referencia
     *
     * @param string $referencia
     * @return Caja
     */
    public function setReferencia($referencia)
    {
        $this->referencia = $referencia;
        return $this;
    }

    /**
     * Get referencia
     *
     * @return string 
     */
    public function getReferencia()
    {
        return $this->referencia;
    }

    /**
     * Set base
     *
     * @param decimal $base
     * @return Caja
     */
    public function setBase($base)
    {
        $this->base = $base;
        return $this;
    }

    /**
     * Get base
     *
     * @return decimal 
     */
    public function getBase()
    {
        return $this->base;
    }

    /**
     * Set ancho
     *
     * @param decimal $ancho
     * @return Caja
     */
    public function setAncho($ancho)
    {
        $this->ancho = $ancho;
        return $this;
    }

    /**
     * Get ancho
     *
     * @return decimal 
     */
    public function getAncho()
    {
        return $this->ancho;
    }

    /**
     * Set alto
     *
     * @param decimal $alto
     * @return Caja
     */
    public function setAlto($alto)
    {
        $this->alto = $alto;
        return $this;
    }

    /**
     * Get alto
     *
     * @return decimal 
     */
    public function getAlto()
    {
        return $this->alto;
    }



    /**
     * Set categoria
     *
     * @param M2c\AlmacenBundle\Entity\Categoria $categoria
     * @return Caja
     */
    public function setCategoria(\M2c\AlmacenBundle\Entity\Categoria $categoria = null)
    {
        $this->categoria = $categoria;
        return $this;
    }

    /**
     * Get categoria
     *
     * @return M2c\AlmacenBundle\Entity\Categoria 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    public function __toString()
    {
        return $this->getReferencia();
    }
}
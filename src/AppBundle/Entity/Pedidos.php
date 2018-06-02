<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pedidos
 *
 * @ORM\Table(name="pedidos")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PedidosRepository")
 */
class Pedidos
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="idMesero", type="integer", nullable=true)
     */
    private $idMesero;

    /**
     * @var date
     *
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="producto1", type="string", length=255, nullable=true)
     */
    private $producto1;

    /**
     * @var string
     *
     * @ORM\Column(name="producto2", type="string", length=255, nullable=true)
     */
    private $producto2;

    /**
     * @var string
     *
     * @ORM\Column(name="producto3", type="string", length=255, nullable=true)
     */
    private $producto3;

    /**
     * @var string
     *
     * @ORM\Column(name="producto4", type="string", length=255, nullable=true)
     */
    private $producto4;

    /**
     * @var int
     *
     * @ORM\Column(name="cantidad1", type="integer", nullable=true)
     */
    private $cantidad1;

    /**
     * @var int
     *
     * @ORM\Column(name="cantidad2", type="integer", nullable=true)
     */
    private $cantidad2;

    /**
     * @var int
     *
     * @ORM\Column(name="cantidad3", type="integer", nullable=true)
     */
    private $cantidad3;

    /**
     * @var int
     *
     * @ORM\Column(name="cantidad4", type="integer", nullable=true)
     */
    private $cantidad4;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreMesero", type="string", length=255, nullable=true)
     */
    private $nombreMesero;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreCliente", type="string", length=255, nullable=true)
     */
    private $nombreCliente;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get idMesero
     *
     * @return int
     */
    public function getIdMesero()
    {
        return $this->idMesero;
    }

    /**
     * Set idMesero
     *
     * @param integer $idMesero
     *
     * @return Pedidos
     */
    public function setIdMesero($idMesero)
    {
        $this->idMesero = $idMesero;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return date
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set fecha
     *
     * @param integer $fecha
     *
     * @return Pedidos
     */
    public function setfecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Set producto1
     *
     * @param string $producto1
     *
     * @return Pedidos
     */
    public function setProducto1($producto1)
    {
        $this->producto1 = $producto1;

        return $this;
    }

    /**
     * Get producto1
     *
     * @return string
     */
    public function getProducto1()
    {
        return $this->producto1;
    }

    /**
     * Set producto2
     *
     * @param string $producto2
     *
     * @return Pedidos
     */
    public function setProducto2($producto2)
    {
        $this->producto2 = $producto2;

        return $this;
    }

    /**
     * Get producto2
     *
     * @return string
     */
    public function getProducto2()
    {
        return $this->producto2;
    }

    /**
     * Set producto3
     *
     * @param string $producto3
     *
     * @return Pedidos
     */
    public function setProducto3($producto3)
    {
        $this->producto3 = $producto3;

        return $this;
    }

    /**
     * Get producto3
     *
     * @return string
     */
    public function getProducto3()
    {
        return $this->producto3;
    }

    /**
     * Set producto4
     *
     * @param string $producto4
     *
     * @return Pedidos
     */
    public function setProducto4($producto4)
    {
        $this->producto4 = $producto4;

        return $this;
    }

    /**
     * Get producto4
     *
     * @return string
     */
    public function getProducto4()
    {
        return $this->producto4;
    }

    /**
     * Set cantidad1
     *
     * @param integer $cantidad1
     *
     * @return Pedidos
     */
    public function setCantidad1($cantidad1)
    {
        $this->cantidad1 = $cantidad1;

        return $this;
    }

    /**
     * Get cantidad1
     *
     * @return int
     */
    public function getCantidad1()
    {
        return $this->cantidad1;
    }

    /**
     * Set cantidad2
     *
     * @param integer $cantidad2
     *
     * @return Pedidos
     */
    public function setCantidad2($cantidad2)
    {
        $this->cantidad2 = $cantidad2;

        return $this;
    }

    /**
     * Get cantidad2
     *
     * @return int
     */
    public function getCantidad2()
    {
        return $this->cantidad2;
    }

    /**
     * Set cantidad3
     *
     * @param integer $cantidad3
     *
     * @return Pedidos
     */
    public function setCantidad3($cantidad3)
    {
        $this->cantidad3 = $cantidad3;

        return $this;
    }

    /**
     * Get cantidad3
     *
     * @return int
     */
    public function getCantidad3()
    {
        return $this->cantidad3;
    }

    /**
     * Set cantidad4
     *
     * @param integer $cantidad4
     *
     * @return Pedidos
     */
    public function setCantidad4($cantidad4)
    {
        $this->cantidad4 = $cantidad4;

        return $this;
    }

    /**
     * Get cantidad4
     *
     * @return int
     */
    public function getCantidad4()
    {
        return $this->cantidad4;
    }

    /**
     * Set nombreMesero
     *
     * @param string $nombreMesero
     *
     * @return Pedidos
     */
    public function setNombreMesero($nombreMesero)
    {
        $this->nombreMesero = $nombreMesero;

        return $this;
    }

    /**
     * Get nombreMesero
     *
     * @return string
     */
    public function getNombreMesero()
    {
        return $this->nombreMesero;
    }

    /**
     * Set nombreCliente
     *
     * @param string $nombreCliente
     *
     * @return Pedidos
     */
    public function setNombreCliente($nombreCliente)
    {
        $this->nombreCliente = $nombreCliente;

        return $this;
    }

    /**
     * Get nombreCliente
     *
     * @return string
     */
    public function getNombreCliente()
    {
        return $this->nombreCliente;
    }
    public function __toString() {
      return $this->producto1;
      return $this->producto2;
      return $this->producto3;
      return $this->producto4;
    }
}

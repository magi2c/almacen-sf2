<?php
namespace Cupon\OfertaBundle\Entity;

use Doctrine\ORM\EntityRepository;

class CajaRepository extends EntityRepository
{
    public function findAllByFilters($filter_arr = array())
    {
        $em = $this->getDoctrine()->getEntityManager();
        $sql_str = 'SELECT o FROM AlmacenBundle:Caja c
                                 WHERE 1 = 1';
        $consulta = $em->createQuery($sql_str);
 /*
        $consulta->setParameters(array(
            'ciudad' => 1,
            'fecha'  => '201X-XX-XX 00:00:00'
        )); */

        return $consulta->getResult();

    }
}
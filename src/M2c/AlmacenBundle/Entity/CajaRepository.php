<?php
namespace M2c\AlmacenBundle\Entity;

use Doctrine\ORM\EntityRepository;

class CajaRepository extends EntityRepository
{
    public function findAllByFilters($filter_arr = array())
    {
        $em = $this->getEntityManager();

        $sql_str = 'SELECT c, ca, se FROM AlmacenBundle:Caja c
                             JOIN c.categoria ca
                             JOIN ca.secciones se
                                 WHERE 1 = 1';

        // creamos query
        foreach ($filter_arr as $key => $value) {
            switch ($key) {
                case "secciones";
                    $sql_str .= " AND se.id = :secciones"; //ToDO multiselect
                    break;

            }
        }

        // set parameter ToDo hace un un mismo bucle
        $consulta = $em->createQuery($sql_str);
        foreach ($filter_arr as $key => $value) {
            switch ($key) {
                case "secciones";
                    $consulta->setParameter($key, $value);
                    break;

            }
        }

        return $consulta->getResult();

    }
}
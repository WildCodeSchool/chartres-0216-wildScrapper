<?php

namespace MeetupBundle\Repository;

/**
 * GroupesPHPRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GroupesPHPRepository extends \Doctrine\ORM\EntityRepository
{
    //Nombre de membres par topic par ville
    public function MembersByCity($topic, $ville)
   {
       $qb = $this->createQueryBuilder('g');

       $qb->select('SUM(g.members) AS membresTotal')
           ->addSelect('g.topic')
           ->where('g.topic = ?1')
           ->andwhere('g.city = ?2')
           ->groupBy('g.topic')
           ->setParameters(array( 1 => $topic, 2 => $ville));

       return $qb->getQuery()->getResult();
   }


   public function Graph()
  {
      $qb = $this->createQueryBuilder('g');

      $qb->select('SUM(g.members) AS membresTotal')
         ->addSelect('g.city')
         ->addSelect('g.topic')
         ->groupBy('g.topic')
          ;

      return $qb->getQuery()->getResult();
  }

  //Nombre de Meetup crées par année
  public function MeetupCreatedByYear($year, $city)
 {
     $dateDeb = round(microtime(true) * 1000) - $year * 31536000000;
     $dateFin = $dateDeb + 31536000000;

     $qb = $this->createQueryBuilder('g');

     $qb->select('COUNT (g) as create')
        ->where('g.created > ?1')
        ->andwhere('g.created < ?2')
        ->andwhere('g.city = ?3')
        ->setParameters(array(1=> $dateDeb, 2=> $dateFin, 3=> $city));

     return $qb->getQuery()->getResult();
 }
  //Nombre de membres par topic par ville
    public function MembersOrderByCity($ville)
   {
       $qb = $this->createQueryBuilder('g');

       $qb->select('SUM(g.members) AS membresTotal')
           ->addSelect('g.topic')
           ->addSelect('g.city')
           ->where('g.city = ?1')
           ->groupBy('g.topic')
           ->orderBy('membresTotal', 'DESC')
           ->setParameters(array(1 => $ville));


       return $qb->getQuery()->getResult();
   }

}

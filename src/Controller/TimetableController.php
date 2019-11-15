<?php

namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use App\Entity\Rezerwacja;

class TimetableController extends Controller
{
    /**
    * @Route("/timetable")
    */
    public function showIndex()
    {
      return $this->render('timetable/timetable.html.twig');
    }


    /**
    * @Route("/ajaxSearchTimetable", name="ajaxSearchTimetable")
    */
    public function ajaxAddCall(Request $request)
    {
      $data1 = $request->get('date');
      $onePage=4;

      $query=$this->getDoctrine()
        ->getRepository(Rezerwacja::class)->createQueryBuilder('r')
        ->select('r.id', 'r.data', 'r.idKlienta', 'r.godzina')
        ->andWhere('r.data = (:ids)')
        ->setParameter('ids', $data1)
        ->orderBy('r.godzina', 'ASC')
        ->getQuery();
        $rezerwacja = $query->execute();

      $query2 = $this->getDoctrine()->getManager();
      $count = $query2->createQuery(
        ' SELECT  count(rez.id)
          FROM    App\Entity\Rezerwacja rez
          WHERE   rez.data=?1
        ')
        ->setParameter(1, $data1)
        ->getSingleScalarResult();

      $msg= array
            (
              array('rezerwacja' => $rezerwacja),
              array('count' => $count),
              array('onePage' => $onePage),
            );
      return new JsonResponse(array('a'=> $msg));
    }


    /**
    * @Route("/ajaxPage")
    */
    public function ajaxPage(Request $request)
    {
      $data1 = $request->get('page');
      $data1Req = $request->get('date');
      $onePage=4;

      $product = $this->getDoctrine()
        ->getRepository(Rezerwacja::class)
        ->find($data1Req);

      $data0=$product->getData();

      $query=$this->getDoctrine()
        ->getRepository(Rezerwacja::class)->createQueryBuilder('r')
        ->select('r.id', 'r.data', 'r.idKlienta', 'r.godzina')
        ->andWhere('r.data = (:ids)')
        ->setParameter('ids', $data0)
        ->setFirstResult(($data1-1)*$onePage)
        ->setMaxResults($data1*$onePage)
        ->orderBy('r.godzina', 'ASC')
        ->getQuery();
        $rezerwacja  = $query->execute();

      $msg= array
            (
              array('onePage' => $onePage),
              array('rezerwacja' => $rezerwacja),
            );

      return new JsonResponse(array('a'=> $msg));
    }




}

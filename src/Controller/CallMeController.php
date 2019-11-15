<?php

namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use App\Entity\Klient;
use App\Entity\Lekarz;
use App\Entity\Rezerwacja;

class CallMeController extends Controller
{
    /**
    * @Route("/call")
    */
    public function showIndex()
    {
      return $this->render('call/call.html.twig');
    }

    /**
    * @Route("/ajaxAddCall", name="ajaxAddCall")
    */
    public function ajaxAddCall(Request $request)
    {
      // pobierz
      $data1 = $request->get('name');
      $data2 = $request->get('surname');
      $data3 = $request->get('phone');
      $data4 = $request->get('email');

      $data5 = $request->get('date');
      $data6 = $request->get('clock');

      $data7 = $request->get('town');
      $data8 = $request->get('street');
      $data9 = $request->get('houseNumber');

      // walidacja poprawnosci maila "."
      if(filter_var($data4, FILTER_VALIDATE_EMAIL))
        {

          $flag=1;

           $entityManager = $this->getDoctrine()->getManager();

          $klient = new Klient();
          $klient->setImie($data1);
          $klient->setNazwisko($data2);
          $klient->setTelefon($data3);
          $klient->setEmail($data4);
          $klient->setMiasto($data7);
          $klient->setUlica($data8);
          $klient->setNumerDomu($data9);
          $entityManager->persist($klient);
          $entityManager->flush();

          $rezerwacja = new Rezerwacja();
          $rezerwacja ->setIdKlienta($klient->getId());
          $rezerwacja ->setData(new \DateTime($data5));
          $rezerwacja ->setGodzina($data6);

          $entityManager->persist($rezerwacja);
          $entityManager->flush();

        }
        else {
          $flag=0;
        }

      // komunikat
      $msg= array
            (
              array('email' => $flag),
            );
      return new JsonResponse(array('a'=> $msg));
    }


    /**
    * @Route("/ajaxGetTime", name="ajaxGetTime" )
    */
    public function ajaxGetTime(Request $request)
    {

      // powiedzmy ze strefa dziala
      date_default_timezone_set('Europe/Warsaw');
      $data1Req = $request->get('date');
      $data2 = new \DateTime('now');
      $data1 = new \DateTime($data1Req);

      if($data1>$data2)
      {
          // to wypisz normalnie wszystko
          $flag=1;
      }
      else {
          // podzial na godziny
          $godzina=$data2->format('H');
          if($godzina<10)
          {
            $flag=2;
          }
          if($godzina>10 && $godzina<14)
          {
            $flag=3;
          }
          if($godzina>14 && $godzina<18)
          {
            $flag=4;
          }
          if($godzina>18)
          {
            $flag=5;
          }
      }

      // komunikat
      $msg= array
            (
              array('date' => $flag),
            );
      return new JsonResponse(array('a'=> $msg));
    }


    //
    // /**
    // * @Route("/add")
    // */
    // public function index()
    // {
    //     // you can fetch the EntityManager via $this->getDoctrine()
    //     // or you can add an argument to your action: index(EntityManagerInterface $entityManager)
    //     $entityManager = $this->getDoctrine()->getManager();
    //
    //     $klient = new Klient();
    //     $klient->setImie('Mariusz');
    //     $klient->setNazwisko('Najwer');
    //     $klient->setEmail('najwer23@gmail.com');
    //
    //     $entityManager->persist($klient);
    //     $entityManager->flush();
    //
    //
    //     $rezerwacja = new Rezerwacja();
    //     $rezerwacja ->setIdKlienta($klient->getId());
    //     $rezerwacja ->setData(new \DateTime("2018-04-05"));
    //     $rezerwacja ->setGodzina("od 6:00 do 10:00");
    //     // $rezerwacja ->setGodzina(new \DateTime("12:12"));
    //     $entityManager->persist($rezerwacja);
    //     $entityManager->flush();
    //
    //     $lekarz = new Lekarz();
    //     $lekarz ->setImie('Paweł');
    //     $lekarz ->setNazwisko('Gruby');
    //     $entityManager->persist($lekarz);
    //     $entityManager->flush();
    //
    //
    //
    //     // tell Doctrine you want to (eventually) save the Product (no queries yet)
    //
    //
    //
    //     // actually executes the queries (i.e. the INSERT query)
    //
    //
    //     return new Response('Saved new product with id '.$klient->getId());
    // }

}

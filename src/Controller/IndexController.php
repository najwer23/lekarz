<?php

namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class IndexController extends Controller
{
    /**
    * @Route("/")
    */
    public function showIndex()
    {
      return $this->render('index/index.html.twig');
    }


    // /**
    //  * @Route("/b", name="b")
    //  */
    // public function insecureAction(Request $request){
    //    return $this->render('b.html.twig');
    // }

 /**
 * @Route("/ajaxMail", name="ajaxMail")
 */
public function ajaxAction(Request $request, \Swift_Mailer $mailer)
{
  // pobierz
  $data1 = $request->get('email');
  $data2 = $request->get('name');
  $data3 = $request->get('surname');
  $data4 = $request->get('topic');
  $data5 = $request->get('text');


  // walidacja poprawnosci maila "."
  if(filter_var($data1, FILTER_VALIDATE_EMAIL))
    {

      $flag=1;
      //to wyslij email
      // $email = Array($data1=>$data2);
      $message = (new \Swift_Message($data4))
          // ->setFrom($data1, $data2)
          ->setFrom([$data1 => $data2.' '.$data3])
          ->setCc([$data1 => $data2.' '.$data3])
          ->setTo('garnela32@gmail.com')
          ->setBody($data5)
      ;
      $mailer->send($message);
    }
    else {
      $flag=0;
    }

  //pokaz komunikat
  $msg= array
        (
          array('email' => $flag),
        );
  return new JsonResponse(array('a'=> $msg));
}

    // /**
    // * @Route("/mail")
    // */
    // public function indexAction(\Swift_Mailer $mailer)
    // {
    // $message = (new \Swift_Message('Hello Email'))
    //     ->setFrom(['john@doe.com' => 'John Doe'])
    //     ->setCc(['john@doe.com' => 'John Doe'])
    //     ->setTo('garnela32@gmail.com')
    //     ->setBody('You should see me from the profiler!')
    // ;
    //
    // $mailer->send($message);
    //
    // return $this->render('index/index.html.twig');
    // }
}

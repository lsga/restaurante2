<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;

class LogginController extends Controller
{
    /**
     * @Route("/loggin", name="ingresar")
     */
    public function LogginAction(Request $request){

      $session = $request->getSession();

      $em = $this->getDoctrine()->getManager();
      $repository = $em->getRepository('AppBundle:usuarios');

      if($request->getMethod()=='POST'){
        $usuario= $request->get('usuario');
        $pass=$request->get('contraseña');

        $us = $repository->findOneBy(array('user'=>$usuario, 'password'=>$pass));
        $session->set('usuario', $us);
        if ($us) {
          $tipous = $us -> getTipoUsuario();
          if ($tipous=="administrador") {
            return $this->render('loggin/administrador.html.twig', array('user' =>$us));
          }elseif ($tipous=="usuario") {
            return $this->render('loggin/usuario.html.twig', array('user' =>$us));
          }
          return $this->render('default/index.html.twig');
        }
      }
      else {
        return $this->render('default/index.html.twig');
      }
    }
}

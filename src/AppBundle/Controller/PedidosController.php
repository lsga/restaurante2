<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Pedidos;
use AppBundle\Entity\usuarios;
use AppBundle\Entity\producto;
use Symfony\Component\HttpFoundation\Session\Session;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class PedidosController extends Controller
{

  /**
    * @Route("/restaurante/web/App_dev.php/pedidos", name="Pedidos")
 */
     public function listAction()
     {
       $pedido = $this->getDoctrine()
         ->getRepository('AppBundle:Pedidos')
         ->FindAll();
       return $this->render('Pedidos/index.html.twig', array(
         'pedidos' => $pedido
       ));
     }

    /**
   * @Route("/restaurante/web/App_dev.php/pedidos/crear", name="Pedidos_Crear")
   */
  public function CrearAction(Request $request)
  {
    $pedido = new Pedidos;
    $session = $request->getSession();
    $usuario = $session->get('usuario');


    $form = $this->createFormBuilder($pedido)
      ->add('Producto_1', EntityType::class, array('class' => producto::class,'choice_label' => 'NombreProducto'))
      ->add('Cantidad_1', TextType::class, array('attr' => array('class'=>'form-control','style'=>'margin-bottom:15px')))
      ->add('Producto_2', EntityType::class, array('class' => producto::class,'choice_label' => 'NombreProducto'))
      ->add('Cantidad_2', TextType::class, array('attr' => array('class'=>'form-control','style'=>'margin-bottom:15px')))
      ->add('Producto_3', EntityType::class, array('class' => producto::class,'choice_label' => 'NombreProducto'))
      ->add('Cantidad_3', TextType::class, array('attr' => array('class'=>'form-control','style'=>'margin-bottom:15px')))
      ->add('Producto_4', EntityType::class, array('class' => producto::class,'choice_label' => 'NombreProducto'))
      ->add('Cantidad_4', TextType::class, array('attr' => array('class'=>'form-control','style'=>'margin-bottom:15px')))
      ->add('NombreCliente', TextType::class, array('attr' => array('class'=>'form-control','style'=>'margin-bottom:15px')))
      ->add('Guardar', SubmitType::class, array('label' => 'Crear Producto','attr' => array('class'=>'btn btn-primary','style'=>'margin-bottom:15px')))
      ->getForm();

      $form->handleRequest($request);

      if($form->isSubmitted() && $form->isValid()){
          $prod1 = $form['Producto_1']->getData();
          $prod2 = $form['Producto_2']->getData();
          $prod3 = $form['Producto_3']->getData();
          $prod4 = $form['Producto_4']->getData();
          $cant1 = $form['Cantidad_1']->getData();
          $cant2 = $form['Cantidad_2']->getData();
          $cant3 = $form['Cantidad_3']->getData();
          $cant4 = $form['Cantidad_4']->getData();
          $nombreCliente = $form['NombreCliente']->getData();
          $nombreUsuario = $usuario-> getNombreUsuario()." ".$usuario->getApellidoUsuario();
          $idMesero = $usuario-> getId();

          $pedido->setProducto1($prod1)->__toString();
          $pedido->setProducto2($prod2)->__toString();
          $pedido->setProducto3($prod3)->__toString();
          $pedido->setProducto4($prod4)->__toString();
          $pedido->setCantidad1($cant1);
          $pedido->setCantidad2($cant2);
          $pedido->setCantidad3($cant3);
          $pedido->setCantidad4($cant4);
          $pedido->setNombreCliente($nombreCliente);
          $pedido->setNombreMesero($nombreUsuario);
          $pedido->setIdMesero($idMesero);

          $em = $this->getDoctrine()->getManager();
          $em->persist($pedido);
          $em->flush();

           $this->addFlash(
            'notice',
            'Pedido Creado'
          );
        return $this->redirectToRoute('Pedidos');
      }
      return $this->render('Pedidos/crear.html.twig', array(
        'form' => $form->createView()
      ));
  }


  /**
     * @Route("/restaurante/web/App_dev.php/pedidos/detalle/{id}", name="Pedido_Detalle")
     */
  public function DetalleAction($id)
  {
    $pedido = $this->getDoctrine()
      ->getRepository('AppBundle:Pedidos')
      ->Find($id);
      $producto = $this->getDoctrine()
        ->getRepository('AppBundle:producto')
        ->FindAll();
      $mesero = $this->getDoctrine()
        ->getRepository('AppBundle:usuarios')
        ->FindAll();
    return $this->render('Pedidos/detalle.html.twig', array(
      'pedidos' => $pedido,'productos' => $producto, 'meseros' => $mesero
    ));
  }

  /**
     * @Route("/restaurante/web/App_dev.php/pedidos/detalleFecha/{fecha}", name="Pedido_Detalle_Fecha")
     */
  public function DetalleFechaAction($fecha)
  {
    $pedido = $this->getDoctrine()
      ->getRepository('AppBundle:Pedidos')
      ->Find($fecha);
      $producto = $this->getDoctrine()
        ->getRepository('AppBundle:producto')
        ->FindAll();
      $mesero = $this->getDoctrine()
        ->getRepository('AppBundle:usuarios')
        ->FindAll();
    return $this->render('Pedidos/detalleFecha.html.twig', array(
      'pedidos' => $pedido,'productos' => $producto, 'meseros' => $mesero
    ));
  }

  /**
   * @Route("/restaurante/web/App_dev.php/pedidos/eliminar/{id}", name="Pedido_Eliminar")
   */
  public function EliminarAction($id)
  {
    $em = $this->getDoctrine()->getManager();
    $pedido = $em->getRepository('AppBundle:Pedidos')->find($id);

    $em->remove($pedido);
    $em->flush();

    $this->addFlash(
      'notice',
      'Pedido Eliminado'
    );

    return $this->redirectToRoute('Pedidos');
  }
}

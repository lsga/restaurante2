<?php

namespace AppBundle\Controller;

use AppBundle\Entity\producto;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class ProductoController extends Controller
{

  /**
    * @Route("/restaurante/web/App_dev.php/productos", name="Productos")
 */
     public function listAction()
     {
       $producto = $this->getDoctrine()
         ->getRepository('AppBundle:producto')
         ->FindAll();
       return $this->render('Producto/index.html.twig', array(
         'productos' => $producto
       ));
     }

    /**
   * @Route("/restaurante/web/App_dev.php/productos/crear", name="Productos_Crear")
   */
  public function CrearAction(Request $request)
  {
    $producto = new producto;

    $form = $this->createFormBuilder($producto)
      ->add('NombreProducto', TextType::class, array('attr' => array('class'=>'form-control','style'=>'margin-bottom:15px')))
      ->add('Cantidad', TextType::class, array('attr' => array('class'=>'form-control','style'=>'margin-bottom:15px')))
      ->add('Precio', TextType::class, array('attr' => array('class'=>'form-control','style'=>'margin-bottom:15px')))
      ->add('Guardar', SubmitType::class, array('label' => 'Crear Producto','attr' => array('class'=>'btn btn-primary','style'=>'margin-bottom:15px')))
      ->getForm();

      $form->handleRequest($request);

      if($form->isSubmitted() && $form->isValid()){
          $nom = $form['NombreProducto']->getData();
          $cant = $form['Cantidad']->getData();
          $precio = $form['Precio']->getData();

          $producto->setNombreProducto($nom);
          $producto->setCantidad($cant);
          $producto->setPrecio($precio);

          $em = $this->getDoctrine()->getManager();
          $em->persist($producto);
          $em->flush();

           $this->addFlash(
            'notice',
            'Producto Creado'
          );
        return $this->redirectToRoute('Productos');
      }
      return $this->render('Producto/crear.html.twig', array(
        'form' => $form->createView()
      ));
  }

  /**
   * @Route("/restaurante/web/App_dev.php/producto/editar/{id}", name="Producto_Editar")
   */
  public function EditarAction($id, Request $request)
  {
    $producto = $this->getDoctrine()
      ->getRepository('AppBundle:producto')
      ->Find($id);

      $producto->setNombreProducto($producto->getNombreProducto());
      $producto->setCantidad($producto->getCantidad());
      $producto->setPrecio($producto->getPrecio());

      $form = $this->createFormBuilder($producto)
      ->add('NombreProducto', TextType::class, array('attr' => array('class'=>'form-control','style'=>'margin-bottom:15px')))
      ->add('Cantidad', TextareaType::class, array('attr' => array('class'=>'form-control','style'=>'margin-bottom:15px')))
      ->add('Precio', TextareaType::class, array('attr' => array('class'=>'form-control','style'=>'margin-bottom:15px')))
      ->add('Guardar', SubmitType::class, array('label' => 'Actualizar Cancha','attr' => array('class'=>'btn btn-primary','style'=>'margin-bottom:15px')))
      ->getForm();

      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
        // Get Datos
        $nom = $form['NombreProducto']->getData();
        $cant = $form['Cantidad']->getData();
        $prec = $form['Precio']->getData();

        $em = $this->getDoctrine()->getManager();
        $producto = $em->getRepository('AppBundle:producto')->find($id);

        $producto->setNombreProducto($nom);
        $producto->setCantidad($cant);
        $producto->setPrecio($prec);

        $em->flush();

        $this->addFlash(
          'Notice',
          'Producto Actualizado'
        );

        return $this->redirectToRoute('Productos');
      }

    return $this->render('Producto/editar.html.twig', array(
      'producto' => $producto,
      'form' => $form->createView()
    ));
  }

  /**
     * @Route("/restaurante/web/App_dev.php/producto/detalle/{id}", name="Producto_Detalle")
     */
  public function DetalleAction($id)
  {
    $producto = $this->getDoctrine()
      ->getRepository('AppBundle:producto')
      ->Find($id);
    return $this->render('Producto/detalle.html.twig', array(
      'producto' => $producto
    ));
  }
}

<?php

namespace Symblog\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PageController extends Controller
{
    public function indexAction() 
    {
        return $this->render('SymblogBlogBundle:Page:index.html.twig');
    }

    public function aboutAction() 
    {
        return $this->render('SymblogBlogBundle:Page:about.html.twig');
    }
    
   public function contactAction()
   {
       return $this->render('SymblogBlogBundle:Page:contact.html.twig');
   }
     
    
}

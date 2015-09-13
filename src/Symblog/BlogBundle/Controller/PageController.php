<?php

namespace Symblog\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PageController extends Controller
{
    public function convertCurrencyAction($currency_from, $currency_to, $currency_input)
    {
        $yql_base_url = "http://query.yahooapis.com/v1/public/yql";
        $yql_query = 'select * from yahoo.finance.xchange where pair in ("'.$currency_from.$currency_to.'")';
        $yql_query_url = $yql_base_url . "?q=" . urlencode($yql_query);
        $yql_query_url .= "&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
        $yql_session = curl_init($yql_query_url);
        curl_setopt($yql_session, CURLOPT_RETURNTRANSFER,true);
        $yqlexec = curl_exec($yql_session);
        $yql_json =  json_decode($yqlexec,true);
	var_dump($yql_json);
        $data = $yql_json['query'];
        print_r($data);
    }
    public function indexAction() 
    {
        $currency_input = 100;
        //currency codes : http://en.wikipedia.org/wiki/ISO_4217
        $currency_from = "RUB";
        $currency_to = "PLN";
        $this->convertCurrencyAction($currency_from, $currency_to, $currency_input);
        
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

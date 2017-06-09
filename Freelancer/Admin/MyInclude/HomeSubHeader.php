

<?php							/**================================================================================||
								||      *Developer : Green Cubes Solutions										   ||
								||      *Website   : www.greencubes.co.in										   ||
								||      *Date      : 25-11-2014													   ||
								||																				   ||
								||      *  NOTICE OF LICENSE  *													   ||
								|| 																				   ||
								|| 																				   ||
								||		   This source file is subject to the Company Copyright 				   ||
								||		   and its use by any other party without concern of Greencubes        	   ||
								||  	   or trying to sell this code will be considered illegal 				   ||
								||		   and any legal actions can be undertaken.								   ||
								||		   If you want to receive a copy of the license, please send an email      ||
								||  	   to info@greencubes.co.in, for further procedure						   ||
								||=================================================================================**/    ?>   

<?php
/**
 *
 * @Create Breadcrumbs Trail.
 *
 * @copyright Copyright (C) 2008 PHPRO.ORG. All rights reserved.
 *
 * @version //autogentag//
 *
 * @license new bsd http://www.opensource.org/licenses/bsd-license.php
 *
 * @filesource
 *
 * @package Breadcrumbs
 *
 * @Author Kevin Waterson
 *
 */

class breadcrumbs{

    /*
     * @string $breadcrumbs
     */
    public $breadcrumbs;

    /*
     * @string $pointer
     */
    private $pointer = '&raquo;';

    /*
     * @string $url
     */
    private $url;

    /*
     * @array $parts
     */
    private $parts;


    /*
     * @constructor - duh
     *
     * @access public
     *
     */
    public function __construct()
    {
        $this->setParts();
        $this->setURL();
        $this->breadcrumbs = '<a href="'.AdminUrl.'">Dashboard</a>';
    }


    /*
     *
     * @set the base url
     *
     * @access private
     *
     */
    private function setURL()
    {
        $protocol = $_SERVER["SERVER_PROTOCOL"]=='HTTP/1.1' ? 'http' : 'https';
        $this->url = $protocol.'://'.$_SERVER['HTTP_HOST'];
    }


    /*
     * @set the pointer 
     *
     * @access public
     *
     * @param string $pointer
     * 
     */
    public function setPointer($pointer)
    {
        $this->pointer = $pointer;
    }


    /**
     *
     * @set the path array
     *
     * @access private
     *
     * @return array
     *
     */
    private function setParts()
    {
        $parts = explode('/', $_SERVER['REQUEST_URI']);
        array_pop($parts);
        array_shift($parts);
    $this->parts = $parts;
    }


    /**
     *
     * @create the breadcrumbs
     *
     * @access public
     *
      */
    public function crumbs()
    {	$i = '0';
        foreach($this->parts as $part)
        {
			  $this->url .= "/$part";
			if($i > 2)
			{
          		
            $this->breadcrumbs .= " $this->pointer ".'<a href="'.$this->url.'">'.$part.'</a>';
			}
        $i++;}
    }

} /*** end of class ***/

?>





<?php

/*** a new breadcrumbs object ***/
$bc = new breadcrumbs();

/*** set the pointer if you like ***/
$bc->setPointer('&nbsp; > &nbsp;');

/*** create the trail ***/
echo $bc->crumbs();

/*** output ***/

	

?>

<div class="crumbs">
					<ul id="breadcrumbs" class="breadcrumb">
						
							<i class="icon-home"></i>
								<?php 	echo $bc->breadcrumbs; ?>		
						
						
					</ul>
					
					<ul class="crumb-buttons">
						
										
						<li class=""><a href="#"><i class="icon-calendar"></i>Today's 	 :<?php echo date("d,M,Y"); ?>
							
							<span></span>
						</a></li>
					</ul>
				</div>
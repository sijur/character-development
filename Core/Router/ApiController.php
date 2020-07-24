<?php


namespace Core\Router;

use Core\Router\MatchRoute;
use Core\Strings\Strings;


class ApiController extends MatchRoute
{
    public function __construct( $url )
    {
        parent::__construct( $url );
    }

    public function setup()
    {
        parent::setup();
        $this->dispatch( self::$url );
    }

    protected function dispatch( $url )
    {
        $strings = new Strings();

//        $url = $strings::removeQueryStringVariables( $url );

        if ( $this->matchRoute( $url ) )
        {
            $data = json_decode($_POST['data']);

        }
    }
}
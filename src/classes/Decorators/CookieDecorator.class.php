<?php

class CookieDecorator implements Controller
{
    private $_controller;

    public function __construct(Controller $controller){

        $this->_controller = $controller;

        Cookie::create('test')
            ->setValue('1')
            ->setMaxAge(3600)
            ->httpSet();
    }

    public function handleRequest(HttpRequest $request) {
        $request->setAttachedVar('cookieSupported', (bool)count($request->getCookie()));
        return $this->_controller->handleRequest($request);
    }

}

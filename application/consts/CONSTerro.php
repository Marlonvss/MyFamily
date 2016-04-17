<?php

class CONSTerro {
    public $erro;
    public $mensagem;
    public $class;
    public $method;
    
    function __construct($_erro = false, $_mensagem = '', $_class = '', $_method = '') {
        $this->erro = (boolean)$_erro;
        $this->mensagem = (string)$_mensagem;
        $this->class = (string)$_class;
        $this->method = (string)$_method;
    }
    
}

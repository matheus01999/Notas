<?php

namespace App\Controller;
use App\Model\Nota;

Class NotaController {

    public function salvarNota(){
        $nota = new Nota();
        $nota->__set('descricao', $_POST['descricao']);
        $nota->adicionar();

    }

}
?>
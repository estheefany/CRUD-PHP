<?php

namespace models;

class Leitor extends Model {

    protected $table = "leitores";
    #nao esqueça da ID
    protected $fields = ["id","usuario_id", "livro_id"];
   
}



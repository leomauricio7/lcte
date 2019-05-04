<?php

class Licitacao {
    //pega todas os tipos de licitaçeos
    public static function getTipoLicitacoes(){
        $read = new Read();
        $read->ExeRead('edital_tipo', 'ORDER BY id DESC');
        return $read->getResult();
    }
    //pega todos os anos das licitações
    public static function getAnos(){
        $read = new Read();
        $read->ExeRead('edital_anos', 'ORDER BY id DESC');
        return $read->getResult();
    }
    //pega todos os status das licitações
    public static function getStatus(){
        $read = new Read();
        $read->ExeRead('edital_situacao', 'ORDER BY id DESC');
        return $read->getResult();
    }
    //pega as 5 ultimas licitações
    public static function getFiveLicitacoes($options = null){
        $read = new Read();
        $read->getLicitacoes("ORDER BY e.created ASC $options");
        return $read->getResult();
    }
    //pega as licitações por tipo
    public static function getLicitacoesPorTipo($options,$limit=null){
        $read = new Read();
        $read->getLicitacoes("$options ORDER BY e.created ASC $limit");
        return $read->getResult();
    }
    //get name tipo Licitacao
    public static function getNameTipo($pasta){
        $read = new Read();
        $read->ExeRead('edital_tipo','where pasta = "'.$pasta.'"');
        foreach($read->getResult() as $dados){
            extract($dados);
            return $tipo;
        }
    }
    //pega 1 licitação
    public static function getFindOneLicitacao($options){
        $read = new Read();
        $read->getLicitacoes("where e.id = $options LIMIT 1");
        return $read->getResult();
    }
    //pega todos os recurso de uma licitação
    public static function getRecursosLicitacao($edital){
        $read = new Read();
        $read->ExeRead('edital_recursos', "where id_edital = $edital");
        return $read->getResult();
    }
    //pega todos as analises de recursos de uma licitação
    public static function getAnaliseRecursosLicitacao($edital){
        $read = new Read();
        $read->ExeRead('edital_analise_recursos', "where id_edital = $edital");
        return $read->getResult();
    }
    //pega todos os extratos de uma licitação
    public static function getExtratoLicitacao($edital){
        $read = new Read();
        $read->ExeRead('edital_extratos', "where id_edital = $edital");
        return $read->getResult();
    }
    //pega todos os ARP's de uma licitação
    public static function getARPLicitacao($edital){
        $read = new Read();
        $read->ExeRead('edital_arps', "where id_edital = $edital");
        return $read->getResult();
    }
    //pega todos os ARP's de uma licitação
    public static function getDocumentosLicitacao($edital){
        $read = new Read();
        $read->ExeRead('edital_documentos', "where id_edital = $edital");
        return $read->getResult();
    }
    //pesqusiar editais por filtros de pesquisa
    public static function filtrosSearch($ano,$tipo,$status){
        $read = new Read();
        $read->getLicitacoes("where e.ano = $ano and el.pasta = '$tipo' and e.id_situacao = $status");
        return $read->getResult();
    }
    //pesqusiar editais por filtros de pesquisa
    public static function filtrosSearchTags($tags){
        $read = new Read();
        $read->getLicitacoes("where e.tags LIKE '%$tags%'");
        return $read->getResult();
    }

}
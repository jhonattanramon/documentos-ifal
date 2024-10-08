<?php

namespace App\Services;

use App\Models\Unidade;
use Illuminate\Support\Facades\DB;

class DocumentoQuery{

    public function evolucaoEnviados($dataInicio = null, $dataFim = null){
        $sql = "SELECT trim(t.ano_mes) as ano_mes, trim(t.mes_ano_abrev) as mes_ano_abrev,
        COUNT(DISTINCT(d.id)) as enviados
        FROM tempo t
        LEFT OUTER JOIN documentos d on TO_CHAR(d.data_envio,'YYYYMM') = t.ano_mes
        WHERE t.data_atual between '20181101' and CURRENT_DATE ";
        
        if($dataInicio)
            $sql = $sql." and t.data_atual >= '".$dataInicio."'";
        
        if($dataFim)
            $sql = $sql." and t.data_atual <= '".$dataFim."'";
        
        $sql = $sql." GROUP BY t.ano_mes, t.mes_ano_abrev
        ORDER BY t.ano_mes";
        
        $result = DB::select($sql);

        return $result;
    }

    public function evolucaoEnviados6Meses(){
        $result = DB::select("SELECT trim(t.ano_mes) as ano_mes , trim(t.mes_ano_abrev) as mes_ano_abrev,
        COUNT(DISTINCT(d.id)) as enviados
        FROM tempo t
        LEFT OUTER JOIN documentos d on TO_CHAR(d.data_envio,'YYYYMM') = t.ano_mes
        WHERE (CURRENT_DATE - t.data_atual) between 0 and 180 and t.data_atual >= '20181101'
        GROUP BY t.ano_mes, t.mes_ano_abrev
        ORDER BY t.ano_mes");

        return $result;
    }

    public function countEnviados30dias(){
        $sql = "SELECT
            COUNT(DISTINCT(d.id)) as enviados
            FROM tempo t
            LEFT OUTER JOIN documentos d on TO_CHAR(d.data_envio,'YYYYMM') = t.ano_mes ";

        if( auth()->user()->isAssessor()){
            $unidade = Unidade::find(auth()->user()->unidade_id);
            $sql = $sql." LEFT OUTER JOIN unidades u ON u.id = d.unidade_id and u.estado_id = ".$unidade->estado_id;
        }
        
        $sql = $sql." WHERE (CURRENT_DATE - t.data_atual) between 0 and 30";
        
        $result = DB::select( $sql );

        return $result[0]->enviados;
    }

    public function documentosPorTipos(){
        $result = DB::select("SELECT 
            t.nome, 
            count(*) as total,
            (100*count(*)/(select count(t.id) from documentos d inner join tipo_documentos t on t.id = d.tipo_documento_id))as percent
        from documentos d
        inner join tipo_documentos t on t.id = d.tipo_documento_id
        group by t.nome
        limit 10
        ");

        return $result;
    }

    public function documentosPorAssuntos(){
        $result = DB::select("SELECT 
            a.nome, 
            count(*) as total,
            (100*count(*)/(select count(a.id) from documentos d inner join assuntos a on a.id = d.assunto_id))as percent
        from documentos d
            inner join assuntos a on a.id = d.assunto_id
        group by a.nome
        limit 10
        ");

        return $result;
    }

    public function documentosDownloads(){
        $result = DB::select("
        SELECT u.sigla, u.friendly_url, u.nome unidade, dd.id, dd.titulo,dd.numero, dd.arquivo, dd.ementa, dd.ano, dd.data_publicacao, count(*) as downloads FROM downloads d 
            INNER JOIN documentos dd ON dd.id = d.documento_id
            INNER JOIN unidades u ON u.id = dd.unidade_id
            GROUP BY u.sigla, unidade, friendly_url, dd.id, dd.titulo,dd.numero, dd.arquivo, dd.ementa, dd.ano, dd.data_publicacao
            ORDER BY count(*) DESC
            LIMIT 20
        ");

        return $result;
    }

    public function documentosDownloadsByUnidade($unidadeId){
        
        $sql = "SELECT u.sigla, u.friendly_url, u.nome unidade, dd.id, dd.titulo,dd.numero, dd.arquivo, a.id as assunto_id, a.nome as assunto, dd.ementa, dd.ano, dd.data_publicacao, count(*) as downloads 
        FROM downloads d INNER JOIN documentos dd ON dd.id = d.documento_id
        INNER JOIN unidades u ON u.id = dd.unidade_id
        INNER JOIN assuntos a ON a.id = dd.assunto_id
        INNER JOIN tipo_documentos t ON t.id = dd.tipo_documento_id
         WHERE u.id = ? GROUP BY u.sigla, unidade, friendly_url, dd.id, dd.titulo,dd.numero, dd.arquivo, assunto, dd.ementa, dd.ano, dd.data_publicacao, a.id
        ORDER BY count(*) DESC
        LIMIT 20";

        $result = DB::select($sql,[$unidadeId]);

        return $result;
    }
}
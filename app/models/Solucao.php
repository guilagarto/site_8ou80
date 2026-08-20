<?php
// app/models/Solucao.php
require_once dirname(__DIR__) . '/config/database.php';

class Solucao {
    // Busca todas as soluções ordenadas
    public static function listarTodas() {
        $conexao = Database::conectar();
        
        $sql = "SELECT * FROM solucoes ORDER BY ordem ASC, titulo ASC";
        $resultado = $conexao->query($sql);
        
        $solucoes = [];
        if ($resultado && $resultado->num_rows > 0) {
            while ($linha = $resultado->fetch_assoc()) {
                $solucoes[] = $linha;
            }
        }
        
        $conexao->close();
        return $solucoes;
    }
}

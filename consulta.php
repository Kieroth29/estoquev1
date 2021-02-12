<?php  

if (isset($_GET["codigo"])) {
    $codigo = $_GET["codigo"];
    
    if (empty($codigo)) {
        $sql = "SELECT * FROM produtos";
    } else {
        $codigo .= "%";
        $sql = "SELECT * FROM produtos WHERE cod like '$codigo'";
    }
    $result = mysqli_query($link,$sql);
    $cont = mysqli_affected_rows($link);
    if ($cont > 0) {
       $tabela = "<table border='1'>
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Descrição do produto</th>
                            <th>Código de barras</th>
                            <th>Referência</th>
                            <th>Marca</th>
                            <th>ID da marca</th>
                            <th>Gênero</th>
                            <th>ID do gênero</th>
                            <th>Subgênero</th>
                            <th>ID do subgênero</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>";
        $return = "$tabela";
        while ($linha = mysqli_fetch_array($result)) {
            $return.= "<td>" . utf8_encode($linha["cod"]) . "</td>";
            $return.= "<td>" . utf8_encode($linha["descprod"]) . "</td>";
            $return.= "<td>" . utf8_encode($linha["barcode"]) . "</td>";
            $return.= "<td>" . utf8_encode($linha["ref"]) . "</td>";
            $return.= "<td>" . utf8_encode($linha["marca"]) . "</td>";
            $return.= "<td>" . utf8_encode($linha["idmarca"]) . "</td>";
            $return.= "<td>" . utf8_encode($linha["gen"]) . "</td>";
            $return.= "<td>" . utf8_encode($linha["idgen"]) . "</td>";
            $return.= "<td>" . utf8_encode($linha["subgen"]) . "</td>";
            $return.= "<td>" . utf8_encode($linha["idsubgen"]) . "</td>";
            $return.= "</tr>";
        }
        echo $return.="</tbody></table>";
    } else {
        echo "Produto não encontrado.";
    }
}

?>
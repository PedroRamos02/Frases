<?php

function encontrarPalavras($frase) {
    $palavras = explode(" ", $frase);
    $maiorPalavra = $palavras[0]; 
    $menorPalavra = $palavras[0]; 

    foreach ($palavras as $palavra) {
        $palavra = preg_replace('/[^\p{L}\p{N}\s]/u', '', $palavra);
        
        if (strlen($palavra) > strlen($maiorPalavra)) {
            $maiorPalavra = $palavra;
        }
        
        if (strlen($palavra) < strlen($menorPalavra)) {
            $menorPalavra = $palavra;
        }
    }
    
    return array("maiorPalavra" => $maiorPalavra, "menorPalavra" => $menorPalavra);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $frase = $_POST["frase"];
    $resultado = encontrarPalavras($frase);
    
    echo "Frase: " . $frase . "<br>";
    echo "Maior palavra: " . $resultado["maiorPalavra"] . "<br>";
    echo "Menor palavra: " . $resultado["menorPalavra"] . "<br>";
}

?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="frase">Digite uma frase:</label><br>
    <textarea id="frase" name="frase" rows="4" cols="50"></textarea><br>
    <input type="submit" value="Enviar">
</form>

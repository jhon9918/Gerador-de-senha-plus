<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Senha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="gerador.css">
</head>

<body>

    <header class="text-center">
        <h1 class="p-5">Gerador de Senha</h1>
    </header>

    
    

    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-4 text-center">
                <h1>Gere aqui a sua senha:</h1>
                <form action="" method="get">
                    <label for="qntd">Informe a quantidade de caracteres desejada:</label> <br><br>
                    <input type="number" name="quantidade" id="qntd" value="14" class="center numtam" min="1" max="20"
                        required> <br>
                    <br>

                    <div class="row justify-content-center">
                        <div class="col-md-7">
                            <div class="text-start">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo" id="flexRadioDefault1"
                                        value="numeros" required>
                                    <label class="form-check-label space" for="flexRadioDefault1">
                                        Apenas Números
                                    </label>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" name="tipo" id="flexRadioDefault2"
                                        value="alfanumerico">
                                    <label class="form-check-label space" for="flexRadioDefault2">
                                        Alfanumérico
                                    </label>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" name="tipo" id="flexRadioDefault3"
                                        value="alfanumerico_simbolos" checked>
                                    <label class="form-check-label space" for="flexRadioDefault3">
                                        Alfanumérico com símbolos
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class=" but">Gerar Senha</button>
                </form>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <?php
        if (isset($_GET["quantidade"]) && isset($_GET["tipo"])) {
            $tamanho = (int)$_GET["quantidade"];
            $tipo = $_GET["tipo"];

            function gerarSenha($tamanho, $tipo) {
                if ($tipo == "numeros") {
                    $caracteres = '0123456789';
                } elseif ($tipo == "alfanumerico") {
                    $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                } else {
                    $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+-=[]{}|;:,.<>?';
                }

                $senha = '';
                for ($i = 0; $i < $tamanho; $i++) {
                    $senha .= $caracteres[rand(0, strlen($caracteres) - 1)];
                }

                return $senha;
            }

            $senhaGerada = gerarSenha($tamanho, $tipo);

            echo '<div class="text-center">';
            echo "<h3>Sua senha gerada é:</h3>";
            echo "<p id='senhaGerada'><strong>$senhaGerada</strong></p>"; 
            echo '<button type="button" onclick="copiarSenha()" class="but">Copiar Senha</button>';
            echo '<button type="button" onclick="window.location.href=window.location.pathname" class="but">Limpar Tudo</button>';
            echo '</div>';
        }
        ?>
    </div>

    <script>
        function copiarSenha() {

            var senha = document.getElementById("senhaGerada").innerText;


            navigator.clipboard.writeText(senha).then(function () {
                alert("Senha copiada para a área de transferência!");
            }).catch(function (err) {
                alert("Erro ao copiar a senha: " + err);
            });
        }
    </script>

</body>

</html>
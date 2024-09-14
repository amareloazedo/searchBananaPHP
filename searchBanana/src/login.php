<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $host   = "localhost";
    $bd     = "testes_01";
    $user   = "root";
    $pass   = "";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$bd", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $emailPDO = $row['email'];
            $senhaPDO = $row['senha'];

            if ($senha == $senhaPDO) {
                session_start();
                $_SESSION['email'] = $emailPDO;
                header("Location: sistema.php");
                exit();
            } else {
                // Senha incorreta
                echo '<!DOCTYPE html>
                <html lang="pt-br">
                    <head>
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <link rel="stylesheet" href="css/bootstrap.min.css">
                        <link rel="stylesheet" href="css/style.css">
                        <link rel="stylesheet" href="css/login.css">
                        <title>Aula Bootstrap de David</title>
                    </head>
                    <body class="text-center">
                        <form method="post" class="form-signin" action="login.php">
                          <img class="mb-4" src="imgs/logo.png" alt="" width="72" height="72">
                          <h1 class="h3 mb-3 font-weight-normal">Faça login</h1>
                          <label for="inputEmail" class="sr-only">Endereço de email</label>
                          <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Seu email" required autofocus>
                          <label for="inputPassword" class="sr-only">Senha</label>
                          <input type="password" id="inputPassword" class="form-control" name="senha" placeholder="Senha" required>
                          <div class="checkbox mb-3">
                            <label>
                              <input type="checkbox" value="remember-me"> Lembrar de mim
                            </label>
                          </div>
                          <button class="btn btn-lg btn-savage btn-block" type="submit">Login</button>
                          <p class="mt-5 mb-3 text-muted">&copy; Los Bananas Maduros - 2023</p>
                        </form>

                        <!--modal-->
                
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Launch demo modal
                  </button>
                  
                  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="TituloModalCentralizado">Erro de Conexão</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                       !Senha incorreta!
                        </div>
                        <div class="modal-footer">
                          <a href="login.html" type="button" class="btn btn-primary">Retornar</a>
                        </div>
                      </div>
                    </div>
                  </div>
                
                        <script src="js/jquery-3.3.1.slim.min.js"></script>
                        <script src="js/popper.min.js"></script>
                        <script src="js/bootstrap.min.js"></script>
                        <script src="js/script.js"></script>
                        <script>
                            $("#modal").modal("show")
                        </script>
                    </body>
                </html>';
            }
        } else {
            echo '<!DOCTYPE html>
            <html lang="pt-br">
                <head>
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <link rel="stylesheet" href="css/bootstrap.min.css">
                    <link rel="stylesheet" href="css/style.css">
                    <link rel="stylesheet" href="css/login.css">
                    <title>Aula Bootstrap de David</title>
                </head>
                <body class="text-center">
                    <form method="post" class="form-signin" action="login.php">
                      <img class="mb-4" src="imgs/logo.png" alt="" width="72" height="72">
                      <h1 class="h3 mb-3 font-weight-normal">Faça login</h1>
                      <label for="inputEmail" class="sr-only">Endereço de email</label>
                      <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Seu email" required autofocus>
                      <label for="inputPassword" class="sr-only">Senha</label>
                      <input type="password" id="inputPassword" class="form-control" name="senha" placeholder="Senha" required>
                      <div class="checkbox mb-3">
                        <label>
                          <input type="checkbox" value="remember-me"> Lembrar de mim
                        </label>
                      </div>
                      <button class="btn btn-lg btn-savage btn-block" type="submit">Login</button>
                      <p class="mt-5 mb-3 text-muted">&copy; Los Bananas Maduros - 2023</p>
                    </form>

                    <!--modal-->
            
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Launch demo modal
              </button>
              
              <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="TituloModalCentralizado">Erro de Conexão</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                   !Email incorreto!
                    </div>
                    <div class="modal-footer">
                      <a href="login.html" type="button" class="btn btn-primary">Retornar</a>
                    </div>
                  </div>
                </div>
              </div>
            
                    <script src="js/jquery-3.3.1.slim.min.js"></script>
                    <script src="js/popper.min.js"></script>
                    <script src="js/bootstrap.min.js"></script>
                    <script src="js/script.js"></script>
                    <script>
                        $("#modal").modal("show")
                    </script>
                </body>
            </html>';
        }

    } catch (PDOException $e) {  
      
      echo '<!DOCTYPE html>
      <html lang="pt-br">
          <head>
              <meta charset="utf-8">
              <meta name="viewport" content="width=device-width, initial-scale=1">
              <link rel="stylesheet" href="css/bootstrap.min.css">
              <link rel="stylesheet" href="css/style.css">
              <link rel="stylesheet" href="css/login.css">
              <title>Aula Bootstrap de David</title>
          </head>
          <body class="text-center">
              <form method="post" class="form-signin" action="login.php">
                <img class="mb-4" src="imgs/logo.png" alt="" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Faça login</h1>
                <label for="inputEmail" class="sr-only">Endereço de email</label>
                <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Seu email" required autofocus>
                <label for="inputPassword" class="sr-only">Senha</label>
                <input type="password" id="inputPassword" class="form-control" name="senha" placeholder="Senha" required>
                <div class="checkbox mb-3">
                  <label>
                    <input type="checkbox" value="remember-me"> Lembrar de mim
                  </label>
                </div>
                <button class="btn btn-lg btn-savage btn-block" type="submit">Login</button>
                <p class="mt-5 mb-3 text-muted">&copy; Los Bananas Maduros - 2023</p>
              </form>

              <!--modal-->
      
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
          Launch demo modal
        </button>
        
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="TituloModalCentralizado">Erro de Conexão</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
             Erro: ' . $e->getMessage() . '
              </div>
              <div class="modal-footer">
                <a href="login.html" type="button" class="btn btn-primary">Retornar</a>
              </div>
            </div>
          </div>
        </div>
      
              <script src="js/jquery-3.3.1.slim.min.js"></script>
              <script src="js/popper.min.js"></script>
              <script src="js/bootstrap.min.js"></script>
              <script src="js/script.js"></script>
              <script>
                  $("#modal").modal("show")
              </script>
          </body>
      </html>';
    }

} else {
  echo '<!DOCTYPE html>
  <html lang="pt-br">
      <head>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="css/bootstrap.min.css">
          <link rel="stylesheet" href="css/style.css">
          <link rel="stylesheet" href="css/login.css">
          <title>Aula Bootstrap de David</title>
      </head>
      <body class="text-center">
          <form method="post" class="form-signin" action="login.php">
            <img class="mb-4" src="imgs/logo.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Faça login</h1>
            <label for="inputEmail" class="sr-only">Endereço de email</label>
            <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Seu email" required autofocus>
            <label for="inputPassword" class="sr-only">Senha</label>
            <input type="password" id="inputPassword" class="form-control" name="senha" placeholder="Senha" required>
            <div class="checkbox mb-3">
              <label>
                <input type="checkbox" value="remember-me"> Lembrar de mim
              </label>
            </div>
            <button class="btn btn-lg btn-savage btn-block" type="submit">Login</button>
            <p class="mt-5 mb-3 text-muted">&copy; Los Bananas Maduros - 2023</p>
          </form>

          <!--modal-->
  
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
      Launch demo modal
    </button>
    
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="TituloModalCentralizado">Erro de Conexão</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
         Você não possue permissão para acessar o site
          </div>
          <div class="modal-footer">
            <a href="login.html" type="button" class="btn btn-primary">Retornar</a>
          </div>
        </div>
      </div>
    </div>
  
          <script src="js/jquery-3.3.1.slim.min.js"></script>
          <script src="js/popper.min.js"></script>
          <script src="js/bootstrap.min.js"></script>
          <script src="js/script.js"></script>
          <script>
              $("#modal").modal("show")
          </script>
      </body>
  </html>';
}

?>
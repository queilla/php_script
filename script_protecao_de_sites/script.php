

<?php

//ESSE CODIGO VALE PRA OUTRAS LINGUAGENS DE PROGRAMAÇÃO TAMBÉM!

//Validação de entrada de dados:

/*Este código serve para validar a entrada de dados fornecida pelos usuários antes de processá-las no site.
 Ele usa uma expressão regular para verificar se a entrada consiste apenas em letras e números alfanuméricos,
  garantindo que não haja caracteres especiais ou maliciosos que possam ser usados em ataques de injeção de código.
   Se a entrada não corresponder à expressão regular, o código exibe uma mensagem de erro ao usuário.
   */

if(!preg_match("/^[a-zA-Z0-9]*$/", $input)) {
    // entrada inválida, exibir mensagem de erro
  } else {
    // entrada válida, continuar processamento
  }


  //Autenticação e autorização:

  /*Este código serve para garantir que apenas usuários autenticados e autorizados possam acessar determinadas páginas
   ou funcionalidades do site. Ele verifica se o usuário está autenticado (ou seja, se fez login com sucesso) 
   e se tem as permissões necessárias para acessar a página ou funcionalidade solicitada. 
   Se o usuário não estiver autenticado ou não tiver as permissões necessárias,
   o código redireciona o usuário para a página de login ou exibe uma mensagem de erro */

  session_start();
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  // usuário não autenticado, redirecionar para página de login
  header("Location: login.php");
  exit;
}


//Proteção contra Cross-site scripting (XSS):

/*Este código serve para evitar ataques de injeção de código, como o XSS. 
Ele usa a função htmlspecialchars() para converter caracteres especiais em seus equivalentes HTML,
 garantindo que eles não sejam interpretados como código em um navegador.
  Isso ajuda a prevenir a execução de código malicioso que possa ser injetado em um site. */

echo htmlspecialchars($input, ENT_QUOTES, 'UTF-8');



//Proteção contra Cross-site request forgery (CSRF):

    /*Este código serve para evitar ataques de falsificação de solicitação entre sites, também conhecidos como CSRF. 
    Ele gera um token aleatório exclusivo para cada sessão do usuário e inclui esse token como um campo oculto em formulários.
     Quando o formulário é enviado, o código verifica se o token incluído no formulário é o mesmo que foi gerado para a sessão do usuário.
      Isso ajuda a prevenir ataques que tentam enganar o usuário para enviar informações maliciosas sem o seu conhecimento. 
      CÓDIGO ABAIXO COMENTADO! */


   /* session_start();
    $token = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] = $token;
    // incluir token no formulário
    <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
    // verificar token no processamento do formulário
    if(!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
      // token inválido, exibir mensagem de erro
    } else {
      // token válido, continuar processamento
    }
     */



    

?>

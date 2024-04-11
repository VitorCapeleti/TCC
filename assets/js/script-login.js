// Obtém o botão "Criar nova conta"
var criarContaButton = document.querySelector('.criar-conta');

// Obtém o menu flutuante
var menuFlutuante = document.getElementById('menu-flutuante');

// Obtém o corpo da página
var body = document.querySelector('body');

// Adiciona um ouvinte de evento de clique ao botão "Criar nova conta"
criarContaButton.addEventListener('click', function(event) {
  event.preventDefault(); // Evita o comportamento padrão do botão (submit do formulário)

  // Exibe o menu flutuante
  menuFlutuante.style.display = 'block';

  // Adiciona a classe para desfocar o fundo da página
  body.classList.add('blur-background');

  // Adiciona a classe para desfocar os elementos da página, exceto o menu flutuante
  var elementsToBlur = document.querySelectorAll('body > *:not(.inscription)');
  elementsToBlur.forEach(function(element) {
    element.classList.add('blur-elements');
  });
});

// Obtém o ícone "x" do menu flutuante
var fecharIcone = menuFlutuante.querySelector('.fa-xmark');

// Adiciona um ouvinte de evento de clique ao ícone "x" do menu flutuante para fechá-lo
fecharIcone.addEventListener('click', function() {
  // Oculta o menu flutuante
  menuFlutuante.style.display = 'none';

  // Remove a classe para remover o desfoque do fundo da página
  body.classList.remove('blur-background');

  // Remove a classe para remover o desfoque dos elementos da página, exceto o menu flutuante
  var elementsToBlur = document.querySelectorAll('body > *:not(.inscription)');
  elementsToBlur.forEach(function(element) {
    element.classList.remove('blur-elements');
  });
});

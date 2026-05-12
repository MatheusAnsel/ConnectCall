
// mostrar senha
function showHide() {
  if (senha.type === 'password') {
    senha.setAttribute('type', 'text');
    icon.classList.add('hide')
  }
  else {
    senha.setAttribute('type', 'password');
    icon.classList.remove('hide')
  }
}
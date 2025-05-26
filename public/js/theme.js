//local storage esta aca 
//  public/js/theme.js  (reemplázalo todo)
document.addEventListener('DOMContentLoaded', () => {
    const body   = document.body;
    const toggle = document.getElementById('theme-toggle'); // puede NO existir

    // — Aplicar lo guardado —
    const savedTheme = localStorage.getItem('theme') ?? 'light';
    if (savedTheme === 'dark') body.classList.add('dark-mode');
    else                       body.classList.remove('dark-mode');

    // Si el interruptor existe, ajústalo y registra el listener
    if (toggle){
        toggle.checked = savedTheme === 'dark';

        toggle.addEventListener('change', () => {
            if (toggle.checked){
                body.classList.add('dark-mode');
                localStorage.setItem('theme','dark');
            }else{
                body.classList.remove('dark-mode');
                localStorage.setItem('theme','light');
            }
        });
    }
});

function toggleTheme() {
    const toggle = document.getElementById('theme-toggle');
    const isDark = toggle.checked;

    if (isDark) {
        document.body.classList.add('dark-mode');
        document.body.classList.remove('light-mode');
        localStorage.setItem('theme', 'dark');
    } else {
        document.body.classList.add('light-mode');
        document.body.classList.remove('dark-mode');
        localStorage.setItem('theme', 'light');
    }
}

import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();



document.getElementById('help-open').addEventListener('click', function() {
    document.getElementById('help-open').classList.add('hidden');
    document.getElementById('help').classList.remove('hidden');
  });

  document.getElementById('help-close').addEventListener('click', function() {
    document.getElementById('help-open').classList.remove('hidden');
    document.getElementById('help').classList.add('hidden');
  })

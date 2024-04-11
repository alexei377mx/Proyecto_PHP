 // Obtener referencia al botón de búsqueda
 const searchButton = document.getElementById('searchButton');

 // Escuchar el evento de clic en el botón de búsqueda
 searchButton.addEventListener('click', function() {
     // Obtener el valor del input de búsqueda
     const searchTerm = document.getElementById('searchInput').value;

     // Redirigir a la página de resultados de búsqueda con el término de búsqueda como parámetro
     window.location.href = 'resultados_busqueda.php?search=' + encodeURIComponent(searchTerm);
 });
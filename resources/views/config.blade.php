@extends('app', [
    'title' => 'Configuració - Naterra'
])


  <div class="config-form" style="z-index:999">
    <h2>Configuració</h2>

    <form>
      <div class="setting">
        <label for="so">So</label>
        <label class="switch">
          <input type="checkbox" id="so" checked>
          <span class="slider"></span>
        </label>
      </div>

      <div class="setting">
        <label for="musica">Música</label>
        <label class="switch">
          <input type="checkbox" id="musica" checked>
          <span class="slider"></span>
        </label>
      </div>

      <div class="setting">
        <label for="idioma">Idioma</label>
        <select id="idioma" class="language-select">
          <option value="ca" selected>Català</option>
          <option value="es">Castellà</option>
        </select>
      </div>
    </form>
  </div>

  <script src="app.js"></script>
</body>
</html>
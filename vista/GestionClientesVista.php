<h2>Gestión de Clientes</h2>

<?php if (isset($usuarios) && $usuarios): ?>
  <div class="tabla-contenedor">
    <table class="tabla-usuarios">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Edad</th>
          <th>Nick</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($usuarios as $usuario): ?>
          <tr>
            <td><?php echo htmlspecialchars($usuario['id']); ?></td>
            <td><?php echo htmlspecialchars($usuario['nombre']); ?></td>
            <td><?php echo htmlspecialchars($usuario['edad']); ?></td>
            <td><?php echo htmlspecialchars($usuario['nick_usuario']); ?></td>
            <td>
              <?php if ($usuario['nick_usuario'] != "admin"): ?>
                <form method="post" action="gestionClientes.php" onsubmit="return confirm('¿Seguro que quieres eliminar este usuario?');">
                  <input type="hidden" name="accion" value="eliminar">
                  <input type="hidden" name="id" value="<?php echo htmlspecialchars($usuario['id']); ?>">
                  <button type="submit">Eliminar</button>
                </form>
              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<?php else: ?>
  <p>No hay usuarios registrados.</p>
<?php endif; ?>

<p><a href="index.php">Volver al panel</a></p>
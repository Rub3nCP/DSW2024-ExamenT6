<?php $__env->startSection('title', 'Empresas'); ?>

<?php $__env->startSection('content'); ?>

<!-- formulario -->

<form class="warning" action="/companies/<?php echo e($companyToEdit->getId()); ?>" method="POST">
  <input type="hidden" name="_method" value="put">
  <legend>Modificar Empresa</legend>
  <label for="name">Nombre:</label>
  <input type="text" id="name" name="name" required placeholder="<?php echo e($companyToEdit->getName()); ?>">
  <br>
  <label for="contact_info">Correo de Contacto:</label>
  <input type="email" id="contact_info" name="contact_info" required placeholder="<?php echo e($companyToEdit->getContactInfo()); ?>">
  <div>
      <button class="success">Guardar Cambios</button>
      <input type="reset" name="" id="" class="button alert" value="Restaurar">
      <a href="/companies" class="button">Descartar</a>
  </div>
</form>

<!-- listado de empresas -->

  <?php if( count($companies) ): ?>
  <h2>Listado de empresas</h2>
  <table>
    <!-- cabecera -->
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Correo de Contacto</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <!-- cuerpo -->
    <tbody>
    <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>    
        <td><?php echo e($company->getId()); ?></td>
        <td><?php echo e($company->getName()); ?></td>
        <td><?php echo e($company->getContactInfo()); ?></td>
        <td>

          <a href="/companies/<?php echo e($company->getId()); ?>/edit"><button  class="warning">Editar</button></a>
          <form class="frmBtn inline" action="/companies/<?php echo e($company->getId()); ?>" method="post">
            <input type="hidden" name="_method" value="delete">
            <input type="submit" value="Borrar" class="alert">
          </form>
        </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
  <?php else: ?>
    <h2>No hay compañias</h2>
  <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
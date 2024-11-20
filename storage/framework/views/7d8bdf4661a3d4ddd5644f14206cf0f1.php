<button type="<?php echo e($type); ?>" <?php echo e($attributes->merge(['class' => "btn btn-{$theme}"])); ?>>
    <!--[if BLOCK]><![endif]--><?php if(isset($icon)): ?> <i class="<?php echo e($icon); ?>"></i> <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]--><?php if(isset($label)): ?> <?php echo e($label); ?> <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</button>
<?php /**PATH D:\SEMESTRE_1_2024\TALLER_DE_GRADO_1\taller_grado\vendor\jeroennoten\laravel-adminlte\src/../resources/views/components/form/button.blade.php ENDPATH**/ ?>
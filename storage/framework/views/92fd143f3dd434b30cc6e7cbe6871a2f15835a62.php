<?php $__env->startSection('content'); ?>

    <main>
        <h1>Пользователи</h1>

        <?php
        echo "<div class='table'>";
        echo "<table>";
        echo "<tr><th>id</th><th>name</th><th>nickname</th><th>email</th><th>role</th></tr>";
        foreach ($users as $key => $value) {
        echo "<tr>";
        echo "<td> <div>" . $value->id . "</div> </td>";
        echo "<td> <div>" . $value->name . "</div> </td>";
        echo "<td> <div>" . $value->nickname . "</div> </td>";
        echo "<td> <div>" . $value->email . "</div> </td>";
        echo "<td> <div>" . $value->role . "</div> </td>";
        echo "<td>";
        ?>
        <submit class="btn btn-default btn-sm"><a
                    href="<?php echo e(route('isAdmin', ['id' => $value->id])); ?>"
                    class="glyphicon glyphicon-user"></a></submit>

        <?php
        echo " </td>";
        echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        ?>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminLayouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
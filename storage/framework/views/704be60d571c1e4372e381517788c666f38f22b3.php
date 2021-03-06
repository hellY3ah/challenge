<?php $__env->startSection('style'); ?>
    <?php echo e(HTML::style('css/Admin/adminViewQuests.css')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <main>
        <h1>Список квестов</h1>

        <submit class="btn btn-default btn-sm"><a href="<?php echo e(route('admin_add_quest')); ?>"
                                                  class="glyphicon glyphicon-plus"></a></submit>
        <?php
        echo "<div class='table'>";
        echo "<table>";
        echo "<tr><th>id</th><th>name</th><th>description</th><th>fullDescription</th><th>hard</th><th>author</th><th>date</th><th>time</th><th>sts</th></tr>";
        foreach ($quests as $key => $value) {
        echo "<tr>";
        echo "<td> <div>" . $value->id . "</div> </td>";
        echo "<td> <div>" . $value->name . "</div> </td>";
        echo "<td class='description'> <div >" . $value->description . "</div> </td>";
        echo "<td class='description'> <div >" . $value->fullDescription . "</div> </td>";
        echo "<td> <div>" . $value->hard . "</div> </td>";
        echo "<td> <div >" . $value->author . "</div> </td>";
        echo "<td class='date'> <div>" . $value->date . "</div> </td>";
        echo "<td> <div>" . $value->time . "</div> </td>";
        echo "<td> <div >" . $value->status . "</div> </td>";
        echo "<td> ";
        ?>
        <submit class="btn btn-default btn-sm"><a href="<?php echo e(route('editQuest', $value->id)); ?>"
                                                  class="glyphicon glyphicon-pencil"></a></submit>
        <submit class="btn btn-default btn-sm"><a href="<?php echo e(route('deleteQuest', $value->id)); ?>"
                                                  class="glyphicon glyphicon-trash"></a></submit>
        <submit class="btn btn-default btn-sm"><a href="<?php echo e(route('showTasksByQuest', $value->id)); ?>"
                                                  class="glyphicon glyphicon-th-list"></a></submit>
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
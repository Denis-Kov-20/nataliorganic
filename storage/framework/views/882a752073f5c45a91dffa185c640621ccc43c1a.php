<?php
    if($dataTypeContent->{$row->field}){
        $old_parameters = json_decode($dataTypeContent->{$row->field});
    }
    $end_id = 0;
?>


<div class="custom-parameters">
<?php if($dataTypeContent->{$row->field}): ?>
    <?php $__currentLoopData = $old_parameters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parameter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="form-group row" row-id="<?php echo e($loop->index); ?>">
            <div class="col-xs-3" style="margin-bottom:0;">
                <input type="text" class="form-control" name="<?php echo e($row->field); ?>[<?php echo e($loop->index); ?>][key]" value="<?php echo e($parameter->key); ?>" id="key"/>
            </div>
            <div class="col-xs-3" style="margin-bottom:0;">
                <input type="text" class="form-control" name="<?php echo e($row->field); ?>[<?php echo e($loop->index); ?>][value]" value="<?php echo e($parameter->value); ?>" id="value"/>
            </div>
            
            <div class="col-xs-1" style="margin-bottom:0;">
                <button type="button" class="btn btn-xs" style="margin-top:0px;"><i class="voyager-trash"></i></button>
            </div>
        </div>
        <?php 
            $end_id = $loop->index + 1;
        ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
    <div class="form-group row" row-id="<?php echo e($end_id); ?>">
        <div class="col-xs-3" style="margin-bottom:0;">
            <input type="text" class="form-control" name="<?php echo e($row->field); ?>[<?php echo e($end_id); ?>][key]" value="" id="key"/>
        </div>
        <div class="col-xs-3" style="margin-bottom:0;">
            <input type="text" class="form-control" name="<?php echo e($row->field); ?>[<?php echo e($end_id); ?>][value]" value="" id="value"/>
        </div>
        <div class="col-xs-1" style="margin-bottom:0;">
            <button type="button" class="btn btn-success btn-xs" style="margin-top:0px;"><i class="voyager-plus"></i></button>
        </div>
    </div>

    <input type="hidden" name="keyvaluejson" value="<?php echo e($row->field); ?>"/>
</div>



<script>

    function editNameCount(el){
        var str = el.getAttribute('name');
        var old_id = parseInt(el.parentNode.parentNode.getAttribute('row-id'));
        new_str = str.substring(0,str.indexOf('[')+1)
                    + (old_id+1)
                    + str.substring(str.indexOf(']'), str.length);
        return(new_str);
    }

    function addRow(){
        var new_row = this.parentNode.parentNode.cloneNode(true);
        
        new_row.querySelector("#key").setAttribute('name', editNameCount(new_row.querySelector("#key")));
        new_row.querySelector("#key").value = '';
        new_row.querySelector("#value").setAttribute('name', editNameCount(new_row.querySelector("#value")));
        new_row.querySelector("#value").value = '';
        new_row.setAttribute('row-id', parseInt(this.parentNode.parentNode.getAttribute('row-id'))+1)
        
        this.classList.remove('btn-success');
        this.innerHTML = '<i class="voyager-trash"></i>';
        new_row.querySelector('.btn-success').onclick = this.onclick;
        this.onclick = removeRow;
        this.parentNode.parentNode.parentNode.appendChild(new_row);
    };

    function removeRow() {
        this.parentNode.parentNode.remove();
    }

    var buttons = document.querySelectorAll('.custom-parameters .btn');
    for (var i = 0; i < buttons.length; i++) buttons[i].onclick = removeRow;
    var suc_buttons = document.querySelectorAll('.custom-parameters .btn-success');
    suc_buttons[suc_buttons.length - 1].onclick = addRow;
    
</script>


<?php /**PATH /Users/macpro/Sites/nataliorganic.loc/vendor/ext-bread-fields-fix/src/../resources/views/formfields/key_value_json.blade.php ENDPATH**/ ?>
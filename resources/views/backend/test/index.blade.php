<div class="row mb-3">
    <div class="col-12 col-sm-4">
        <div class="form-group">
            <?php
            $field_name = 'name';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        
            
        </div>
    </div>
</div>
<label class="" style="font-size:20px">test</label>
<input type="text" class="form-control" placeholder="test" name="test">
<button type="button" class="btn btn-primary" name="" style="margin-top:10px; position:relative; margin-left:50%" onclick="alert('test')">test</button>

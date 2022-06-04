@extends('backend.layouts.app')

@section('title') {{ __($module_action) }} {{ __($module_title) }} @endsection

@section('breadcrumbs')
<x-backend-breadcrumbs>
    <x-backend-breadcrumb-item type="active">{{ __($module_title) }}</x-backend-breadcrumb-item>
</x-backend-breadcrumbs>
@endsection

@section('content')
<div class="card mb-4 ">
    <div class="card-body">
        <x-backend.section-header>
        {{ __($module_title) }} <small class="text-muted">{{ __($module_action) }}</small>

        <x-slot name="subtitle">
            @lang(":module_name Management Dashboard", ['module_name'=>Str::title($module_name)])
        </x-slot>
    </x-backend.section-header>

    <hr>

        {{-- {{ html()->form('POST', route("backend.$module_name"))->acceptsFiles()->class('form')->open() }} --}}
        <!-- Dashboard Content Area -->
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
        
        <!-- / Dashboard Content Area -->

    </div>
</div>
<!-- / card -->



@endsection
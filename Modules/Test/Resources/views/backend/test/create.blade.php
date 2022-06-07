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
        <x-slot name="toolbar">
            <x-buttons.return-back />
        </x-slot>
    </x-backend.section-header>

    <hr>

        {{-- {{ html()->form('POST', route("backend.$module_name"))->acceptsFiles()->class('form')->open() }} --}}
        <!-- Dashboard Content Area -->
        <div class="row mb-3">
            {{-- <div class="col-12 col-sm-4">
                <div class="form-group">
                    
                    {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                    {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
                
                    
                </div>
            </div> --}}
            <form action="{{ route("backend.$module_name.store") }}" method="POST">
                @csrf
              
                 <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top:10px">
                        <div class="form-group">
                            <strong>Detail:</strong>
                            <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top:10px">
                        <div class="form-group">
                            <strong>Image:</strong>
                            <input type="file" name="image" class="form-control" placeholder="image">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin-top:10px">
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
               
            </form>
        </div>
        
        <!-- / Dashboard Content Area -->

    </div>
</div>
<!-- / card -->



@endsection
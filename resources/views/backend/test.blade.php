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

        {{ html()->form('POST', route("backend.$module_name"))->acceptsFiles()->class('form')->open() }}
        <!-- Dashboard Content Area -->
        @include("backend.test.index")
        <!-- / Dashboard Content Area -->

    </div>
</div>
<!-- / card -->



@endsection
@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    @include('components.hero')
    
    <!-- About Section -->
    @include('components.about')
    
    <!-- Skills Section -->
    @include('components.skills')
    
    <!-- Projects Section -->
    @include('components.projects')
    
    <!-- Contact Section -->
    @include('components.contact')
@endsection
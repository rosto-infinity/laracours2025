{{-- resources/views/admin/services/index-services.blade.php --}}

@extends('layouts.admin.layout-admin')
@section('content')
   <!--==================== SERVICES ====================-->
        <section class="services" id="services">
            <div class="titlebar">
                <h1>Services</h1>
                <button class="open-modal">New Service</button>
            </div>

        <!-- Affichage des messages flash -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('delete-success'))
            <div class="alert alert-warning">
                {{ session('delete-success') }}
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif    
@include('admin.services.create-services')
            <div class="table">
                <div class="table-filter">
                    <div>
                        <ul class="table-filter-list">
                            <li>
                                <p class="table-filter-link link-active">All</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="table-search">
                    <div>
                        <select class="search-select" name="" id="">
                            <option value="">Filter Service</option>
                        </select>
                    </div>
                    <div class="relative">
                        <input class="search-input" type="text" name="search" placeholder="Search Service...">
                    </div>
                </div>
                
                <div class="service_table-heading">
                    <p>Title</p>
                    <p>Icon</p>
                    <p>Description</p>
                    <p>Actions</p>
                </div>
              
                @foreach ($services as $service )
                    
                <div class="service_table-items">
                        <p> {{ $service->name }}  </p>
                        <button class="service_table-icon">
                            <i class="{{ $service->icon }}"></i>
                        </button>
                        <p>
                            {{ $service->description }}
                        </p>
                        <div class="flex">
                            <a href="{{ route('edit-service', $service->id) }}">
                                <button class="btn-icon success">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                            </a>
                            
                            
                            <form action="{{ route('destroy-service', $service->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-icon danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce média ?')">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                           
                        </div>
                </div>
                @endforeach
            </div>
            {{-- {{ $service->links }} --}}
        </section>

@endsection

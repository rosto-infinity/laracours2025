{{-- resources/views/admin/services/index-services.blade.php --}}

@extends('layouts.admin.layout-admin')
@section('content')
    <!--==================== SERVICES ====================-->
    <section class="services" id="services">
        <div class="titlebar">
            <h1>Services</h1>
            <button class="open-modal">New Service</button>
        </div>

        <!-- -Affichage des messages flash -->
        <!-- Affichage des messages flash avec Tailwind CSS -->
        @if (session('success'))
            <div class="p-2.5 text-xl mb-4 rounded bg-green-100 text-green-800 border-l-4 border-green-500">
                {{ session('success') }}
            </div>
        @endif

        @if (session('delete-success'))
            <div class="p-2.5 mb-4 text-xl  rounded bg-yellow-100 text-yellow-800 border-l-4 border-yellow-500">
                {{ session('delete-success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="p-2.5 mb-4 text-xl  rounded bg-red-100 text-red-800 border-l-4 border-red-500">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
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
             <form method="get" action="{{ route('index-service') }}">
                <div class="table-search">
                    <div>
                        <select class="search-select " name="" id="">
                            <option value="">Filter Service</option>
                        </select>
                    </div>
                    <div class="flex gap-5 ml-2 relative">

                        <input class="" type="text" name="name" placeholder="Rechercher le titre de service..."
                            value="{{ Request::get('name') }}">
                        <button class="min-w-30 h-12 ">Recherche</button>
                        <a href="{{ url('/admin/services') }}">
                            <button class="min-w-30 h-12">Réinitialiser</button>
                        </a>
                    </div>
                </div>
            </form>  

                <div class="service_table-heading">
                    <p>Title</p>
                    <p>Icon</p>
                    <p>Description</p>
                    <p>Actions</p>
                </div>

                @foreach ($services as $service)
                    <div class="service_table-items">
                        <p> {{ $service->name }} </p>
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
                                <button type="submit" class="btn-icon danger"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce média ?')">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </form>

                        </div>

                    </div>
                @endforeach  
                
            </div>
            
            
            
        </section>
        
        <div class=" bg-amber-300 justify-center items-center  h-20 z-10 relative  inline-flex rtl:flex-row-reverse shadow-sm rounded-md">
            {{-- {{ $services->links() }} --}}
        </div>


@endsection

@extends('layouts.admin.layout-admin')

@section('content')
    <!--==================== MEDIAS SETTING ====================-->
    <section class="setting" id="setting">
        <div class="setting-wrapper">

            @include('layouts.admin.nav-admin')

            <div class="card-wrapper" style="margin-top:-5px">
                <div class="wrapper_left">
                    <div class="card">
                        <h2>Social media</h2>
                        
                        <!-- Message de confirmation -->
                        @if(session('delete-success'))
                            <div class="alert alert-success">
                                {{ session('delete-success') }}
                            </div>
                        @endif
                <!-- Messages flash -->
                    @if(session('success'))
                        <div class="bg-green-200 text-green-700 p-2">
                            {{ session('success') }}
                        </div>
                    @endif

                        <div class="social_table-heading">
                            <p>Link</p>
                            <p>Icon</p>
                            <p>Actions</p>
                        </div>
                        
                        <!-- Liste des médias -->
                        @foreach ($medias as $media)
                            <div class="social_table-items">
                                <p>{{ $media->link }}</p>
                                <button class="service_table-icon">
                                    <i class="{{ $media->icon }}"></i>
                                </button>
                                
                                <!-- Formulaire de suppression -->
                                <form action="{{ route('destroy-media', $media->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce média ?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        @endforeach

                        <br>

                        @include('admin.medias.form-medias')
                    </div>
                </div>
                <div class="wrapper_right hidden">
                </div>
            </div>

        </div>
    </section>

    <!-- Style supplémentaire -->
    <style>
        .delete-form {
            display: inline;
        }
        .alert-success {
             background: #f3bfc4;
            color: rgb(251, 0, 0);
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
        }
        .danger {
            background: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }
        .danger:hover {
            background: #c82333;
        }
    </style>
@endsection

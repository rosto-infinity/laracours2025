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
                        <div class="social_table-heading">
                            <p>Link</p>
                            <p>Icon</p>
                            <p></p>
                        </div>
                        <!-- item 1 -->
                        @foreach ($medias as $media)
                            <div class="social_table-items">
                                <p> {{ $media->link }}</p>
                                <button class="service_table-icon">
                                    <i class=" {{ $media->icon }}"></i>
                                </button>
                                <button class=" danger">
                                    delete
                                </button>
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
@endsection
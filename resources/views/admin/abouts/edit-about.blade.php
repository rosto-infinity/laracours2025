@extends('layouts.admin.layout-admin')

@section('content')

    <!--==================== ABOUT ====================-->
 <section class="setting" id="setting">
    <div class="setting-wrapper">
                    
            @include('layouts.admin.nav-admin')           
        
            <section class="about" id="about">
                <form action="{{ route('update-about', $about->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH') 
                @include('admin.abouts.form-about',['formMode' => 'edit'])
                </form>  
            </section>
    </div>
 </section>
@endsection
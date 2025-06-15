@extends('layouts.admin.layout-admin')
@section('content')

<section class="services bg-white p-5"  >

                    <form method="POST" action="{{ route('update-service',$service->id) }}">
                      @csrf
                      @method('PATCH')
                    <div>
                        <label>Nom du service</label>
                        <input type="text" name="name" value="{{ old('name', $service->name ?? '') }}"/>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <label>Classe de l'icône <span style="color:#006fbb;">(ex: "fa fa-user")</span></label>
                        <input type="text" name="icon" value="{{ old('icon', $service->icon ?? '') }}"/>
                        @error('icon')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <label>Description</label>
                        <textarea cols="10" rows="5" name="description">{{ old('description', $service->description ?? '') }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                     <button class="secondary close-modal">
                            <span><i class="fa fa-spinner fa-spin"></i></span>
                          Update
                        </button>

</form>




</section>
@endsection
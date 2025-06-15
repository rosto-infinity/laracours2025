@extends('layouts.admin.layout-admin')
@section('content')

        <!--==================== SERVICES ====================-->
        <section class="services" id="services">
            <div class="titlebar ">
                <h1>Services</h1>
                <button class="open-modal">New Service</button>
            </div>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
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
                <!-- item 1 -->
                
                @foreach ($services as $service)
                    
              
                  <div class="service_table-items">
                      <p>{{$service->name}}</p>
                      <button class="service_table-icon">
                          <i class="{{ $service->icon }}"></i>
                      </button>
                      <p>
                        {{ $service->description }}
                      </p>
                      <div>
                          <button class="btn-icon success">
                              <i class="fas fa-pencil-alt"></i>
                          </button>
                          <button class="btn-icon danger">
                              <i class="far fa-trash-alt"></i>
                          </button>
                      </div>
                  </div>
                @include('admin.services.edit-service',['FormMode'=> 'edit'])
                  @endforeach
            </div>

       
          
        </section>


@endsection

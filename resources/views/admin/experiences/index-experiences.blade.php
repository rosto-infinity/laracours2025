@extends('layouts.admin.layout-admin')


@section('content')
   <section class="experiences" id="experiences">
                <div class="titlebar">
                    <h1>Experiences </h1>
                    <button class="open-modal">New Experience</button>
                </div>
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
                                <option value="">Filter Experience</option>
                            </select>
                        </div>
                        <div class="relative">
                            <input class="search-input" type="text" name="search" placeholder="Search Experience...">
                        </div>
                    </div>
                    <div class="experience_table-heading">
                        <p>Company</p> 
                        <p>Period</p>
                        <p>Position</p>
                        <p>Actions</p>
                    </div>
                    <!-- item 1 -->
                    <div class="experience_table-items">
                        <p>Backend Developer Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, accusamus repellat totam nam vero eius quo ut similique reprehenderit sapiente?</p>
                        <p>Backend Developer</p>
                        <p>Backend Developer</p>
                        <div>
                            <button class="btn-icon success">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button class="btn-icon danger" >
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>

                </div>
                
                <!-------------- EXPERIENCE MODAL --------------->
                <div class="modal" >
                    <div class="modal-content">
                        <h2>Create Experience</h2>
                        <span class="close-modal">×</span>
                        <hr>
                        <div>
                            <p>Company</p>
                            <input type="text" />

                            <p>Periodggggggggggggggggggggggggggggggggggggggggg</p>
                            <input type="text" />

                            <p>Position</p>
                            <input type="text" />
                        </div>
                        <hr>
                        <div class="modal-footer">
                            <button class="close-modal">Cancel</button>
                            <button class="secondary close-modal">
                                <span><i class="fa fa-spinner fa-spin"></i></span>Save
                            </button>
                        </div>
                    </div>
                </div>
            </section>
       
@endsection
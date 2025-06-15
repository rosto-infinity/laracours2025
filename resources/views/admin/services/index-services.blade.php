@extends('layouts.admin.layout-admin')
@section('content')

 <main>

        <!--==================== SERVICES ====================-->
        <section class="services" id="services">
            <div class="titlebar">
                <h1>Services</h1>
                <button class="open-modal">New Service</button>
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
                <div class="service_table-items">
                    <p>Backend Developer</p>
                    <button class="service_table-icon">
                        <i class=" fas fa-pencil-alt"></i>
                    </button>
                    <p>Sapiente odit ut ipsam neque dolorum et. Officiis error dicta pariatur quidem. Saepe dignissimos
                        et at error dolores asperiores. Earum id sed ratione ducimus enim voluptate praesentium.
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
                <!-- item 2 -->
                <div class="service_table-items">
                    <p>Backend Developer</p>
                    <button class="service_table-icon">
                        <i class=" fas fa-pencil-alt"></i>
                    </button>
                    <p>Sapiente odit ut ipsam neque dolorum et. Officiis error dicta pariatur quidem. Saepe dignissimos
                        et at error dolores asperiores. Earum id sed ratione ducimus enim voluptate praesentium.
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

            </div>

            <!-------------- SERVICES MODAL --------------->
            <div class="modal ">
                <div class="modal-content">
                    <h2>Create Service</h2>
                    <span class="close-modal">×</span>
                    <hr>
                    <div>
                        <label>Service Name</label>
                        <input type="text" />

                        <label>Icon Class <span style="color:#006fbb;">(Find your suitable icon: Font
                                Awesome)</span></label>

                        <input type="text" />

                        <label>Description</label>
                        <textarea cols="10" rows="5"></textarea>
                    </div>
                    <hr>
                    <div class="modal-footer">
                        <button class="close-modal">
                            Cancel
                        </button>
                        <button class="secondary close-modal">
                            <span><i class="fa fa-spinner fa-spin"></i></span>
                            Save
                        </button>
                    </div>

                </div>
            </div>

            <div class="main-modal " :class="showModal ? 'show' : ''">
                <div class="modal">
                    <h2>
                        <span v-if="editMode">Edit </span>
                        <span v-else>Create </span> Service
                    </h2>
                    <span @click="closeModal">×</span>
                    <hr>
                    <div>
                        <label>Service Name</label>
                        {{-- <small style="color: red" v-if="errors.name"><span>{{errors.name}}</span></small> --}}
                        <input type="text" v-model="form.name" />

                        <label>Icon Class <span style="color:#006fbb;">(Find your suitable icon: Font
                                Awesome)</span></label>
                        {{-- <small style="color: red" v-if="errors.icon"><span>{{errors.icon}}</span></small> --}}
                        <input type="text" v-model="form.icon" />

                        <label>Description</label>
                        {{-- <small style="color: red" v-if="errors.description"><span>{{errors.description}}</span></small> --}}
                        <textarea cols="10" rows="5" v-model="form.description"></textarea>
                    </div>
                    <hr>
                    <div class="modal-footer">
                        <button @click="closeModal">Cancel</button>
                        <button class="secondary" @click="handleSave">
                            <span><i class="fa fa-spinner fa-spin" aria-hidden="true" v-if="isSubmit"></i></span>
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection

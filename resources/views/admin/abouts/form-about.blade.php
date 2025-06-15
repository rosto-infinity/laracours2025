<div class="titlebar">
    <h1>About Me</h1>
    <button class="secondary p-2.5">
        {{ $formMode === 'edit' ? 'Update' : 'Create' }}
        <i class="fas fa-save"></i> 
    </button>
</div>

@if ($errors->any())
    <div class="text-red-500">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div 
        x-data="{ show: true }" 
        x-init="setTimeout(() => show = false, 3500)" 
        x-show="show"
        x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="opacity-0 translate-y-4 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 scale-95"
        class="flex items-center gap-3 text-green-900 bg-green-100 border border-green-400 rounded-lg shadow-lg mb-4 p-4 max-w-lg text-xl font-semibold transition-all duration-500 ease-out"
        role="alert"
    >
        <svg class="w-7 h-7 text-green-500 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2.5" fill="none"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12l2.5 2.5L16 9" stroke="currentColor" stroke-width="2.5"/>
        </svg>
        <span>{{ session('success') }}</span>
    </div>
@endif

<div class="card-wrapper">
    <div class="wrapper_left">
        <div class="card">
            <label>Full Name</label>
            <input type="text" 
                name="name"
                value="{{ old('name', $about->name ?? '') }}"
                placeholder="Enter your full name" 
            >
            @error('name')
                <span class="text-red-500">{{ $message }}</span>     
            @enderror

            <label>Email</label>
            <input type="email"
                name="email"
                value="{{ old('email', $about->email ?? '') }}"
                placeholder="Enter your email address">
            @error('email')
                <span class="text-red-500">{{ $message }}</span>
            @enderror

            <label>Phone</label>
            <input type="text"
                name="phone"
                value="{{ old('phone', $about->phone ?? '') }}"
                placeholder="Enter your phone number">
            @error('phone')
                <span class="text-red-500">{{ $message }}</span>                          
            @enderror

            <label>Address</label>
            <input type="text" 
                name="address"  
                value="{{ old('address', $about->address ?? '') }}"
                placeholder="Enter your address">
            @error('address')
                <span class="text-red-500">{{ $message }}</span>  
            @enderror

            <label>Description</label>
            <textarea cols="10" rows="3" name="description">{{ old('description', $about->description ?? '') }}</textarea>
            @error('description')
                <span class="text-red-500">{{ $message }}</span>                        
            @enderror
        </div>

        <div class="card">
            <label>Tagline</label>
            <input type="text"
                name="tagline"
                value="{{ old('tagline', $about->tagline ?? '') }}"
                placeholder="Enter your tagline">
            @error('tagline')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="wrapper_right">
        <div class="card">
            <label for="home_image" class="block mb-2 text-lg font-semibold text-white bg-[#22c55e] p-2 rounded-lg">Home Image</label>
            <img src="{{ isset($about->home_image) ? asset('storage/images/' . $about->home_image) : asset('template/assets/img/avatar.jpg') }}" class="avatar_img" id="homeImage-preview" alt="Home Image Preview">
            <input 
                accept="image/*" 
                type="file" 
                id="home_image"
                name="home_image"
                onchange="showHomeImageFile(event)"
                class="block w-full text-sm text-green-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:ring-green-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100 transition"
            />
        </div>

        <div class="card">
            <label for="banner_image" class="block mb-2 text-lg font-semibold text-white bg-[#22c55e] p-2 rounded-lg">Banner Image</label>
            <img src="{{ isset($about->banner_image) ? asset('storage/images/' . $about->banner_image) : asset('template/assets/img/avatar.jpg') }}" class="avatar_img" id="bannerImage-preview" alt="Banner Image Preview">
            <input 
                accept="image/*" 
                type="file" 
                id="banner_image"
                name="banner_image"
                onchange="showBannerImageFile(event)"
                class="block w-full text-sm text-green-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:ring-green-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100 transition"
            >
        </div>

        <div class="card">
            <label for="cv" class="block mb-2 text-lg font-semibold text-white bg-[#22c55e] p-2 rounded-lg">CV</label>
            <input 
                accept="application/pdf" 
                type="file" 
                id="cv"
                name="cv"
                placeholder="Upload your CV"
                class="block w-full text-sm text-green-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:ring-green-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100 transition mb-2"
            >
            @if(isset($about->cv) && $about->cv)
                <p>
                    <a href="{{ asset('storage/cvs/' . $about->cv) }}" target="_blank">Voir le CV actuel</a>
                </p>
            @endif
        </div>
    </div>
</div>

<script>
    function showHomeImageFile (event) {
        let input = event.target;
        let reader = new FileReader();
        reader.onload = function() {
            let dataURL = reader.result;
            let output = document.getElementById('homeImage-preview');
            output.src = dataURL;
        };
        reader.readAsDataURL(input.files[0]);
    }

    function showBannerImageFile (event) {
        let input = event.target;
        let reader = new FileReader();
        reader.onload = function() {
            let dataURL = reader.result;
            let output = document.getElementById('bannerImage-preview');
            output.src = dataURL;
        };
        reader.readAsDataURL(input.files[0]);
    }
</script>
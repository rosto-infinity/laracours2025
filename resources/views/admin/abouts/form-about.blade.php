<div class="titlebar">
   
                    <h1>About Me</h1>
                    <button class="secondary">
                        {{ $formMode === 'edit' ? 'Update' : '' }}
                        <i class="fas fa-save"></i>
                    </button>
                </div>
                
               

                <div class="card-wrapper">
                    <div class="wrapper_left">
                        <div class="card" >
                            <label>Full Name</label>
                            <input type="text" 
                              name="name"
                            value="{{ isset($about->name) ? $about->name : '' }}"
                            placeholder="Enter your full name" 
                            >
            
                            <label>Email</label>
                            <input type="email"
                            name="email"
                            value="{{ isset($about->email) ? $about->email : '' }}"
                            placeholder="Enter your email address">
            
                            <label>Phone</label>
                            <input type="text"
                            name="phone"
                            value="{{ isset($about->phone) ? $about->phone : '' }}"
                            placeholder="Enter your phone number">
            
                            <label>Address</label>
                            <input type="text" 
                            name="address"  
                            value="{{ isset($about->address) ? $about->address : '' }}"
                            placeholder="Enter your address">
            
                            <label>Description</label>
                            <textarea cols="10" rows="3"  >
                            {{ isset($about->description) ? $about->description : '' }}
                            </textarea>
                        </div>
                        <div class="card">
                            <label>Tagline</label>
                            <input type="text" accept="image/*"
                            name="tagline"
                            value="{{ isset($about->tagline) ? $about->tagline : '' }}"
                            placeholder="Enter your tagline">
                        </div>
                        
                    </div>
                    <div class="wrapper_right">
                        <div class="card">
                            <label for="home_image">Home Image</label>
                            <img src="
                                {{ 
                                   
                                    !empty($about->home_image) ?
                                     asset('storage/images/'.$about->home_image) :
                                      asset('template/assets/images/avatar.jpg') 
                                      
                                }}"
                                class="avatar_img"
                                id="homeImage-preview"
                                alt="Home Image Preview">
                            <input accept="image/*" type="file" id="home_image"
                                name="home_image"
                                onchange="showHomeImageFile(event)">
                        </div>
                        <div class="card">
                            <label for="banner_image">Banner Image</label>
                            <img src="
                                {{ 
                                    isset($about->banner_image) ? 
                                    asset('images/'.$about->banner_image) :
                                    asset('template/assets/images/banner_image.png')
                                }}"
                                class="avatar_img"
                                id="bannerImage-preview"
                                alt="Banner Image Preview">
                            <input accept="image/*" type="file" id="banner_image"
                                name="banner_image"
                                onchange="showBannerImageFile(event)">
                        </div>
                        <div class="card">
                            <label for="cv">CV</label>
                            <input accept="application/pdf" type="file" id="cv"
                                name="cv"
                                placeholder="Upload your CV">
                            @if(isset($about->cv) && $about->cv)
                                <p>
                                    <a href="{{ asset('images/'.$about->cv) }}" target="_blank">Voir le CV actuel</a>
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
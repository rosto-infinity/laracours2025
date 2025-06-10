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
                            <label for="name">Full Name</label>
                            <input type="text" id="name"
                            name="name"
                            value="{{ isset($about->name) ? $about->name : '' }}"
                            placeholder="Enter your full name" 
                            >
            
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email"
                            value="{{ isset($about->email) ? $about->email : '' }}"
                            placeholder="Enter your email address">
            
                            <label for="phone">Phone</label>
                            <input type="text" id="phone"
                            name="phone"
                            value="{{ isset($about->phone) ? $about->phone : '' }}"
                            placeholder="Enter your phone number">
            
                            <label for="address">Address</label>
                            <input type="text" id="address"
                            name="address"
                            value="{{ isset($about->address) ? $about->address : '' }}"
                            placeholder="Enter your address">
            
                            <label for="description">Description</label>
                            <textarea cols="10" rows="3" id="description"
                            name="description"
                            value="{{ isset($about->description) ? $about->description : '' }}"
                            placeholder="Enter a brief description about yourself"                          
                            ></textarea>
                        </div>
                        <div class="card">
                            <label for="tagline">Tagline</label>
                            <input type="text" id="tagline"
                            name="tagline"
                            value="{{ isset($about->tagline) ? $about->tagline : '' }}"
                            placeholder="Enter your tagline"
                            >
                        </div>
                        
                    </div>
                    <div class="wrapper_right">
                        <div class="card">
                            <img src="../../template/assets/img/avatar.jpg" class="avatar_img">
                            <input type="file" id="home_image">
                        </div>
                        <div class="card">
                            <img src="../../template/assets/img/avatar.jpg" class="avatar_img">
                            <input type="file" id="banner_image">
                        </div>
                        <div class="card">
                            <p>CV</p>
                            <input type="file" id="cv">    
                        </div>     
                    </div>
                </div>
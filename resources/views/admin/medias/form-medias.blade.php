<form action="{{ route('store-media') }}" method="post" class="media-form">
    @csrf
    
    
    
    {{-- @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <div class="social_table-heading">
        <p>Link</p>
        <span style="color:#006fbb;">(Find your icon class: Font Awesome)</span>
    </div>
    
    <div class="social_table-items">
        <!-- Champ Link avec erreur -->
        <div>
            <input 
                type="text" 
                name="link" 
                value="{{ old('link') }}"
                placeholder="https://example.com"
            >
            @error('link')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

         <div>
              <!-- Champ Icon avec erreur -->
              <input 
                  type="text" 
                  name="icon" 
                  value="{{ old('icon') }}"
                  placeholder="fa-brands fa-facebook"
              >
              @error('icon')
                  <span class="text-red-500">{{ $message }}</span>
              @enderror
          </div>
        
        <button type="submit" class="submit-btn">
            Add Media
        </button>
    </div>
</form>

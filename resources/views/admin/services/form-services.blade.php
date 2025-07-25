    <!-------------- SERVICES MODAL --------------->
            <div class="modal ">
                <div class="modal-content">
                    <h2>{{ $FormMode === 'edit' ? 'Modifier le service' : 'Créer un service' }}</h2>
                    <span class="close-modal">×</span>
                    
                    <hr>

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

                    <hr>
           
                    <div class="modal-footer">
                        <button class="close-modal">
                            Cancel
                        </button>
                        <button class="secondary close-modal">
                            <span><i class="fa fa-spinner fa-spin"></i></span>
                           {{ $FormMode === 'edit' ? 'Update' : 'Save' }}
                        </button>
                    </div>

                </div>
            </div>
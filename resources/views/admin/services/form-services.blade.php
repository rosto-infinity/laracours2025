 <div class="modal">
                <div class="modal-content">
                    <h2>{{ $FormMode === 'edit' ? 'Edit'  :' Create Service' }}</h2>
                    <span class="close-modal">×</span>
                    <hr>
                    <div>
                        <label>Service Name</label>
                        <input type="text" name="name"/>

                        <label>Icon Class <span style="color:#006fbb;">(Find your suitable icon: Font
                                Awesome)</span></label>

                        <input type="text" name="icon"/>

                        <label>Description</label>
                        <textarea cols="10" rows="5" name="description"></textarea>
                    </div>
                    <hr>
                    <div class="modal-footer">
                        <button class="close-modal">
                            Cancel
                        </button>
                        <button class="secondary close-modal">
                            <span><i class="fa fa-spinner fa-spin"></i></span>
                            {{ $FormMode === 'edit' ? 'Update'  :' Save' }}
                        </button>
                    </div>

                </div>
   </div>
  

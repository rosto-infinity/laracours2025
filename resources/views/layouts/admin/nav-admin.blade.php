           <div class="setting_nav bg-amber-200">
                    <div class="setting-titlebar">
                        <img src="../../template/assets/img/avatar.jpg" alt="" class="setting-avatar">
                        <p>Natalia Brakux</p>
                    </div>
                    <nav class="nav">
                        <div class="nav-setting-wrapper">
                            <div class="nav-list">
                                <ul class="nav-list-item-setting">
                                    <li>
                                        <a aria-current="page" href="{{ route('edit-about') }}" 
                                        class="{{ (request()->is('admin/abouts'))  ? 'nav-active' : ''}}">
                                        <span><i class="fas fa-cog"></i></span><span>About Me</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav-list-item-setting">
                                    <li>
                                        <a aria-current="page" href="{{ route('index-media')}}"
                                         class="{{ (request()->is('admin/medias'))  ? 'nav-active' : ''}}">
                                         <span><i class="fas fa-cog"></i></span><span>My social media</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                
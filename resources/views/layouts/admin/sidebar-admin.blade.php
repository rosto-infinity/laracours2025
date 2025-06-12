<aside>
    <nav>
        <div class="nav-wrapper">
            <span class="nav__close">
                <i class="fas fa-window-close"></i>
            </span>
            <div class="nav-list">
                <ul>
                    <li>
                        <a  href="{{ route('home-page') }}">
                            <span><i class="fas fa-home"></i></span>
                            <span>Website Portfolio</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{(request()->is('admin/dashboard'))? 'nav-active' : ''}}" href="{{ route('dashboard.admin') }}">
                            <span><i class="fas fa-home"></i></span>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{(request()->is('admin/abouts'))? 'nav-active' : ''}}"
                         href="{{ route('edit-about') }}">
                            <span><i class="fas fa-user"></i></span>
                            <span>About Me</span>
                        </a>
                    </li>
                    <li>
                        <a href="service.html">
                            <span><i class="fas fa-concierge-bell"></i></span>
                            <span>Services</span>
                        </a>
                    </li>
                    <li>
                        <a href="skill.html">
                            <span><i class="fas fa-lightbulb"></i></span>
                            <span>Skills</span>
                        </a>
                    </li>
                    <li>
                        <a href="education.html">
                            <span><i class="fas fa-graduation-cap"></i></span>
                            <span>Educations</span>
                        </a>
                    </li>
                    <li>
                        <a href="experience.html">
                            <span><i class="fas fa-briefcase"></i></span>
                            <span>Experiences</span>
                        </a>
                    </li>
                    <li>
                        <a href="project.html">
                            <span><i class="fas fa-tasks"></i></span>
                            <span>Projects</span>
                        </a>
                    </li>
                    <li>
                        <a href="testimonial.html">
                            <span><i class="fas fa-comment-dots"></i></span>
                            <span>Testimonials</span>
                        </a>
                    </li>
                    <li>
                        <a href="message.html">
                            <span><i class="fas fa-envelope"></i></span>
                            <span>Messages</span>
                        </a>
                    </li>
                    <li>
                        <a href="user.html">
                            <span><i class="fas fa-users"></i></span>
                            <span>Users</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="nav-list">
                <ul>
                    <li>
                        <a href="setting.html">
                            <span><i class="fas fa-cog"></i></span>
                            <span>Settings</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</aside>
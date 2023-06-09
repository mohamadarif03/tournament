@php
    use App\Helpers\UserHelper;
    use App\Enums\UserRoleEnum;
    
@endphp
<div id="sticky-header" class="tg-header__area transparent-header">
    <div class="container custom-container">
        <div class="row">
            <div class="col-12">
                <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                <div class="tgmenu__wrap">
                    <nav class="tgmenu__nav">
                        <div class="logo">
                            <a href="index.html"><img src="{{ asset('assets/img/logo/logo.png') }}" alt="Logo"></a>
                        </div>
                        <div class="tgmenu__navbar-wrap tgmenu__main-menu d-none d-xl-flex">
                            <ul class="navigation">
                                <li class="{{ request()->routeIs('home') ? 'active' : '' }} menu-item-has-children">
                                    <a href="/">Home</a>
                                </li>
                                <li><a href="about-us.html">ABOUT US</a></li>
                                <li><a href="/teams">Team</a>
                                    
                                </li>
                                <li class="{{ request()->routeIs('tournaments') ? 'active' : '' }}"><a
                                        href="/tournaments">TOURNAMENT</a>
                                </li>
                                <li class="menu-item-has-children"><a href="#">News</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog.html">Our Blog</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">contact</a></li>
                            </ul>
                        </div>
                        <div class="tgmenu__action d-none d-md-block">
                            <ul class="list-wrap">
                                <li class="search"><a href="#"><i class="flaticon-loupe"></i></a></li>
                                <li class="header-btn">
                                    @if (Route::has('login'))
                                        @auth
                                            <a href="/dashboard" class="tg-btn-3 tg-svg">
                                                <div class="svg-icon" id="svg-2"
                                                    data-svg-icon="assets/img/icons/shape02.svg"></div>
                                                <span>Dashboard</span>
                                            </a>
                                        @else
                                            <a href="{{ route('login') }}" class="tg-btn-3 tg-svg">
                                                <div class="svg-icon" id="svg-2"
                                                    data-svg-icon="assets/img/icons/shape02.svg"></div>
                                                <i class="flaticon-edit"></i>
                                                <span>Login</span>
                                            </a>
                                        @endauth
                                    @endif
                                </li>
                                <li class="side-toggle-icon">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <!-- Mobile Menu  -->
                <div class="tgmobile__menu">
                    <nav class="tgmobile__menu-box">
                        <div class="close-btn"><i class="flaticon-swords-in-cross-arrangement"></i></div>
                        <div class="nav-logo">
                            <a href="index.html"><img src="assets/img/logo/logo.png" alt="Logo"></a>
                        </div>
                        <div class="tgmobile__search">
                            <form method="GET" action="{{ route('tournaments') }}">
                                <input type="search" value="{{ request()->input('search') ?? old('search') }}"
                                    id="inputSearch" placeholder="Cari Disini...">
                                <button type="submit"><i class="flaticon-loupe"></i></button>
                            </form>
                        </div>
                        <div class="tgmobile__menu-outer">
                            <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                        </div>
                        <div class="social-links">
                            <ul class="list-wrap">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="tgmobile__menu-backdrop"></div>
                <!-- End Mobile Menu -->
            </div>
        </div>
    </div>
</div>

<!-- header-search -->
<div class="search__popup-wrap">
    <div class="search__layer"></div>
    <div class="search__close">
        <span><i class="flaticon-swords-in-cross-arrangement"></i></span>
    </div>
    <div class="search__wrap text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="title">... <span>Search Here</span> ...</h2>
                    <div class="search__form">
                        <form>
                            <input type="search" name="search"
                                value="{{ request()->input('search') ?? old('search') }}" id="inputSearch"
                                placeholder="Cari Disini...">
                            <button class="search-btn"><i class="flaticon-loupe"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- header-search-end -->

<!-- offCanvas-area -->
<div class="offCanvas__wrap">
    <div class="offCanvas__body">
        <div class="offCanvas__top">
            <div class="offCanvas__logo logo">
                <a href="index.html"><img src="assets/img/logo/logo.png" alt="Logo"></a>
            </div>
            <div class="offCanvas__toggle">
                <i class="flaticon-swords-in-cross-arrangement"></i>
            </div>
        </div>
        <div class="offCanvas__content">
            <h2 class="title">Best Seller of Month Ideas for <span>NFT Wallet</span></h2>
            <div class="offCanvas__contact">
                <h4 class="small-title">CONTACT US</h4>
                <ul class="offCanvas__contact-list list-wrap">
                    <li><a href="tel:93332225557">+9 333 222 5557</a></li>
                    <li><a href="mailto:info@webmail.com">info@webmail.com</a></li>
                    <li>New Central Park W7 Street ,New York</li>
                </ul>
            </div>
            <div class="offCanvas__newsletter">
                <h4 class="small-title">Subscribe</h4>
                <form action="#" class="offCanvas__newsletter-form">
                    <input type="email" placeholder="Get News & Updates">
                    <button type="submit"><i class="flaticon-send"></i></button>
                </form>
                <p>Subscribe dolor sitamet, consectetur adiping eli. Duis esollici tudin augue.</p>
            </div>
            <ul class="offCanvas__social list-wrap">
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
            </ul>
        </div>
        <div class="offCanvas__copyright">
            <p>Copyright © 2023 - By <span>MYKD</span></p>
        </div>
    </div>
</div>
<div class="offCanvas__overlay"></div>
<!-- offCanvas-area-end -->

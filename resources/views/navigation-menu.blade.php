  <!-- Sidebar Start -->
  <aside class="left-sidebar with-vertical">
      <div>
          <!-- ---------------------------------- -->
          <!-- Start Vertical Layout Sidebar -->
          <!-- ---------------------------------- -->
          <div class="brand-logo d-flex align-items-center justify-content-between">
              <a href="{{route('admin.admindashboard')}}" class="text-nowrap text-center fw-bolder fs-6 logo-img">
                  {{-- <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/logos/dark-logo.svg" class="dark-logo" alt="Logo-Dark" /> --}}
                  <span style="color: #4F73D9; font-weight:bolder; font-size: xx-large;">True Omega</span> {{-- <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/logos/light-logo.svg" class="light-logo" alt="Logo-light" /> --}}
              </a>
              <a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fw-bolder fs-5 d-block d-xl-none">
                  IL
              </a>
          </div>

          <nav class="sidebar-nav scroll-sidebar" data-simplebar>
              <ul id="sidebarnav">
                  <li class="nav-small-cap">
                      <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                      <span class="hide-menu">Menu</span>
                  </li>
                  <li class="sidebar-item">
                      <a class="sidebar-link" href="{{route ('admin.admindashboard')}}" aria-expanded="false">
                          <span>
                              <i class="ti ti-layout-grid"></i>
                          </span>
                          <span class="hide-menu">Dashboard</span>
                      </a>
                  </li>
                  <li class="sidebar-item">
                      <a class="sidebar-link has-arrow" href="javascript:void(0)" id="get-url" aria-expanded="false">
                          <span class="d-flex">
                              <i class="ti ti-adjustments-alt"></i>
                          </span>
                          <span class="hide-menu">Others</span>
                      </a>
                      <ul aria-expanded="false" class="collapse first-level">
                          <li class="sidebar-item">
                              <a href="{{route ('admin.master')}}" class="sidebar-link">
                                  <div class="round-16 d-flex align-items-center justify-content-center">
                                      <i class="ti ti-circle"></i>
                                  </div>
                                  <span class="hide-menu">Master Settings</span>
                              </a>
                              <a href="{{ route('admin.companyprofile')}}" class="sidebar-link">
                                  <div class="round-16 d-flex align-items-center justify-content-center">
                                      <i class="ti ti-circle"></i>
                                  </div>
                                  <span class="hide-menu">Company Profile</span>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="sidebar-item">
                      <a class="sidebar-link" href="{{route ('admin.allusers')}}" aria-expanded="false">
                          <span>
                              <i class="ti ti-users"></i>
                          </span>
                          <span class="hide-menu">Registered Users</span>
                      </a>
                  </li>
                  <li class="sidebar-item">
                      <a class="sidebar-link" href="{{route ('admin.media')}}" aria-expanded="false">
                          <span>
                              <i class="ti ti-camera-plus"></i>
                          </span>
                          <span class="hide-menu">Media</span>
                      </a>
                  </li>
                  <li class="sidebar-item">
                      <a class="sidebar-link" href="{{route ('admin.allproducts')}}" aria-expanded="false">
                          <span>
                              <i class="ti ti-notes"></i>
                          </span>
                          <span class="hide-menu">All Products</span>
                      </a>
                  </li>
                  <li class="sidebar-item">
                      <a class="sidebar-link has-arrow" href="javascript:void(0)" id="get-url" aria-expanded="false">
                          <span class="d-flex">
                              <i class="ti ti-article"></i>
                          </span>
                          <span class="hide-menu">Blogs</span>
                      </a>
                      <ul aria-expanded="false" class="collapse first-level">
                          <li class="sidebar-item">
                              <a href="{{ route('admin.blogslist')}}" class="sidebar-link">
                                  <div class="round-16 d-flex align-items-center justify-content-center">
                                      <i class="ti ti-circle"></i>
                                  </div>
                                  <span class="hide-menu">All Blogs</span>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="sidebar-item">
                      <a class="sidebar-link has-arrow" href="javascript:void(0)" id="get-url" aria-expanded="false">
                          <span class="d-flex">
                              <i class="ti ti-device-ipad-horizontal-cog"></i>
                          </span>
                          <span class="hide-menu">Website Settings</span>
                      </a>
                      <ul aria-expanded="false" class="collapse first-level">
                          <li class="sidebar-item">
                              <a href="{{ route('admin.editWebsiteSettings',['id' => 7])}}" class="sidebar-link">
                                  <div class="round-16 d-flex align-items-center justify-content-center">
                                      <i class="ti ti-circle"></i>
                                  </div>
                                  <span class="hide-menu">Home Page Banners</span>
                              </a>
                          </li>
                      </ul>
                  </li>
              </ul>
          </nav>

          <div class="fixed-profile p-3 mx-4 mb-2 bg-secondary-subtle rounded mt-3">
              <div class="hstack gap-3">
                  <div class="john-img">
                      @php
                      $userdata = auth()->user();
                      @endphp
                      <img src="{{asset('assets/images/'. $userdata->profile_photo_path)}}" class="rounded-circle" width="40" height="40" alt="modernize-img" />
                  </div>
                  <div class="john-title">
                      @if (Auth::user())
                      <h6 class="mb-0 fs-4 fw-semibold">{{ Auth::user()->name }}</h6>
                      @else
                      <h6 class="mb-0 fs-4 fw-semibold">Guest User</h6>
                      <span class="fs-2">{{ Auth::user()->email }}</span>
                      @endif
                  </div>
                  <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button type="submit" class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button" aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
                          <i class="ti ti-power fs-6"></i>
                      </button>
                  </form>
              </div>
          </div>

          <!-- ---------------------------------- -->
          <!-- Start Vertical Layout Sidebar -->
          <!-- ---------------------------------- -->
      </div>
  </aside>
  <header class="topbar">
      <div class="with-vertical">
          <!-- ---------------------------------- -->
          <!-- Start Vertical Layout Header -->
          <!-- ---------------------------------- -->
          <nav class="navbar navbar-expand-lg p-0">
              <ul class="navbar-nav">
                  <li class="nav-item nav-icon-hover-bg rounded-circle ms-n2">
                      <a class="nav-link sidebartoggler" id="headerCollapse" href="javascript:void(0)">
                          <i class="ti ti-menu-2"></i>
                      </a>
                  </li>
                  {{-- <li class="nav-item nav-icon-hover-bg rounded-circle d-none d-lg-flex">
                      <a class="nav-link" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal">
                          <i class="ti ti-search"></i>
                      </a>
                  </li> --}}
              </ul>

              {{-- <ul class="navbar-nav quick-links d-none d-lg-flex align-items-center">
                  <!-- ------------------------------- -->
                  <!-- start apps Dropdown -->
                  <!-- ------------------------------- -->
                  <li class="nav-item nav-icon-hover-bg rounded w-auto dropdown d-none d-lg-block mx-0">
                      <div class="hover-dd">
                          <a class="nav-link" href="javascript:void(0)">
                              Apps<span class="mt-1">
                                  <i class="ti ti-chevron-down fs-3"></i>
                              </span>
                          </a>
                          <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
                              <div class="row">
                                  <div class="col-8">
                                      <div class="ps-7 pt-7">
                                          <div class="border-bottom">
                                              <div class="row">
                                                  <div class="col-6">
                                                      <div class="position-relative">
                                                          <a href="app-chat.html" class="d-flex align-items-center pb-9 position-relative">
                                                              <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                  <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-dd-chat.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />
                                                              </div>
                                                              <div>
                                                                  <h6 class="mb-1 fw-semibold fs-3">
                                                                      Chat Application
                                                                  </h6>
                                                                  <span class="fs-2 d-block text-body-secondary">New messages arrived</span>
                                                              </div>
                                                          </a>
                                                          <a href="app-invoice.html" class="d-flex align-items-center pb-9 position-relative">
                                                              <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                  <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-dd-invoice.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />
                                                              </div>
                                                              <div>
                                                                  <h6 class="mb-1 fw-semibold fs-3">
                                                                      Invoice App
                                                                  </h6>
                                                                  <span class="fs-2 d-block text-body-secondary">Get latest invoice</span>
                                                              </div>
                                                          </a>
                                                          <a href="app-contact2.html" class="d-flex align-items-center pb-9 position-relative">
                                                              <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                  <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-dd-mobile.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />
                                                              </div>
                                                              <div>
                                                                  <h6 class="mb-1 fw-semibold fs-3">
                                                                      Contact Application
                                                                  </h6>
                                                                  <span class="fs-2 d-block text-body-secondary">2 Unsaved Contacts</span>
                                                              </div>
                                                          </a>
                                                          <a href="app-email.html" class="d-flex align-items-center pb-9 position-relative">
                                                              <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                  <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-dd-message-box.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />
                                                              </div>
                                                              <div>
                                                                  <h6 class="mb-1 fw-semibold fs-3">
                                                                      Email App
                                                                  </h6>
                                                                  <span class="fs-2 d-block text-body-secondary">Get new emails</span>
                                                              </div>
                                                          </a>
                                                      </div>
                                                  </div>
                                                  <div class="col-6">
                                                      <div class="position-relative">
                                                          <a href="page-user-profile.html" class="d-flex align-items-center pb-9 position-relative">
                                                              <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                  <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-dd-cart.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />
                                                              </div>
                                                              <div>
                                                                  <h6 class="mb-1 fw-semibold fs-3">
                                                                      User Profile
                                                                  </h6>
                                                                  <span class="fs-2 d-block text-body-secondary">learn more information</span>
                                                              </div>
                                                          </a>
                                                          <a href="https://bootstrapdemos.adminmart.com/modernize/dist/main/app-calendar.html" class="d-flex align-items-center pb-9 position-relative">
                                                              <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                  <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-dd-date.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />
                                                              </div>
                                                              <div>
                                                                  <h6 class="mb-1 fw-semibold fs-3">
                                                                      Calendar App
                                                                  </h6>
                                                                  <span class="fs-2 d-block text-body-secondary">Get dates</span>
                                                              </div>
                                                          </a>
                                                          <a href="app-contact.html" class="d-flex align-items-center pb-9 position-relative">
                                                              <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                  <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-dd-lifebuoy.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />
                                                              </div>
                                                              <div>
                                                                  <h6 class="mb-1 fw-semibold fs-3">
                                                                      Contact List Table
                                                                  </h6>
                                                                  <span class="fs-2 d-block text-body-secondary">Add new contact</span>
                                                              </div>
                                                          </a>
                                                          <a href="app-notes.html" class="d-flex align-items-center pb-9 position-relative">
                                                              <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                  <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-dd-application.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />
                                                              </div>
                                                              <div>
                                                                  <h6 class="mb-1 fw-semibold fs-3">
                                                                      Notes Application
                                                                  </h6>
                                                                  <span class="fs-2 d-block text-body-secondary">To-do and Daily tasks</span>
                                                              </div>
                                                          </a>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="row align-items-center py-3">
                                              <div class="col-8">
                                                  <a class="fw-semibold d-flex align-items-center lh-1" href="javascript:void(0)">
                                                      <i class="ti ti-help fs-6 me-2"></i>Frequently
                                                      Asked Questions
                                                  </a>
                                              </div>
                                              <div class="col-4">
                                                  <div class="d-flex justify-content-end pe-4">
                                                      <button class="btn btn-primary">Check</button>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-4 ms-n4">
                                      <div class="position-relative p-7 border-start h-100">
                                          <h5 class="fs-5 mb-9 fw-semibold">Quick Links</h5>
                                          <ul class="">
                                              <li class="mb-3">
                                                  <a class="fw-semibold bg-hover-primary" href="page-pricing.html">Pricing Page</a>
                                              </li>
                                              <li class="mb-3">
                                                  <a class="fw-semibold bg-hover-primary" href="authentication-login.html">Authentication Design</a>
                                              </li>
                                              <li class="mb-3">
                                                  <a class="fw-semibold bg-hover-primary" href="authentication-register.html">Register Now</a>
                                              </li>
                                              <li class="mb-3">
                                                  <a class="fw-semibold bg-hover-primary" href="https://bootstrapdemos.adminmart.com/modernize/dist/main/authentication-error.html">404 Error Page</a>
                                              </li>
                                              <li class="mb-3">
                                                  <a class="fw-semibold bg-hover-primary" href="app-notes.html">Notes App</a>
                                              </li>
                                              <li class="mb-3">
                                                  <a class="fw-semibold bg-hover-primary" href="page-user-profile.html">User Application</a>
                                              </li>
                                              <li class="mb-3">
                                                  <a class="fw-semibold bg-hover-primary" href="page-account-settings.html">Account Settings</a>
                                              </li>
                                          </ul>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </li>
                  <!-- ------------------------------- -->
                  <!-- end apps Dropdown -->
                  <!-- ------------------------------- -->
                  <li class="nav-item dropdown-hover d-none d-lg-block">
                      <a class="nav-link" href="app-chat.html">Chat</a>
                  </li>
                  <li class="nav-item dropdown-hover d-none d-lg-block">
                      <a class="nav-link" href="https://bootstrapdemos.adminmart.com/modernize/dist/main/app-calendar.html">Calendar</a>
                  </li>
                  <li class="nav-item dropdown-hover d-none d-lg-block">
                      <a class="nav-link" href="app-email.html">Email</a>
                  </li>
              </ul> --}}

              <div class="d-block d-lg-none py-4">
                  <a href="index.html" class="text-nowrap logo-img">
                      <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/logos/dark-logo.svg" class="dark-logo" alt="Logo-Dark" />
                      <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/logos/light-logo.svg" class="light-logo" alt="Logo-light" />
                  </a>
              </div>
              <a class="navbar-toggler nav-icon-hover-bg rounded-circle p-0 mx-0 border-0" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="ti ti-dots fs-7"></i>
              </a>
              <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                  <div class="d-flex align-items-center justify-content-between">
                      <a href="javascript:void(0)" class="nav-link nav-icon-hover-bg rounded-circle mx-0 ms-n1 d-flex d-lg-none align-items-center justify-content-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar" aria-controls="offcanvasWithBothOptions">
                          <i class="ti ti-align-justified fs-7"></i>
                      </a>
                      <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                          <li class="nav-item dropdown">
                              <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" aria-expanded="false">
                                  <div class="d-flex align-items-center">
                                      <div class="user-profile-img">
                                          {{-- @php
                                          $userdata = auth()->user();
                                          @endphp --}}
                                          <img src="{{asset('assets/images/'.$userdata->profile_photo_path)}}" class="rounded-circle" width="35" height="35" alt="modernize-img" />
                                      </div>
                                  </div>
                              </a>
                              <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
                                  <div class="profile-dropdown position-relative" data-simplebar>
                                      <div class="d-flex align-items-center py-9 mx-7 border-bottom">

                                          <img src="{{asset('assets/images/'.$userdata->profile_photo_path)}}" class="rounded-circle" width="80" height="80" alt="modernize-img" />
                                          <div class="ms-3">
                                              @if (Auth::user())
                                              <h5 class="mb-1 fs-3">{{ Auth::user()->name }}</h5>
                                              @else
                                              <h5 class="mb-1 fs-3">Guest User</h5>
                                              @endif
                                              <p class="mb-0 d-flex align-items-center gap-2">
                                                  <i class="ti ti-mail fs-4"></i>
                                                  {{ Auth::user()->email }}
                                              </p>
                                          </div>
                                      </div>
                                      <div class="message-body">
                                          <a href="{{ route('admin.myprofile') }}" class="py-8 px-7 mt-8 d-flex align-items-center">
                                              <span class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                                  <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-account.svg" alt="modernize-img" width="24" height="24" />
                                              </span>
                                              <div class="w-100 ps-3">
                                                  <h6 class="mb-1 fs-3 fw-semibold lh-base">
                                                      My Profile
                                                  </h6>
                                                  <span class="fs-2 d-block text-body-secondary">Account Settings</span>
                                              </div>
                                          </a>
                                      </div>
                                      <div class="d-grid py-4 px-7 pt-8">
                                          <form method="POST" action="{{ route('logout') }}">
                                              @csrf
                                              <button type="submit" class=" w-100 btn btn-outline-primary">Log Out</button>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </li>
                          <!-- ------------------------------- -->
                          <!-- end profile Dropdown -->
                          <!-- ------------------------------- -->
                      </ul>
                  </div>
              </div>
          </nav>
          <!-- ---------------------------------- -->
          <!-- End Vertical Layout Header -->
          <!-- ---------------------------------- -->

          <!-- ------------------------------- -->
          <!-- apps Dropdown in Small screen -->
          <!-- ------------------------------- -->
          <!--  Mobilenavbar -->
          <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="mobilenavbar" aria-labelledby="offcanvasWithBothOptionsLabel">
              <nav class="sidebar-nav scroll-sidebar">
                  <div class="offcanvas-header justify-content-between">
                      <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/logos/favicon.ico" alt="modernize-img" class="img-fluid" />
                      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>
                  <div class="offcanvas-body h-n80" data-simplebar="" data-simplebar>
                      <ul id="sidebarnav">
                          <li class="sidebar-item">
                              <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                  <span>
                                      <i class="ti ti-apps"></i>
                                  </span>
                                  <span class="hide-menu">Apps</span>
                              </a>
                              <ul aria-expanded="false" class="collapse first-level my-3">
                                  <li class="sidebar-item py-2">
                                      <a href="app-chat.html" class="d-flex align-items-center">
                                          <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                              <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-dd-chat.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />
                                          </div>
                                          <div>
                                              <h6 class="mb-1 bg-hover-primary">
                                                  Chat Application
                                              </h6>
                                              <span class="fs-2 d-block text-muted">New messages arrived</span>
                                          </div>
                                      </a>
                                  </li>
                                  <li class="sidebar-item py-2">
                                      <a href="app-invoice.html" class="d-flex align-items-center">
                                          <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                              <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-dd-invoice.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />
                                          </div>
                                          <div>
                                              <h6 class="mb-1 bg-hover-primary">Invoice App</h6>
                                              <span class="fs-2 d-block text-muted">Get latest invoice</span>
                                          </div>
                                      </a>
                                  </li>
                                  <li class="sidebar-item py-2">
                                      <a href="https://bootstrapdemos.adminmart.com/modernize/dist/main/app-cotact.html" class="d-flex align-items-center">
                                          <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                              <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-dd-mobile.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />
                                          </div>
                                          <div>
                                              <h6 class="mb-1 bg-hover-primary">
                                                  Contact Application
                                              </h6>
                                              <span class="fs-2 d-block text-muted">2 Unsaved Contacts</span>
                                          </div>
                                      </a>
                                  </li>
                                  <li class="sidebar-item py-2">
                                      <a href="app-email.html" class="d-flex align-items-center">
                                          <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                              <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-dd-message-box.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />
                                          </div>
                                          <div>
                                              <h6 class="mb-1 bg-hover-primary">Email App</h6>
                                              <span class="fs-2 d-block text-muted">Get new emails</span>
                                          </div>
                                      </a>
                                  </li>
                                  <li class="sidebar-item py-2">
                                      <a href="page-user-profile.html" class="d-flex align-items-center">
                                          <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                              <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-dd-cart.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />
                                          </div>
                                          <div>
                                              <h6 class="mb-1 bg-hover-primary">
                                                  User Profile
                                              </h6>
                                              <span class="fs-2 d-block text-muted">learn more information</span>
                                          </div>
                                      </a>
                                  </li>
                                  <li class="sidebar-item py-2">
                                      <a href="https://bootstrapdemos.adminmart.com/modernize/dist/main/app-calendar.html" class="d-flex align-items-center">
                                          <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                              <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-dd-date.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />
                                          </div>
                                          <div>
                                              <h6 class="mb-1 bg-hover-primary">
                                                  Calendar App
                                              </h6>
                                              <span class="fs-2 d-block text-muted">Get dates</span>
                                          </div>
                                      </a>
                                  </li>
                                  <li class="sidebar-item py-2">
                                      <a href="app-contact2.html" class="d-flex align-items-center">
                                          <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                              <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-dd-lifebuoy.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />
                                          </div>
                                          <div>
                                              <h6 class="mb-1 bg-hover-primary">
                                                  Contact List Table
                                              </h6>
                                              <span class="fs-2 d-block text-muted">Add new contact</span>
                                          </div>
                                      </a>
                                  </li>
                                  <li class="sidebar-item py-2">
                                      <a href="app-notes.html" class="d-flex align-items-center">
                                          <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                              <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-dd-application.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />
                                          </div>
                                          <div>
                                              <h6 class="mb-1 bg-hover-primary">
                                                  Notes Application
                                              </h6>
                                              <span class="fs-2 d-block text-muted">To-do and Daily tasks</span>
                                          </div>
                                      </a>
                                  </li>
                                  <ul class="px-8 mt-7 mb-4">
                                      <li class="sidebar-item mb-3">
                                          <h5 class="fs-5 fw-semibold">Quick Links</h5>
                                      </li>
                                      <li class="sidebar-item py-2">
                                          <a class="fw-semibold text-dark" href="page-pricing.html">Pricing Page</a>
                                      </li>
                                      <li class="sidebar-item py-2">
                                          <a class="fw-semibold text-dark" href="authentication-login.html">Authentication Design</a>
                                      </li>
                                      <li class="sidebar-item py-2">
                                          <a class="fw-semibold text-dark" href="authentication-register.html">Register Now</a>
                                      </li>
                                      <li class="sidebar-item py-2">
                                          <a class="fw-semibold text-dark" href="https://bootstrapdemos.adminmart.com/modernize/dist/main/authentication-error.html">404 Error Page</a>
                                      </li>
                                      <li class="sidebar-item py-2">
                                          <a class="fw-semibold text-dark" href="app-notes.html">Notes App</a>
                                      </li>
                                      <li class="sidebar-item py-2">
                                          <a class="fw-semibold text-dark" href="page-user-profile.html">User Application</a>
                                      </li>
                                      <li class="sidebar-item py-2">
                                          <a class="fw-semibold text-dark" href="page-account-settings.html">Account Settings</a>
                                      </li>
                                  </ul>
                              </ul>
                          </li>
                          <li class="sidebar-item">
                              <a class="sidebar-link" href="app-chat.html" aria-expanded="false">
                                  <span>
                                      <i class="ti ti-message-dots"></i>
                                  </span>
                                  <span class="hide-menu">Chat</span>
                              </a>
                          </li>
                          <li class="sidebar-item">
                              <a class="sidebar-link" href="https://bootstrapdemos.adminmart.com/modernize/dist/main/app-calendar.html" aria-expanded="false">
                                  <span>
                                      <i class="ti ti-calendar"></i>
                                  </span>
                                  <span class="hide-menu">Calendar</span>
                              </a>
                          </li>
                          <li class="sidebar-item">
                              <a class="sidebar-link" href="app-email.html" aria-expanded="false">
                                  <span>
                                      <i class="ti ti-mail"></i>
                                  </span>
                                  <span class="hide-menu">Email</span>
                              </a>
                          </li>
                      </ul>
                  </div>
              </nav>
          </div>
      </div>
      <div class="app-header with-horizontal">
          <nav class="navbar navbar-expand-xl container-fluid p-0">
              <ul class="navbar-nav align-items-center">
                  <li class="nav-item nav-icon-hover-bg rounded-circle d-flex d-xl-none ms-n2">
                      <a class="nav-link sidebartoggler" id="sidebarCollapse" href="javascript:void(0)">
                          <i class="ti ti-menu-2"></i>
                      </a>
                  </li>
                  <li class="nav-item d-none d-xl-block">
                      <a href="index.html" class="text-nowrap nav-link">
                          <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/logos/dark-logo.svg" class="dark-logo" width="180" alt="modernize-img" />
                          <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/logos/light-logo.svg" class="light-logo" width="180" alt="modernize-img" />
                      </a>
                  </li>
                  <li class="nav-item nav-icon-hover-bg rounded-circle d-none d-xl-flex">
                      <a class="nav-link" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal">
                          <i class="ti ti-search"></i>
                      </a>
                  </li>
              </ul>
              <ul class="navbar-nav quick-links d-none d-xl-flex align-items-center">
                  <!-- ------------------------------- -->
                  <!-- start apps Dropdown -->
                  <!-- ------------------------------- -->
                  <li class="nav-item nav-icon-hover-bg rounded w-auto dropdown d-none d-lg-flex">
                      <div class="hover-dd">
                          <a class="nav-link" href="javascript:void(0)">
                              Apps<span class="mt-1">
                                  <i class="ti ti-chevron-down fs-3"></i>
                              </span>
                          </a>
                          <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
                              <div class="row">
                                  <div class="col-8">
                                      <div class="ps-7 pt-7">
                                          <div class="border-bottom">
                                              <div class="row">
                                                  <div class="col-6">
                                                      <div class="position-relative">
                                                          <a href="app-chat.html" class="d-flex align-items-center pb-9 position-relative">
                                                              <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                  <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-dd-chat.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />
                                                              </div>
                                                              <div>
                                                                  <h6 class="mb-1 fw-semibold fs-3">
                                                                      Chat Application
                                                                  </h6>
                                                                  <span class="fs-2 d-block text-body-secondary">New messages arrived</span>
                                                              </div>
                                                          </a>
                                                          <a href="app-invoice.html" class="d-flex align-items-center pb-9 position-relative">
                                                              <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                  <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-dd-invoice.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />
                                                              </div>
                                                              <div>
                                                                  <h6 class="mb-1 fw-semibold fs-3">
                                                                      Invoice App
                                                                  </h6>
                                                                  <span class="fs-2 d-block text-body-secondary">Get latest invoice</span>
                                                              </div>
                                                          </a>
                                                          <a href="app-contact2.html" class="d-flex align-items-center pb-9 position-relative">
                                                              <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                  <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-dd-mobile.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />
                                                              </div>
                                                              <div>
                                                                  <h6 class="mb-1 fw-semibold fs-3">
                                                                      Contact Application
                                                                  </h6>
                                                                  <span class="fs-2 d-block text-body-secondary">2 Unsaved Contacts</span>
                                                              </div>
                                                          </a>
                                                          <a href="app-email.html" class="d-flex align-items-center pb-9 position-relative">
                                                              <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                  <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-dd-message-box.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />
                                                              </div>
                                                              <div>
                                                                  <h6 class="mb-1 fw-semibold fs-3">
                                                                      Email App
                                                                  </h6>
                                                                  <span class="fs-2 d-block text-body-secondary">Get new emails</span>
                                                              </div>
                                                          </a>
                                                      </div>
                                                  </div>
                                                  <div class="col-6">
                                                      <div class="position-relative">
                                                          <a href="page-user-profile.html" class="d-flex align-items-center pb-9 position-relative">
                                                              <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                  <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-dd-cart.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />
                                                              </div>
                                                              <div>
                                                                  <h6 class="mb-1 fw-semibold fs-3">
                                                                      User Profile
                                                                  </h6>
                                                                  <span class="fs-2 d-block text-body-secondary">learn more information</span>
                                                              </div>
                                                          </a>
                                                          <a href="https://bootstrapdemos.adminmart.com/modernize/dist/main/app-calendar.html" class="d-flex align-items-center pb-9 position-relative">
                                                              <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                  <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-dd-date.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />
                                                              </div>
                                                              <div>
                                                                  <h6 class="mb-1 fw-semibold fs-3">
                                                                      Calendar App
                                                                  </h6>
                                                                  <span class="fs-2 d-block text-body-secondary">Get dates</span>
                                                              </div>
                                                          </a>
                                                          <a href="app-contact.html" class="d-flex align-items-center pb-9 position-relative">
                                                              <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                  <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-dd-lifebuoy.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />
                                                              </div>
                                                              <div>
                                                                  <h6 class="mb-1 fw-semibold fs-3">
                                                                      Contact List Table
                                                                  </h6>
                                                                  <span class="fs-2 d-block text-body-secondary">Add new contact</span>
                                                              </div>
                                                          </a>
                                                          <a href="app-notes.html" class="d-flex align-items-center pb-9 position-relative">
                                                              <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                  <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-dd-application.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />
                                                              </div>
                                                              <div>
                                                                  <h6 class="mb-1 fw-semibold fs-3">
                                                                      Notes Application
                                                                  </h6>
                                                                  <span class="fs-2 d-block text-body-secondary">To-do and Daily tasks</span>
                                                              </div>
                                                          </a>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="row align-items-center py-3">
                                              <div class="col-8">
                                                  <a class="fw-semibold d-flex align-items-center lh-1" href="javascript:void(0)">
                                                      <i class="ti ti-help fs-6 me-2"></i>Frequently
                                                      Asked Questions
                                                  </a>
                                              </div>
                                              <div class="col-4">
                                                  <div class="d-flex justify-content-end pe-4">
                                                      <button class="btn btn-primary">Check</button>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-4 ms-n4">
                                      <div class="position-relative p-7 border-start h-100">
                                          <h5 class="fs-5 mb-9 fw-semibold">Quick Links</h5>
                                          <ul class="">
                                              <li class="mb-3">
                                                  <a class="fw-semibold bg-hover-primary" href="page-pricing.html">Pricing Page</a>
                                              </li>
                                              <li class="mb-3">
                                                  <a class="fw-semibold bg-hover-primary" href="authentication-login.html">Authentication Design</a>
                                              </li>
                                              <li class="mb-3">
                                                  <a class="fw-semibold bg-hover-primary" href="authentication-register.html">Register Now</a>
                                              </li>
                                              <li class="mb-3">
                                                  <a class="fw-semibold bg-hover-primary" href="https://bootstrapdemos.adminmart.com/modernize/dist/main/authentication-error.html">404 Error Page</a>
                                              </li>
                                              <li class="mb-3">
                                                  <a class="fw-semibold bg-hover-primary" href="app-notes.html">Notes App</a>
                                              </li>
                                              <li class="mb-3">
                                                  <a class="fw-semibold bg-hover-primary" href="page-user-profile.html">User Application</a>
                                              </li>
                                              <li class="mb-3">
                                                  <a class="fw-semibold bg-hover-primary" href="page-account-settings.html">Account Settings</a>
                                              </li>
                                          </ul>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </li>
                  <!-- ------------------------------- -->
                  <!-- end apps Dropdown -->
                  <!-- ------------------------------- -->
                  <li class="nav-item dropdown-hover d-none d-lg-block">
                      <a class="nav-link" href="app-chat.html">Chat</a>
                  </li>
                  <li class="nav-item dropdown-hover d-none d-lg-block">
                      <a class="nav-link" href="https://bootstrapdemos.adminmart.com/modernize/dist/main/app-calendar.html">Calendar</a>
                  </li>
                  <li class="nav-item dropdown-hover d-none d-lg-block">
                      <a class="nav-link" href="app-email.html">Email</a>
                  </li>
              </ul>
              <div class="d-block d-xl-none">
                  <a href="index.html" class="text-nowrap nav-link">
                      <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/logos/dark-logo.svg" width="180" alt="modernize-img" />
                  </a>
              </div>
              <a class="navbar-toggler nav-icon-hover-bg rounded-circle p-0 mx-0 border-0" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="p-2">
                      <i class="ti ti-dots fs-7"></i>
                  </span>
              </a>
              <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                  <div class="d-flex align-items-center justify-content-between px-0 px-xl-8">
                      <a href="javascript:void(0)" class="nav-link round-40 p-1 ps-0 d-flex d-xl-none align-items-center justify-content-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar" aria-controls="offcanvasWithBothOptions">
                          <i class="ti ti-align-justified fs-7"></i>
                      </a>
                      <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                          <!-- ------------------------------- -->
                          <!-- start language Dropdown -->
                          <!-- ------------------------------- -->
                          <li class="nav-item nav-icon-hover-bg rounded-circle">
                              <a class="nav-link moon dark-layout" href="javascript:void(0)">
                                  <i class="ti ti-moon moon"></i>
                              </a>
                              <a class="nav-link sun light-layout" href="javascript:void(0)">
                                  <i class="ti ti-sun sun"></i>
                              </a>
                          </li>
                          <li class="nav-item nav-icon-hover-bg rounded-circle dropdown">
                              <a class="nav-link" href="javascript:void(0)" id="drop2" aria-expanded="false">
                                  <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-flag-en.svg" alt="modernize-img" width="20px" height="20px" class="rounded-circle object-fit-cover round-20" />
                              </a>
                              <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                                  <div class="message-body">
                                      <a href="javascript:void(0)" class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                          <div class="position-relative">
                                              <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-flag-en.svg" alt="modernize-img" width="20px" height="20px" class="rounded-circle object-fit-cover round-20" />
                                          </div>
                                          <p class="mb-0 fs-3">English (UK)</p>
                                      </a>
                                      <a href="javascript:void(0)" class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                          <div class="position-relative">
                                              <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-flag-cn.svg" alt="modernize-img" width="20px" height="20px" class="rounded-circle object-fit-cover round-20" />
                                          </div>
                                          <p class="mb-0 fs-3">中国人 (Chinese)</p>
                                      </a>
                                      <a href="javascript:void(0)" class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                          <div class="position-relative">
                                              <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-flag-fr.svg" alt="modernize-img" width="20px" height="20px" class="rounded-circle object-fit-cover round-20" />
                                          </div>
                                          <p class="mb-0 fs-3">français (French)</p>
                                      </a>
                                      <a href="javascript:void(0)" class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                          <div class="position-relative">
                                              <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-flag-sa.svg" alt="modernize-img" width="20px" height="20px" class="rounded-circle object-fit-cover round-20" />
                                          </div>
                                          <p class="mb-0 fs-3">عربي (Arabic)</p>
                                      </a>
                                  </div>
                              </div>
                          </li>
                          <!-- ------------------------------- -->
                          <!-- end language Dropdown -->
                          <!-- ------------------------------- -->

                          <!-- ------------------------------- -->
                          <!-- start shopping cart Dropdown -->
                          <!-- ------------------------------- -->
                          <li class="nav-item nav-icon-hover-bg rounded-circle">
                              <a class="nav-link position-relative" href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                  <i class="ti ti-basket"></i>
                                  <span class="popup-badge rounded-pill bg-danger text-white fs-2">2</span>
                              </a>
                          </li>
                          <!-- ------------------------------- -->
                          <!-- end shopping cart Dropdown -->
                          <!-- ------------------------------- -->

                          <!-- ------------------------------- -->
                          <!-- start notification Dropdown -->
                          <!-- ------------------------------- -->
                          <li class="nav-item nav-icon-hover-bg rounded-circle dropdown">
                              <a class="nav-link position-relative" href="javascript:void(0)" id="drop2" aria-expanded="false">
                                  <i class="ti ti-bell-ringing"></i>
                                  <div class="notification bg-primary rounded-circle"></div>
                              </a>
                              <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                                  <div class="d-flex align-items-center justify-content-between py-3 px-7">
                                      <h5 class="mb-0 fs-5 fw-semibold">Notifications</h5>
                                      <span class="badge text-bg-primary rounded-4 px-3 py-1 lh-sm">5 new</span>
                                  </div>
                                  <div class="message-body" data-simplebar>
                                      <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                                          <span class="me-3">
                                              <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/profile/user-2.jpg" alt="user" class="rounded-circle" width="48" height="48" />
                                          </span>
                                          <div class="w-100">
                                              <h6 class="mb-1 fw-semibold lh-base">
                                                  Roman Joined the Team!
                                              </h6>
                                              <span class="fs-2 d-block text-body-secondary">Congratulate him</span>
                                          </div>
                                      </a>
                                      <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                                          <span class="me-3">
                                              <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/profile/user-3.jpg" alt="user" class="rounded-circle" width="48" height="48" />
                                          </span>
                                          <div class="w-100">
                                              <h6 class="mb-1 fw-semibold lh-base">
                                                  New message
                                              </h6>
                                              <span class="fs-2 d-block text-body-secondary">Salma sent you new message</span>
                                          </div>
                                      </a>
                                      <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                                          <span class="me-3">
                                              <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/profile/user-4.jpg" alt="user" class="rounded-circle" width="48" height="48" />
                                          </span>
                                          <div class="w-100">
                                              <h6 class="mb-1 fw-semibold lh-base">
                                                  Bianca sent payment
                                              </h6>
                                              <span class="fs-2 d-block text-body-secondary">Check your earnings</span>
                                          </div>
                                      </a>
                                      <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                                          <span class="me-3">
                                              <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/profile/user-5.jpg" alt="user" class="rounded-circle" width="48" height="48" />
                                          </span>
                                          <div class="w-100">
                                              <h6 class="mb-1 fw-semibold lh-base">
                                                  Jolly completed tasks
                                              </h6>
                                              <span class="fs-2 d-block text-body-secondary">Assign her new tasks</span>
                                          </div>
                                      </a>
                                      <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                                          <span class="me-3">
                                              <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/profile/user-6.jpg" alt="user" class="rounded-circle" width="48" height="48" />
                                          </span>
                                          <div class="w-100">
                                              <h6 class="mb-1 fw-semibold lh-base">
                                                  John received payment
                                              </h6>
                                              <span class="fs-2 d-block text-body-secondary">$230 deducted from account</span>
                                          </div>
                                      </a>
                                      <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                                          <span class="me-3">
                                              <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/profile/user-7.jpg" alt="user" class="rounded-circle" width="48" height="48" />
                                          </span>
                                          <div class="w-100">
                                              <h6 class="mb-1 fw-semibold lh-base">
                                                  Roman Joined the Team!
                                              </h6>
                                              <span class="fs-2 d-block text-body-secondary">Congratulate him</span>
                                          </div>
                                      </a>
                                  </div>
                                  <div class="py-6 px-7 mb-1">
                                      <button class="btn btn-outline-primary w-100">
                                          See All Notifications
                                      </button>
                                  </div>
                              </div>
                          </li>
                          <!-- ------------------------------- -->
                          <!-- end notification Dropdown -->
                          <!-- ------------------------------- -->

                          <!-- ------------------------------- -->
                          <!-- start profile Dropdown -->
                          <!-- ------------------------------- -->
                          <li class="nav-item dropdown">
                              <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" aria-expanded="false">
                                  <div class="d-flex align-items-center">
                                      <div class="user-profile-img">
                                          <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/profile/user-1.jpg" class="rounded-circle" width="35" height="35" alt="modernize-img" />
                                      </div>
                                  </div>
                              </a>
                              <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
                                  <div class="profile-dropdown position-relative" data-simplebar>
                                      <div class="py-3 px-7 pb-0">
                                          <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                                      </div>
                                      <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                          <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/profile/user-1.jpg" class="rounded-circle" width="80" height="80" alt="modernize-img" />
                                          <div class="ms-3">
                                              <h5 class="mb-1 fs-3">Mathew Anderson</h5>
                                              <span class="mb-1 d-block">Designer</span>
                                              <p class="mb-0 d-flex align-items-center gap-2">
                                                  <i class="ti ti-mail fs-4"></i>
                                                  info@modernize.com
                                              </p>
                                          </div>
                                      </div>
                                      <div class="message-body">
                                          <a href="page-user-profile.html" class="py-8 px-7 mt-8 d-flex align-items-center">
                                              <span class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                                  <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-account.svg" alt="modernize-img" width="24" height="24" />
                                              </span>
                                              <div class="w-100 ps-3">
                                                  <h6 class="mb-1 fs-3 fw-semibold lh-base">
                                                      My Profile
                                                  </h6>
                                                  <span class="fs-2 d-block text-body-secondary">Account Settings</span>
                                              </div>
                                          </a>
                                          <a href="app-email.html" class="py-8 px-7 d-flex align-items-center">
                                              <span class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                                  <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-inbox.svg" alt="modernize-img" width="24" height="24" />
                                              </span>
                                              <div class="w-100 ps-3">
                                                  <h6 class="mb-1 fs-3 fw-semibold lh-base">
                                                      My Inbox
                                                  </h6>
                                                  <span class="fs-2 d-block text-body-secondary">Messages & Emails</span>
                                              </div>
                                          </a>
                                          <a href="app-notes.html" class="py-8 px-7 d-flex align-items-center">
                                              <span class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                                  <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-tasks.svg" alt="modernize-img" width="24" height="24" />
                                              </span>
                                              <div class="w-100 ps-3">
                                                  <h6 class="mb-1 fs-3 fw-semibold lh-base">
                                                      My Task
                                                  </h6>
                                                  <span class="fs-2 d-block text-body-secondary">To-do and Daily Tasks</span>
                                              </div>
                                          </a>
                                      </div>
                                      <div class="d-grid py-4 px-7 pt-8">
                                          <div class="upgrade-plan bg-primary-subtle position-relative overflow-hidden rounded-4 p-4 mb-9">
                                              <div class="row">
                                                  <div class="col-6">
                                                      <h5 class="fs-4 mb-3 fw-semibold">
                                                          Unlimited Access
                                                      </h5>
                                                      <button class="btn btn-primary">
                                                          Upgrade
                                                      </button>
                                                  </div>
                                                  <div class="col-6">
                                                      <div class="m-n4 unlimited-img">
                                                          <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/backgrounds/unlimited-bg.png" alt="modernize-img" class="w-100" />
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <a href="authentication-login.html" class="btn btn-outline-primary">Log Out</a>
                                      </div>
                                  </div>
                              </div>
                          </li>
                          <!-- ------------------------------- -->
                          <!-- end profile Dropdown -->
                          <!-- ------------------------------- -->
                      </ul>
                  </div>
              </div>
          </nav>
      </div>
  </header>
